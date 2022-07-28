<div>

    @php
        //$ts = json_decode($teacher_schedule);
        
        //$plan = session('plan');
        //dd(session('plan'));
        //dd(date('m-d-Y h:i:s a'));
        $scheduled_classes;
        $temp_student_schedule = [];
        $student_schedule = [];
        $students_schedules = [];
        $schedule_user = [];
        $classes = [];
        //
        $hoy = (new Carbon\Carbon())->toCookieString();
        // dd();
        
        //if ($this->teacher_id != null) {
        if ($role == 'student') {
            $scheduled_classes = App\Models\Enrolment::select('student_id')
                ->where('teacher_id', $teacher_id)
                ->get();
        
            $current_period = App\Http\Controllers\ApportionmentController::currentPeriod();
            $period_start_c = new Carbon\Carbon($current_period[0]);
            $period_end_c = new Carbon\Carbon($current_period[1]);
            $my_enrolment = App\Models\Enrolment::select('id')
                ->where('student_id', $user_id)
                ->first();
        
            //dd($my_enrolment);
            if ($my_enrolment != null) {
                $classes = App\Models\Classes::select()
                    ->where('enrolment_id', $my_enrolment->id)
                    ->whereBetween('start_date', [$period_start_c->subDay()->toDateTimeString(), $period_end_c->toDateTimeString()])
                    ->get();
        
                foreach ($classes as $key => $value) {
                    $classes[$key] = $value->start_date;
                }
                $classes = json_decode($classes);
            }
        } else {
            $scheduled_classes = App\Models\Enrolment::select('student_id')
                ->where('teacher_id', $user_id)
                ->get();
        }
        
        // dd($scheduled_classes);
        
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
        
        //$role = Auth::user()->roles[0]->name;
        
        foreach ($students as $student) {
            $students_schedules[] = $student[1];
        }
        $students_schedules = array_merge(...$students_schedules);
        // dd($students_schedules);
        //  dd($students_schedules,$scheduled_classes,$teacher_schedule);
        // echo json_encode($students_schedules);
        // $user_schedules = array_merge(...$user_schedules);
        
        //echo json_encode($user_schedules);
        $schedule_user = $user_schedules;
        
        foreach ($schedule_user as $key => $value) {
            $schedule_user[$key] = $value[0] . '-' . $value[1];
        }
        
        //}
        //$schedule_user = json_encode($schedule_user);
        //$schedule_user = str_replace('"',"'",$schedule_user)
        //dd(str_replace('"',"'",$schedule_user));
        //echo ($teacher_id);
        //echo json_encode($teacher_schedule);
        //dd($schedule_user);
        
        //dd($period_start_c);
        
        foreach ($classes as $key => $value) {
            $classes[$key] = new Carbon\Carbon($classes[$key]);
        }
        
        $date_classes = [];
        $date_format_class = [];
        
        foreach ($classes as $key => $value) {
            $date_classes[$key] = $classes[$key]->isoFormat('H') . '-' . $classes[$key]->isoFormat('d');
            $date_format_class[$key] = $classes[$key]->isoFormat('ddd, D MMM HH:mm a');
        }
        
        //dd($date_classess);
        
    @endphp
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

    {{-- @if ($role != 'admin') --}}
    <div class="container mx-auto mt-10" x-data="{ editBtn: true, edit: false, showModal1: false, showModal2: false, showModal3: false, showModalAbsence: false, event: {{ $event }}, loadingState: false }" x-cloak>
        <div class="wrapper bg-white rounded w-full">
            {{-- <p x-show="event">Event</p> --}}

            <!-- INICIO DEL HORARIO DE JUAN -->
            @if ((!isset($user_schedules) || $user_schedules == null || count($user_schedules) <= 0) &&
                auth()->user()->roles[0]->name == 'student')
                <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                    <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't
                        selected a schedule yet.</h2>
                    <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you buy
                        a plan of classes.</h2>
                    <a href="{{ route('shop') }}"
                        class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Shop</a>
                </div>
            @else
                {{-- <input id="datetimepicker" type="text"> --}}

                <div class="w-full" wire:ignore>
                    <table class="border" style="width: 100%">
                        <!--fila de los titulos-->
                        <tr>
                            <th class="width border">UTC</th>
                            <th class="width border" style="">LOCAL</th>
                            @foreach ($days as $day)
                                <th class="border width" style="">
                                    {{ $day }}
                                </th>
                            @endforeach
                        </tr>
                        <!--filas seleccionables-->
                        @php
                            $e = 0;
                        @endphp
                        @for ($i = 0; $i < 16; $i++)
                            <tr class="border">
                                <td class="width border UTC">00:00</td>
                                <td class="width border Local">
                                    @if ($i + 6 < 10)
                                        0{{ $i + 6 }}:00
                                    @else
                                        {{ $i + 6 }}:00
                                    @endif
                                </td>
                                @foreach ($days as $day)
                                    @if (in_array([$i + 6, $e], $user_schedules))
                                        @if (in_array([$i + 6, $e], $students_schedules) && $role != 'student')
                                            @foreach ($students as $student)
                                                @if (in_array([$i + 6, $e], $student[1]))
                                                    {{-- {{dd($student->first_name)}} --}}
                                                    <td id="{{ $i + 6 }}-{{ $e }}"
                                                        class="border width selectable available preselected">
                                                        <a href="{{ route('profile.show', $student->id) }}"
                                                            class="text-sm text-green-100 font-bold name-student not-active">{{ $student->first_name }}
                                                            {{ $student->last_name }}
                                                        </a>
                                                    </td>
                                                @endif
                                            @endforeach
                                        @else
                                            <td id="{{ $i + 6 }}-{{ $e }}"
                                                class="border width selectable available preselected">
                                                @if (in_array($i + 6 . '-' . $e, $date_classes))
                                                    <div
                                                        class="flex flex-wrap flex-row justify-end gap-x-1 gap-y-0.5 pl-1 pr-1 tool-tip invisible">
                                                        @foreach ($date_classes as $key => $value)
                                                            @if ($value === $i + 6 . '-' . $e)
                                                                <button class="tooltip button_tooltip">
                                                                    <span
                                                                        class="tooltiptext mb-3">{{ $date_format_class[$key] }}</span>
                                                                </button>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>
                                        @endif
                                    @else
                                        @if (in_array([$i + 6, $e], $teacher_schedule) && !in_array([$i + 6, $e], $students_schedules))
                                            <td id="{{ $i + 6 }}-{{ $e }}"
                                                class="border width selectable available">
                                                @if (in_array($i + 6 . '-' . $e, $date_classes))
                                                    <div
                                                        class="flex flex-wrap flex-row justify-end gap-x-1 gap-y-0.5 pl-1 pr-1 tool-tip invisible">
                                                        @foreach ($date_classes as $key => $value)
                                                            @if ($value === $i + 6 . '-' . $e)
                                                                <button class="tooltip button_tooltip">
                                                                    <span
                                                                        class="tooltiptext mb-3">{{ $date_format_class[$key] }}</span>
                                                                </button>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>
                                        @else
                                            <td id="{{ $i + 6 }}-{{ $e }}"
                                                class="border width selectable notAvailable preoccupied">
                                                @if (in_array($i + 6 . '-' . $e, $date_classes))
                                                    <div
                                                        class="flex flex-wrap flex-row justify-end gap-x-1 gap-y-0.5 pl-1 pr-1 tool-tip invisible">
                                                        @foreach ($date_classes as $key => $value)
                                                            @if ($value === $i + 6 . '-' . $e)
                                                                <button class="tooltip button_tooltip">
                                                                    <span
                                                                        class="tooltiptext mb-3">{{ $date_format_class[$key] }}</span>
                                                                </button>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>
                                        @endif
                                    @endif
                                    @php
                                        // dd($teacher_schedule);
                                        $e++;
                                    @endphp
                                @endforeach
                                @php
                                    $e = 0;
                                @endphp
                            </tr>
                        @endfor
                    </table>
                </div>
                <div class="flex items-center flex-col  space-y-3 my-5" x-show="edit" x-transition>

                    <button onclick="toggleCellBlock()" @click="edit = false, editBtn = true"
                        class="bg-red-500 rounded-lg text-white font-bold px-6 py-1 shadow-md h-1/6 width"
                        wire:click="refresh"><i class="fas fa-times"></i></button>
                    <button @click="showModal1 = true"
                        class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 shadow-md h-5/6 width"
                        wire:click="edit()">Save</button>
                </div>
                <!-- FIN DEL HORARIO DE JUAN -->
                <div class="flex items-center flex-col">
                    <button onclick="toggleCellBlock()" @click=" edit = true, editBtn = false " wire:click="edit()"
                        class="inline-block bg-green-800 text-white px-4 py-2 my-5 rounded hover:bg-green-900 hover:text-white hover:no-underline"
                        x-show="editBtn" x-transition>Edit Schedule
                    </button>
                </div>
            @endif




            @include('modal')
            @include('components.loading-state')
            {{-- Clases para reagendar --}}


        </div>

    </div>
    {{-- @endif --}}

    <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
    <script src="{{ asset('js/viselect.cjs.js') }}"></script>

    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        console.log("inicio");
        var hoyLocal = new Date(@json($hoy));

        var horaLocal = hoyLocal.getHours();
        // var horaUTC = hoyLocal.getUTCHours();
        var difHora = hoyLocal.getTimezoneOffset() / 60;
        var OpenUTC = 11; // Hora UTC a la que abre la academia en PERU! (06:00 am Hora local en peru) (07:00 am hora local)
        var OpenLocal = OpenUTC - difHora;

        //Asignar hora UTC y Local al Horario

        cellsUTC = $('.UTC');
        cellsLocal = $('.Local');
        for (let i = 0; i < cellsUTC.length; i++) {
            if (OpenUTC < 10) {
                cellsUTC[i].innerHTML = "0" + OpenUTC + ":00";
            } else {
                cellsUTC[i].innerHTML = OpenUTC + ":00";
            }

            if (OpenUTC >= 23) {
                OpenUTC = 0;
            } else {
                OpenUTC++;
            }


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

        var role = "{{ Auth::user()->roles->pluck('name')[0] }}";

        $(".selectable").selectable({
            //disabled: true
        });

        $('body').on("contentChanged", event => {
            // console.log("hola")
            var cells = $(".selected");
            // console.log(cells);
            var role = "{{ Auth::user()->roles->pluck('name')[0] }}";

            if (role == "student") {

                $(".cell").click(function() {
                    var selectedCells = 0;
                    var nOfClasses = {{ isset($user_schedules) ? count($user_schedules) : 0 }};

                    selectedCells = $(".ui-selected").length;

                    if ($(this).hasClass("ui-selected") && $(this).hasClass("cell_block")) {
                        $(this).removeClass("ui-selected");
                    } else if ($(this).hasClass("cell_block") && (selectedCells < nOfClasses)) {
                        $(this).addClass("ui-selected");
                    }
                });

            } else if (role == "teacher") {
                var disabled = $(".selectable").selectable("option", "disabled");
                $(".selectable").selectable("option", "disabled", !disabled);
                $(".selectable").on("selectableselected", function(event, ui) {
                    // $.inArray("taken",ui.selected.classList);
                    if ($.inArray("taken", ui.selected.classList) > 0) {
                        console.log(true);
                    } else {
                        console.log(false);
                    }
                });
            }

        });


        //Seleccion de horario

        console.log("hola1");


        function toggleCellBlock() {

            if (role == "teacher") {
                $(".preoccupied").toggleClass("occupied");
                $(".preoccupied").toggleClass("selectable");
                $(".preoccupied").removeClass("selected");
                $(".name-student").toggleClass("not-active")
            }

            $(".schedule_cell").toggleClass("cell_block");
            $(".available").toggleClass("selectable");
            $(".available").removeClass("selected");
            $(".preselected").addClass("selected");
            $(".tool-tip").toggleClass("invisible")
            //$(".preoccupied").addClass("occupied");
            numClass = classSelected.length;
            init = false;
            classSelected = preClass;

            // console.log(classSelected)
        }


        let numClass = 0;
        let classSelected = [];
        let preClass = @json($schedule_user);
        // console.log(preClass);
        classSelected = preClass;
        // console.log(classSelected);
        numClass = classSelected.length;
        //$('.notAvailable').length + $('.available').length
        let qtyClass = classSelected.length;
        if (role == "teacher") {
            qtyClass = ($('.notAvailable').length + $('.available').length);
        }
        let preClassTd = [];
        preClass.forEach(element => {
            preClassTd.push(document.getElementById(element));
        });

        $(".available").toggleClass("selectable");
        $(".notAvailable").toggleClass("selectable");
        $(".preselected").addClass("selected");
        $(".preoccupied").addClass("occupied");
        $(".name-student").toggleClass("not-active");
        $(".tool-tip").toggleClass("invisible");
        let init = false;
        // console.log(preClassTd)
        const selection = new SelectionArea({
                selectables: ["td.selectable"],
                boundaries: [".container"],
            })
            .on("start", ({
                store,
                event
            }) => {
                if (!init) {
                    // console.log("hola?")
                    store.stored = preClassTd;
                    init = true;
                }
                // console.log(init)
                // console.log(store)
                if (!event.ctrlKey && !event.metaKey) {
                    // console.log(store)
                    for (const el of store.stored) {
                        //console.log("si")
                        if (el.classList.contains("selected") && el.classList.contains("selectable")) {
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
                    // console.log(added)
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

        //DATETIMEPICKER SCHEDULE

        // $('#datetimepicker').datetimepicker({
        //     format: 'd.m.Y H:i',
        //     inline: true,
        //     lang: 'ru',
        //     value: '22-07-2022 04:00',
        //     format: 'd-m-Y H:i'
        // });
    </script>

</div>
