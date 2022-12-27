<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

    <a id="link-schedule" href="#link-s"></a>
    <a name="link-s" class=""></a>
    <br>
    <div wire:loading>
        @include('components.loading-state')
    </div>

    {{-- @if ($role != 'admin') --}}
    <div class="container mx-auto mt-10 text-gray-600" x-data="{ editBtn: true, edit: false, showModal1: false, showModal2: false, showModal3: false, showModalAbsence: @entangle('showModalAbsence'), event: {{ $event }}, loadingState: false }" x-cloak>
        <div class="wrapper bg-white rounded w-full">
            {{-- <p x-show="event">Event</p> --}}

            <!-- INICIO DEL HORARIO DE JUAN -->
            @if (!isset($user_schedules) || $user_schedules == null || count($user_schedules) <= 0)

                @if ($role == 'guest')
                    @if ($mode == 'edit')

                        <h3 class="text-4xl font-bold text-gray-800">Select your schedule</h3>
                        <div class=" flex justify-between">
                            <h4 class="text-2xl font-bold text-gray-400 mb-8">Please, select {{ $plan }} blocks
                                to
                                continue
                            </h4>
                            <h4 class="text-2xl font-bold text-gray-400 mb-8">
                                @if ($name != null)
                                    Teacher: {{ $name }}
                                @endif
                            </h4>
                        </div>

                        {{-- <div wire:loading>
                            @include('components.loading-state')
                        </div> --}}

                        <!-- INICIO DEL HORARIO -->
                        <div>

                            <table class="border" style="width: 100%">
                                <!--fila de los titulos-->
                                <tr>
                                    <th class="width border">UTC</th>
                                    <th>LOCAL</th>
                                    @foreach ($days as $day)
                                        <th class="border width">
                                            {{ $day }}
                                        </th>
                                    @endforeach
                                </tr>
                                <!--filas seleccionables-->
                                @php
                                    // dd($data_selected);
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
                                                    <td id="{{ $i }}-{{ $e }}"
                                                        class="border width occupied"></td>
                                                @else
                                                    {{-- @php dd(isFree($abcense_classes,"20-4",$days_rest)); @endphp --}}

                                                    @if ($this->notFree($abcense_classes, $i . '-' . $e, $days_rest))
                                                        <td id="{{ $i }}-{{ $e }}"
                                                            class="border width occupied">
                                                        </td>
                                                    @else
                                                        @if (in_array([$i, $e], $data_selected))
                                                            <td id="{{ $i }}-{{ $e }}"
                                                                class="border width cursor-pointer available selectable selected">
                                                            </td>
                                                        @else
                                                            <td id="{{ $i }}-{{ $e }}"
                                                                class="border width cursor-pointer available selectable">
                                                            </td>
                                                        @endif
                                                    @endif
                                                @endif
                                            @else
                                                <td id="{{ $i }}-{{ $e }}"
                                                    class="border width occupied"></td>
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
                        </div>
                        <!-- FIN DEL HORARIO DE JUAN -->

                        <button @click="showModalAbsence = true"
                            onclick="checkClass({{ isset($plan) ? $plan : 0 }},{{ Auth::user()->roles->pluck('id')[0] }});"
                            class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md"
                            {{-- onclick="saveSchedule({{ $plan }},'schedule.check')" --}} wire:click="edit()">Save</button>
                    @else
                        <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                            <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't
                                selected a schedule yet.</h2>
                            <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you buy
                                a plan of classes.</h2>
                            <a href="{{ route('shop') }}"
                                class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Shop</a>
                        </div>
                    @endif
                @endif

                @if ($role == 'student')
                    @if ($course->modality == 'synchronous')
                        <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                            <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't
                                selected a schedule yet.</h2>
                            <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you buy
                                a plan of classes.</h2>
                            <a href="{{ route('shop') }}"
                                class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Shop</a>
                        </div>
                    @else
                        <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                            <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">Stand By</h2>
                        </div>
                    @endif

                @endif

                @if ($role == 'teacher')
                    <div class="w-full" wire:ignore>
                        <table class="border" style="width: 100%">
                            <!--fila de los titulos-->
                            <tr>
                                <th class="width border">UTC</th>
                                <th class="width border">LOCAL</th>
                                @foreach ($days as $day)
                                    <th class="border width">
                                        {{ $day }}
                                    </th>
                                @endforeach
                            </tr>

                            @php
                                $e = 0;
                                $i = $university_schedule_start;
                            @endphp

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
                                        <td id="{{ $i }}-{{ $e }}"
                                            class="border width selectable preavailable">
                                        </td>
                                        @php
                                            $e++;
                                        @endphp
                                    @endforeach
                                    @php
                                        $e = 0;
                                    @endphp
                                </tr>
                                @php
                                    if ($i == 23) {
                                        $i = 0;
                                    } else {
                                        $i++;
                                    }
                                @endphp
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

                @if ($role == 'admin')
                @endif
            @else
                {{-- @role('student')
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                            @foreach ($schedules as $schedule)
                                <li class="mr-2">
                                    <a href="#"
                                        class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        <svg aria-hidden="true"
                                            class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd"></path>
                                        </svg>{{$schedule->enrolment->course->name}}
                                    </a>
                                </li>
                            @endforeach --}}
                {{-- <li class="mr-2">
                            <a href="#"
                                class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group"
                                aria-current="page">
                                <svg aria-hidden="true" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>Dashboard
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                <svg aria-hidden="true"
                                    class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                                    </path>
                                </svg>Settings
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                <svg aria-hidden="true"
                                    class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                        clip-rule="evenodd"></path>
                                </svg>Contacts
                            </a>
                        </li> --}}
                {{-- <li>
                            <a
                                class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
                        </li> --}}
                {{-- </ul>
                    </div>
                @endrole --}}


                @foreach ($schedules as $schedule)
                    <div class="w-full" wire:ignore>
                        <table class="border" style="width: 100%">
                            <!--fila de los titulos-->
                            <tr>
                                <th class="width border">UTC</th>
                                <th class="width border">LOCAL</th>
                                @foreach ($days as $day)
                                    <th class="border width">
                                        {{ $day }}
                                    </th>
                                @endforeach
                            </tr>
                            <!--filas seleccionables-->
                            @php
                                $e = 0;
                                $i = $university_schedule_start;
                            @endphp
                            {{-- @for ($i = 0; $i < $university_schedule_hours; $i++) --}}
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
                                        @if (in_array([$i, $e], $user_schedules))
                                            @if (in_array([$i, $e], $students_schedules) && $role != 'student')
                                                @foreach ($students as $student)
                                                    @if (in_array([$i, $e], $student->schedules->first()->selected_schedule))
                                                        {{-- {{dd($student->first_name)}} --}}
                                                        <td id="{{ $i }}-{{ $e }}"
                                                            class="border width selectable preavailable preselected">
                                                            <div onclick="location.href='{{ route('profile.show', $student->id) }}';"
                                                                class="text-sm text-green-100 font-bold name-student not-active cursor-pointer">
                                                                {{ $student->first_name }}
                                                                {{ $student->last_name }}
                                                            </div>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            @else
                                                <td id="{{ $i }}-{{ $e }}"
                                                    class="border width selectable preavailable preselected">
                                                    @if (in_array($i . '-' . $e, $date_classes))
                                                        <div
                                                            class="flex flex-wrap flex-row justify-end gap-x-1 gap-y-0.5 pl-1 pr-1 tool-tip invisible">
                                                            @foreach ($date_classes as $key => $value)
                                                                @if ($value === $i . '-' . $e)
                                                                    <button class="tooltip button_tooltip">
                                                                        <span
                                                                            class="tooltiptext mb-3">{{ $date_format_class[$key] . ' UTC' }}</span>
                                                                    </button>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </td>
                                            @endif
                                        @else
                                            @if (in_array([$i, $e], $teacher_schedule) && !in_array([$i, $e], $students_schedules))
                                                <td id="{{ $i }}-{{ $e }}"
                                                    class="border width selectable preavailable ">
                                                    @if (in_array($i . '-' . $e, $date_classes))
                                                        <div
                                                            class="flex flex-wrap flex-row justify-end gap-x-1 gap-y-0.5 pl-1 pr-1 tool-tip invisible">
                                                            @foreach ($date_classes as $key => $value)
                                                                @if ($value === $i . '-' . $e)
                                                                    <button class="tooltip button_tooltip_green">
                                                                        <span
                                                                            class="tooltiptext mb-3">{{ $date_format_class[$key] . ' UTC' }}</span>
                                                                    </button>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </td>
                                            @else
                                                <td id="{{ $i }}-{{ $e }}"
                                                    class="border width selectable notAvailable preoccupied ">
                                                    @if (in_array($i . '-' . $e, $date_classes))
                                                        <div
                                                            class="flex flex-wrap flex-row justify-end gap-x-1 gap-y-0.5 pl-1 pr-1 tool-tip invisible">
                                                            @foreach ($date_classes as $key => $value)
                                                                @if ($value === $i . '-' . $e)
                                                                    <button class="tooltip button_tooltip_green">
                                                                        <span
                                                                            class="tooltiptext mb-3">{{ $date_format_class[$key] . ' UTC' }}</span>
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
                        <button onclick="toggleCellBlock()" @click=" edit = true, editBtn = false "
                            wire:click="edit()"
                            class="inline-block bg-green-800 text-white px-4 py-2 my-5 rounded hover:bg-green-900 hover:text-white hover:no-underline"
                            x-show="editBtn" x-transition>Edit Schedule
                        </button>
                    </div>
                @endforeach

            @endif




            <x-modal type="info" name="showModalAbsence">
                <x-slot name="title">
                    Are you sure?
                </x-slot>

                <x-slot name="content">
                    @php
                        $data = session('data');
                        // dd($data);
                    @endphp
                    @if ($data != [])
                        <div class="pl-5 pr-5">
                            <h5 class="text-left">Dear Student:</h5>
                            <p class="text-left">The following classes will not be added to your schedule, nor
                                added to
                                your shopping cart, because in this period other students have the rescheduled
                                block.
                            </p>
                            <br>
                            @php
                                // $data = session('data');
                                
                                foreach ($data as $key => $value) {
                                    echo '<b>' . $value . '</b><br>';
                                }
                                session(['data' => []]);
                                // session(['user_schedule' => []]);
                            @endphp
                            {{-- {{session("data")}} --}}
                            <br>
                            <p class="text-left">For the next period you will have your full schedule.</p>
                            <p class="text-left">Do you wish to continue?</p>
                        </div>
                    @else
                        <p>Are you sure you want to save your schedule?</p>
                        <br>
                    @endif

                </x-slot>

                <x-slot name="footer" class="justify-center">
                    <button
                        onclick="saveSchedule({{ isset($plan) ? $plan : 0 }},'schedule.check',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                        class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModalAbsence = false, editBtn = true, edit = false">
                        Save
                    </button>
                    <button
                        class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModalAbsence = false ">
                        Cancel
                    </button>
                </x-slot>
            </x-modal>

            <x-modal type="info" name="showModal1">
                <x-slot name="title">
                    Are you sure?
                </x-slot>

                <x-slot name="content">
                    Are you sure you want to save your schedule?
                </x-slot>

                <x-slot name="footer" class="justify-center">
                    <button wire:click="edit()"
                        onclick="saveSchedule({{ isset($user_schedules) ? count($user_schedules) : 0 }},'schedule.update',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                        class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModal1 = false, editBtn = true, edit = false">
                        Save
                    </button>
                    <button wire:click="edit()"
                        class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showModal1 = false ">
                        Cancel
                    </button>
                </x-slot>
            </x-modal>

            {{-- @include('components.loading-state') --}}
            {{-- Clases para reagendar --}}


        </div>

    </div>
    {{-- @endif --}}

    <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/viselect.cjs.js') }}"></script>

    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>


    @if ($role == 'teacher' || $role == 'student')
        <script>
            var BT = $(".button-teacher");
            for (var i = 0; i < BT.length; i++) {
                BT[i].addEventListener('click', function() {
                    document.getElementById("link-schedule").click();
                });
            }

            // console.log("inicio");
            var hoyLocal = new Date(@json($hoy));

            var horaLocal = hoyLocal.getHours();
            // var horaUTC = hoyLocal.getUTCHours();
            var difHora = hoyLocal.getTimezoneOffset() / 60;
            var OpenUTC =
                @json($university_schedule_start); // Hora UTC a la que abre la academia en PERU! (06:00 am Hora local en peru) (07:00 am hora local)
            var OpenLocal = OpenUTC - difHora;

            //Asignar hora UTC y Local al Horario

            // cellsUTC = $('.UTC');
            var cellsLocal = $('.Local');
            for (var i = 0; i < cellsLocal.length; i++) {
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

            // console.log("hola1");
            var next_schedule = @json($next_schedule);

            if (next_schedule != null && next_schedule != []) {
                for (var i = 0; i < next_schedule.length; i++) {
                    next_schedule[i] = next_schedule[i][0] + "-" + next_schedule[i][1];
                }
            }

            var next = [];
            // console.log(next_schedule);

            function toggleCellBlock() {

                if (role == "teacher") {
                    $(".preoccupied").toggleClass("occupied");
                    $(".preoccupied").toggleClass("selectable");
                    $(".preoccupied").removeClass("selected");
                    $(".name-student").toggleClass("not-active")
                }

                $(".schedule_cell").toggleClass("cell_block");
                $(".preavailable").toggleClass("selectable");
                $(".preavailable").removeClass("selected");
                $(".preavailable").toggleClass("available");
                $(".preselected").addClass("selected");
                $(".tool-tip").toggleClass("invisible");
                $(".preoccupied").toggleClass("occupied");


                //$(".preoccupied").addClass("occupied");
                numClass = classSelected.length;
                init = false;
                classSelected = preClass;

                // console.log(classSelected)
            }


            var numClass = 0;
            var classSelected = [];
            var preClass = @json($schedule_user);
            // console.log(preClass);
            classSelected = preClass;
            // console.log(classSelected);
            numClass = classSelected.length;
            //$('.notAvailable').length + $('.preavailable').length
            var qtyClass = classSelected.length;
            if (role == "teacher") {
                qtyClass = ($('.notAvailable').length + $('.preavailable').length);
            }
            var preClassTd = [];
            preClass.forEach(element => {
                preClassTd.push(document.getElementById(element));
            });

            $(".preavailable").toggleClass("selectable");
            $(".notAvailable").toggleClass("selectable");
            $(".preselected").addClass("selected");
            // $(".preoccupied").addClass("occupied");
            $(".name-student").toggleClass("not-active");
            $(".tool-tip").toggleClass("invisible");

            if (next_schedule != null && next_schedule != []) {
                for (var i = 0; i < next_schedule.length; i++) {
                    $("#" + next_schedule[i]).toggleClass("next_schedule");
                }
            }

            var init = false;
            // console.log(preClassTd)
            var selection = new SelectionArea({
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
                        for (var el of store.stored) {
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
                        for (var el of added) {
                            if (!(el.classList.contains("selected"))) {
                                if (numClass < qtyClass) {
                                    el.classList.add("selected");
                                    classSelected.push(el.id);
                                    numClass++;
                                    //console.log("dos"+numClass);
                                }
                            }
                        }

                        for (var el of removed) {
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
    @endif

    @if ($role == 'guest')
        <script>
            console.log("Inicio Guest")

            function toggleCellBlock() {}
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


            var numClass = 0;

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
                var cellsLocal = $('.Local');
                for (var i = 0; i < cellsLocal.length; i++) {
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
            var qtyClass = {{ $plan }};
            var classSelected = [];
            var preClass = @json($data_selected_format);
            classSelected = preClass;
            var preClassTd = [];
            preClass.forEach(element => {
                preClassTd.push(document.getElementById(element));
            });
            var init = true;

            var selection = new SelectionArea({
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
                        for (var el of store.stored) {
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
                        for (var el of added) {
                            if (!(el.classList.contains("selected"))) {
                                if (numClass < qtyClass) {
                                    el.classList.add("selected");
                                    classSelected.push(el.id);
                                    numClass++;
                                    //console.log("dos"+numClass);
                                }
                            }
                        }

                        for (var el of removed) {
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
            for (var i = 0; i < cellsLocal.length; i++) {
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

                if (OpenLocal >= 23) {
                    OpenLocal = 0;
                } else {
                    OpenLocal++;
                }
            }

            var BT = $(".button-teacher");
            for (var i = 0; i < BT.length; i++) {
                BT[i].addEventListener('click', function() {
                    document.getElementById("link-schedule").click();
                });
            }
        </script>
    @endif


</div>
