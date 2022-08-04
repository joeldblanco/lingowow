<div>
    <script src="{{ asset('js/viselect.cjs.js') }}"></script>


    @php
        
        $hoy = (new Carbon\Carbon())->toCookieString();
        
        $scheduled_classes = App\Models\Enrolment::select('student_id')
            ->where('teacher_id', $teacher_id)
            ->get();
        $temp_student_schedule = [];
        $student_schedule = [];
        
        $students = [];
        foreach ($scheduled_classes as $key => $value) {
            $students[$key] = $value->student_id;
        }
        $students = App\Models\User::find($students);
        
        foreach ($students as $key => $value) {
            $students[$key][1] = App\Models\Schedule::select('selected_schedule')
                ->where('user_id', $value->id)
                ->get();
            $students[$key][1] = json_decode($students[$key][1][0]->selected_schedule);
        }
        
        for ($i = 0; $i < count($scheduled_classes); $i++) {
            array_push(
                $temp_student_schedule,
                App\Models\Schedule::select('selected_schedule')
                    ->where('user_id', $scheduled_classes[$i]->student_id)
                    ->get(),
            );
            if ($temp_student_schedule[$i][0]->selected_schedule) {
                array_push($student_schedule, json_decode($temp_student_schedule[$i][0]->selected_schedule));
            }
        }
        
        if (
            !empty(
                array_filter($student_schedule, function ($a) {
                    return $a !== null;
                })
            )
        ) {
            $student_schedule = array_merge(...$student_schedule);
        }
        
        $students_schedules = [];
        foreach ($students as $student) {
            $students_schedules[] = $student[1];
        }
        $students_schedules = array_merge(...$students_schedules);
        
        //SECCION PARA VERIFICAR SI EL DIA ESTA DISPONIBLE EN TODA LA SEMANA DEBIDO A REAGENDADOS.
        
        //Consulta de las clases reagendadas en el periodo vigente.
        $current_period = App\Http\Controllers\ApportionmentController::currentPeriod();
        $period_start_c = new Carbon\Carbon($current_period[0]);
        $period_end_c = new Carbon\Carbon($current_period[1]);
        $now = new Carbon\Carbon();
        $date_range = new Carbon\CarbonPeriod($now, $period_end_c);
        $days_rest = 0;
        $today = $now;
        //$period_range = [];
        
        foreach ($date_range as $key => $date) {
            //if ($key) {
            $days_rest++;
            //$period_range[$key] = $date->isoFormat('H-d');
            //}
        }
        // dd($days);
        $abcense = App\Models\Classes::select('start_date')
            ->where('status', '1')
            ->whereBetween('start_date', [$today->toDateTimeString(), $period_end_c->toDateTimeString()])
            ->get();
        
        // dd($abcense);
        
        foreach ($abcense as $key => $value) {
            $abcense[$key] = $value->start_date;
        }
        $abcense = json_decode($abcense);
        
        foreach ($abcense as $key => $value) {
            $abcense[$key] = new Carbon\Carbon($abcense[$key]);
        }
        
        $abcense_classes = [];
        foreach ($abcense as $key => $value) {
            $abcense_classes[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->isoFormat('d');
        }
        
        // dd($abcense_classes);
        
        //Funcion que determina si esta disponible o no el dia.
        function notFree($a, $buscado, $days)
        {
            $i = 0;
            if (is_array($a)) {
                foreach ($a as $v) {
                    if ($buscado === $v) {
                        $i++;
                    }
                }
            }
        
            if ($i > 0) {
                if ($i < $days / 7) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        
            // return $i;
        }
        
        //Calculo de dias a pagar respecto al periodo vigente.
        //dd($date_range, $days_rest, $plan, $abcense_classes, notFree($abcense_classes, '20-4', $days_rest));
        //dd(isFree(['2','2','2','1'],'1',4));
        
    @endphp

    <a id="link-schedule" href="#link-s"></a>
    <a name="link-s" class=""></a>
    <br>

    <div class="container mx-auto" x-data="{ editBtn: true, edit: false, showModal1: false, showModal2: false, showModal3: false, event: {{ $event }}, loadingState: false, showModalAbsence: false }" x-cloak>
        <div class="wrapper bg-white rounded shadow w-full">



            <h3 class="text-4xl font-bold text-gray-800">Select your schedule</h3>
            <div class=" flex justify-between">
                <h4 class="text-2xl font-bold text-gray-400 mb-8">Please, select {{ $plan }} blocks to continue
                </h4>
                <h4 class="text-2xl font-bold text-gray-400 mb-8">
                    @if ($name != null)
                        Teacher: {{ $name }}
                    @endif
                </h4>
            </div>


            @php
                $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
            @endphp

            <!-- INICIO DEL HORARIO -->
            <table class="border" style="width: 100%">
                <!--fila de los titulos-->
                <tr>
                    <th class="width border">UTC</th>
                    <th class="" style="">LOCAL</th>
                    @foreach ($days as $day)
                        <th class="border width" style="">
                            {{ $day }}
                        </th>
                    @endforeach
                </tr>
                <!--filas seleccionables-->
                @php
                    $e = 0;
                    $i = $university_schedule_start;
                @endphp
                {{-- @for ($i = 0; $i < 16; $i++) --}}
                @for ($hour = 0; $hour < $university_schedule_hours; $hour++)
                    <tr class="border">
                        <td class="width border UTC">
                            @if ($i < 10)
                                0{{ $i }}:00
                            @else
                                {{ $i }}:00
                            @endif
                        </td>
                        <td class="width border Local">
                            {{-- AQUI LA HORA SE LLENA MEDIANTE JAVASCRIPT --}}
                        </td>
                        @foreach ($days as $day)
                            @if (in_array([$i, $e], $schedule))
                                @if (in_array([$i, $e], $students_schedules))
                                    <td id="{{ $i }}-{{ $e }}" class="border width occupied"></td>
                                @else
                                    {{-- @php dd(isFree($abcense_classes,"20-4",$days_rest)); @endphp --}}

                                    @if (notFree($abcense_classes, $i . '-' . $e, $days_rest))
                                        <td id="{{ $i }}-{{ $e }}" class="border width occupied">
                                        </td>
                                    @else
                                        <td id="{{ $i }}-{{ $e }}"
                                            class="border width cursor-pointer available selectable"></td>
                                    @endif
                                @endif
                            @else
                                <td id="{{ $i }}-{{ $e }}" class="border width occupied"></td>
                            @endif
                            @php
                                $e++;
                            @endphp
                        @endforeach
                        @php
                            $e = 0;
                        @endphp
                    </tr>
                    @php
                        // echo $i . ' ' . $university_schedule_end . ' ';
                        if ($i == 23) {
                            $i = 0;
                        } else {
                            $i++;
                        }
                    @endphp
                @endfor
            </table>
            <!-- FIN DEL HORARIO DE JUAN -->




            <button @click="showModalAbsence = true"
                class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md"
                {{-- onclick="saveSchedule({{ $plan }},'schedule.check')" --}}>Save</button>
            {{-- <button class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" wire:model="$mode = 0">Edit</button> --}}
        </div>



        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/@simonwep/selection-js/lib/selection.min.js"></script> --}}


        {{-- MODAL DE CONFIRMACIÓN DE HORARIOS --}}
        <x-modal type="info" name="showModalAbsence">
            <x-slot name="title">
                Are you sure?
            </x-slot>

            <x-slot name="content">
                Are you sure you want to save your schedule?
            </x-slot>

            <x-slot name="footer" class="justify-center">
                <button
                    onclick="saveSchedule({{ isset($plan) ? $plan : 0 }},'schedule.check',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                    class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                    @click=" showModalAbsence = false, editBtn = true, edit = false, loadingState = true">
                    Save
                </button>
                <button
                    class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                    @click=" showModalAbsence = false ">
                    Cancel
                </button>
            </x-slot>
        </x-modal>

        {{-- @include('modal') --}}


        <script>
            $(function() {

                var selectedCells = 0;
                var nOfClasses = {{ $plan }};

                $(".cell_block").click(function() {
                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    } else {
                        if (selectedCells < nOfClasses) {
                            $(this).addClass("selected");
                        }
                    }

                    selectedCells = $(".selected").length;
                });

            });


            let numClass = 0;

            Livewire.hook('element.updated', (el, component) => {
                numClass = 0;

                var hoyLocal = new Date(@json($hoy));
                var horaLocal = hoyLocal.getHours();
                // var horaUTC = hoyLocal.getUTCHours();
                var difHora = hoyLocal.getTimezoneOffset() / 60;
                var OpenUTC =
                    @json($university_schedule_start); // Hora UTC a la que abre la academia en PERU! (06:00 am Hora local en peru) (07:00 am hora local)
                var OpenLocal = OpenUTC - difHora;

                //Asignar hora UTC y Local al Horario
                // cellsUTC = $('.UTC');
                cellsLocal = $('.Local');
                for (let i = 0; i < cellsLocal.length; i++) {
                    // if (OpenUTC < 10) {
                    //     cellsUTC[i].innerHTML = "0" + OpenUTC + ":00";
                    // } else {
                    //     cellsUTC[i].innerHTML = OpenUTC + ":00";
                    // }

                    // if (OpenUTC >= 23) {
                    //     OpenUTC = 0;
                    // } else {
                    //     OpenUTC++;
                    // }


                    if (OpenLocal < 10) {
                        cellsLocal[i].innerHTML = "0" + OpenLocal + ":00";
                    } else {
                        cellsLocal[i].innerHTML = OpenLocal + ":00";
                    }

                    if (OpenLocal >= 23) {
                        OpenLocal = 0;
                    } else {
                        OpenLocal++;
                    }
                }
            });

            // Funcion de seleccion en el horario
            //window.addEventListener('initSchedule', event => {
            // console.log("hola");
            const qtyClass = {{ $plan }};
            let classSelected = [];
            let preClass = ["1-6", "2-6", "3-6", "4-6", "5-6", "6-6"];
            classSelected = preClass;
            let preClassTd = [];
            preClass.forEach(element => {
                preClassTd.push(document.getElementById(element));
            });
            let init = true;

            const selection = new SelectionArea({
                    selectables: ["td.selectable"],
                    boundaries: [".container"],
                })
                .on("start", ({
                    store,
                    event
                }) => {
                    if (!init) {
                        store.stored = preClassTd;
                        init = true;
                    }

                    if (!event.ctrlKey && !event.metaKey) {
                        //console.log(store)
                        for (const el of store.stored) {
                            if (el.classList.contains("selected")) {
                                el.classList.remove("selected");
                                classSelected = classSelected.filter(function(cf) {
                                    return cf !== el.id;
                                });
                                if (numClass > 0)
                                    numClass--;
                                //console.log("uno"+numClass);
                            }
                        }

                        selection.clearSelection();
                    }
                    //console.log(store.stored)
                })
                .on(
                    "move",
                    ({
                        store: {
                            changed: {
                                added,
                                removed
                            }
                        }
                    }) => {
                        //console.log(added)
                        for (const el of added) {
                            if (!(el.classList.contains("selected"))) {
                                if (numClass < qtyClass) {
                                    el.classList.add("selected");
                                    classSelected.push(el.id);
                                    numClass++;
                                    //console.log("dos"+numClass);
                                }
                            }
                        }

                        for (const el of removed) {
                            if (el.classList.contains("selected")) {
                                el.classList.remove("selected");
                                classSelected = classSelected.filter(function(cf) {
                                    return cf !== el.id;
                                });
                                numClass--;
                            }
                            //console.log("tres"+numClass);

                        }

                    }

                );

            //});
            var hoyLocal = new Date(@json($hoy));
            var horaLocal = hoyLocal.getHours();
            // var horaUTC = hoyLocal.getUTCHours();
            var difHora = hoyLocal.getTimezoneOffset() / 60;
            var OpenUTC =
            @json($university_schedule_start); // Hora UTC a la que abre la academia en PERU! (06:00 am Hora local en peru) (07:00 am hora local)
            var OpenLocal = OpenUTC - difHora;

            //Asignar hora UTC y Local al Horario
            // cellsUTC = $('.UTC');
            cellsLocal = $('.Local');
            for (let i = 0; i < cellsLocal.length; i++) {
                // if (OpenUTC < 10) {
                //     cellsUTC[i].innerHTML = "0" + OpenUTC + ":00";
                // } else {
                //     cellsUTC[i].innerHTML = OpenUTC + ":00";
                // }

                // if (OpenUTC >= 23) {
                //     OpenUTC = 0;
                // } else {
                //     OpenUTC++;
                // }


                if (OpenLocal < 10) {
                    if (OpenLocal < 0) {
                        OpenLocal += 24;
                        cellsLocal[i].innerHTML = OpenLocal + ":00";
                    } else {
                        cellsLocal[i].innerHTML = "0" + OpenLocal + ":00";
                    }
                } else {
                    cellsLocal[i].innerHTML = OpenLocal + ":00";
                }
            }

            let BT = $(".button-teacher");
            for (let i = 0; i < BT.length; i++) {
                BT[i].addEventListener('click', function() {
                    document.getElementById("link-schedule").click();
                });
            }
        </script>
    </div>
