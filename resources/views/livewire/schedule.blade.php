<div>
    <div class="">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

        <a id="link-schedule" href="#link-s"></a>
        <a name="link-s" class=""></a>
        <br>
        <div wire:loading wire:target="showTeacherInfo, loadSelectingSchedule, checkForClass">
            @include('components.loading-state')
        </div>



        {{-- @if ($role != 'admin') --}}
        <div class="container mx-auto mt-10 text-gray-600 table-tour-seccion" x-data="{ editBtn: true, edit: false, showModal1: false, showModal2: false, showModal3: false, showModalAbsence: @entangle('showModalAbsence'), event: {{ $event }}, loadingState: false }" x-cloak>
            <div class="wrapper bg-white rounded w-full">
                {{-- <p x-show="event">Event</p> --}}
                <!-- INICIO DEL HORARIO DE JUAN -->
                @if (
                    ($role == 'admin' && $mode != 'absence') ||
                        ((!isset($user_schedules) || $user_schedules == null || count($user_schedules) <= 0) && $role != 'admin'))
                    <!-- INICIO HORARIOS INEXISTENTES -->
                    <!-- HORARIO DE INVITADO -->
                    @if ($role == 'guest')
                        @if ($mode == 'edit')

                            <h3 class="text-4xl font-bold text-gray-800">Select your schedule</h3>
                            <div class=" flex justify-between">
                                <h4 class="text-2xl font-bold text-gray-400 mb-8">Please, select {{ $plan }}
                                    blocks
                                    to
                                    continue
                                </h4>
                                <h4 class="text-2xl font-bold text-gray-400 mb-8">
                                    @if ($name != null)
                                        Teacher: {{ $name }}
                                    @endif
                                </h4>
                            </div>

                            <!-- INICIO DEL HORARIO -->
                            <div>

                                <table class="border table-tour" style="width: 100%">
                                    <!--fila de los titulos-->
                                    <tr>
                                        {{-- <th class="width border">UTC</th> --}}
                                        <th>
                                            LOCAL TIME
                                        </th>
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
                                                @if ($i == 0)
                                                    12:00 AM
                                                @elseif ($i < 12)
                                                    @if ($i < 10)
                                                        0{{ $i }}:00 AM
                                                    @else
                                                        {{ $i }}:00 AM
                                                    @endif
                                                @elseif ($i == 12)
                                                    12:00 PM
                                                @else
                                                    @if ($i - 12 < 10)
                                                        0{{ $i - 12 }}:00 PM
                                                    @else
                                                        {{ $i - 12 }}:00 PM
                                                    @endif
                                                @endif
                                            </td>
                                            {{-- <td class="width border Local"></td> --}}
                                            @foreach ($days as $day)
                                                @if (in_array([$i, $e], $schedule))
                                                    {{-- {{ dd(get_defined_vars()) }} --}}
                                                    @if (in_array([$i, $e], $students_schedules))
                                                        <td id="{{ $i }}-{{ $e }}"
                                                            class="border width occupied"></td>
                                                    @else
                                                        {{-- @php dd(isFree($abcense_classes,"20-4",$days_rest)); @endphp --}}

                                                        {{-- {{dd($days_rest, $abcense_classes, $this->notFree($abcense_classes, '16-2', $days_rest))}} --}}
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
                                wire:click="edit()">Save</button>
                        @elseif ($mode == 'one' || $mode == 'absence')
                            @if ($mode == 'one')
                                <h4 class="text-2xl font-bold text-gray-400 mb-8">
                                    Please, select the day for your exam
                                </h4>
                            @else
                                <h1 class="font-medium leading-tight text-base mt-0 mb-2 text-left text-gray-600">Select
                                    the
                                    new
                                    date:
                                </h1>
                            @endif

                            <div>
                                <table id="absence_table" class="border" style="width: 100%">
                                    <!--fila de los titulos-->
                                    <thead>
                                        <tr>
                                            {{-- <th class="width border">UTC</th> --}}
                                            <th class="" style="">
                                                LOCAL TIME</th>
                                            @foreach ($days as $day)
                                                <th class="border width" style="">
                                                    {{ $day }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <!--filas seleccionables-->
                                    <tbody>
                                        @php
                                            $e = 0;
                                            $d = 0;
                                            $i = $university_schedule_start;
                                        @endphp
                                        @for ($week = 0; $week < $weeks; $week++)
                                            <tr>
                                                <td class="width border"></td>
                                                <td class="width border"></td>
                                                <td class="width border">{{ $table_date[$d + 0] }}</td>
                                                <td class="width border">{{ $table_date[$d + 1] }}</td>
                                                <td class="width border">{{ $table_date[$d + 2] }}</td>
                                                <td class="width border">{{ $table_date[$d + 3] }}</td>
                                                <td class="width border">{{ $table_date[$d + 4] }}</td>
                                                <td class="width border">{{ $table_date[$d + 5] }}</td>
                                                <td class="width border">{{ $table_date[$d + 6] }}</td>
                                            </tr>
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
                                                    {{-- <td class="width border Local"></td> --}}
                                                    @foreach ($days as $day)
                                                        @if (in_array([$i, $e], $teacher_schedule) &&
                                                                (new Carbon\carbon($day_format_range[$d]))->addHour($i)->greaterThan($now) &&
                                                                (new Carbon\carbon($day_format_range[$d]))->addHour($i)->lessThan($period_end_aux->copy()->addDay()))
                                                            {{-- @php dd(($i+6)."-".$day_range[$d]); @endphp --}}
                                                            {{-- {{dd($abcense_classes, $day_range)}} --}}
                                                            {{-- {{dump($i . '-' . $day_range[$d].' -- '.$abcense_classes[0])}} --}}
                                                            @if (in_array([$i, $e], $students_schedules) || in_array($i . '-' . $day_range[$d], $abcense_classes_days))
                                                                <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                                    class="border width occupied">
                                                                </td>
                                                                <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                                    class="border width cursor-pointer available selectable">
                                                                </td>
                                                            @else
                                                                <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                                    class="border width cursor-pointer available selectable">
                                                                </td>
                                                            @endif
                                                        @else
                                                            <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                                class="border width occupied">
                                                            </td>
                                                        @endif
                                                        @php
                                                            $e++;
                                                            $d++;
                                                        @endphp
                                                    @endforeach
                                                    @php
                                                        $e = 0;
                                                        $d -= 7;
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
                                            @php
                                                
                                                $d += 7;
                                            @endphp
                                        @endfor
                                    </tbody>
                                </table>
                                <!-- FIN DEL HORARIO DE JUAN -->

                                <br>


                            </div>

                            @if ($mode == 'one')
                                <div class="grid justify-center">
                                    <div>
                                        <button
                                            class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md"
                                            onclick="saveSchedule(1,'schedule.check',1)">Submit</button>
                                    </div>
                                </div>
                            @else
                                <div class="mt-10 grid grid-rows-2 grid-flow-col gap-4 justify-center ...">
                                    <div class="flex space-x-3 items-center">
                                        <input class="@error('message') border-red-500 @enderror" type="checkbox"
                                            name="consent_checkbox" id="consent_checkbox" required>
                                        <label for="consent_checkbox">I accept the <a href="#"
                                                class="text-blue-600 hover:underline">terms for class
                                                recovery</a></label>
                                    </div>
                                </div>

                                <div class="grid justify-center">
                                    <div>
                                        <button
                                            class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md"
                                            onclick="saveAbsence({{ $id }},'classes.update')">Submit</button>
                                    </div>
                                </div>
                            @endif


                            {{-- </div> --}}
                        @else
                            <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                                <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't
                                    selected a schedule yet.</h2>
                                <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you buy
                                    a plan of classes.</h2>
                                <a href="{{ route('shop') }}"
                                    class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline shop-button">Shop</a>
                            </div>
                        @endif
                    @endif
                    <!-- HORARIO DE ESTUDIANTE -->
                    @if ($role == 'student')
                        @if ($mode == 'edit')
                            <h3 class="text-4xl font-bold text-gray-800">Select your schedule</h3>
                            <div class=" flex justify-between">
                                <h4 class="text-2xl font-bold text-gray-400 mb-8">Please, select {{ $plan }}
                                    blocks
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
                                        {{-- <th class="width border">UTC</th> --}}
                                        <th>LOCAL TIME</th>
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
                                                @if ($i == 0)
                                                    12:00 AM
                                                @elseif ($i < 12)
                                                    @if ($i < 10)
                                                        0{{ $i }}:00 AM
                                                    @else
                                                        {{ $i }}:00 AM
                                                    @endif
                                                @elseif ($i == 12)
                                                    12:00 PM
                                                @else
                                                    @if ($i - 12 < 10)
                                                        0{{ $i - 12 }}:00 PM
                                                    @else
                                                        {{ $i - 12 }}:00 PM
                                                    @endif
                                                @endif
                                            </td>
                                            {{-- <td class="width border Local"></td> --}}
                                            @foreach ($days as $day)
                                                @if (in_array([$i, $e], $schedule))
                                                    @if (in_array([$i, $e], $students_schedules))
                                                        <td id="{{ $i }}-{{ $e }}"
                                                            class="border width occupied"></td>
                                                    @else
                                                        {{-- @php dd(isFree($abcense_classes,"20-4",$days_rest)); @endphp --}}

                                                        {{-- {{dd($days_rest, $abcense_classes, $this->notFree($abcense_classes, '16-2', $days_rest))}} --}}
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
                                wire:click="edit()">Save</button>
                        @else
                            @if ($course->modality == 'synchronous')
                                <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                                    <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't
                                        selected a schedule yet.</h2>
                                    <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you
                                        buy
                                        a plan of classes.</h2>
                                    <a href="{{ route('shop') }}"
                                        class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline shop-button">Shop</a>
                                </div>
                            @else
                                <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                                    <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">Stand By</h2>
                                </div>
                            @endif
                        @endif

                    @endif
                    <!-- HORARIO DE PROFESOR -->
                    @if ($role == 'teacher')
                        <div class="w-full" wire:ignore>
                            <table class="border" style="width: 100%">
                                <!--fila de los titulos-->
                                <tr>
                                    {{-- <th class="width border">UTC</th> --}}
                                    <th class="width border">LOCAL TIME</th>
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
                                        {{-- <td class="width border Local"></td> --}}
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
                            <button onclick="toggleCellBlock()" @click=" edit = true, editBtn = false "
                                wire:click="edit()"
                                class="teachers-edit-schedule-button inline-block bg-green-800 text-white px-4 py-2 my-5 rounded hover:bg-green-900 hover:text-white hover:no-underline"
                                x-show="editBtn" x-transition>Edit Schedule
                            </button>
                        </div>
                    @endif

                    {{-- @if ($role == 'admin')
                    @endif --}}
                @else
                    @if ($mode == 'show')
                        @foreach ($schedules as $schedule)
                            <div class="w-full" wire:ignore>
                                <table class="border" style="width: 100%" id="selectable-container">
                                    <!--fila de los titulos-->
                                    <tr>
                                        {{-- <th class="width border">UTC</th> --}}
                                        <th class="width border">LOCAL TIME</th>
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
                                                @if ($i == 0)
                                                    12:00 AM
                                                @elseif ($i < 12)
                                                    @if ($i < 10)
                                                        0{{ $i }}:00 AM
                                                    @else
                                                        {{ $i }}:00 AM
                                                    @endif
                                                @elseif ($i == 12)
                                                    12:00 PM
                                                @else
                                                    @if ($i - 12 < 10)
                                                        0{{ $i - 12 }}:00 PM
                                                    @else
                                                        {{ $i - 12 }}:00 PM
                                                    @endif
                                                @endif
                                            </td>
                                            {{-- <td class="width border Local"></td> --}}
                                            @foreach ($days as $day)
                                                @if (in_array([$i, $e], $user_schedules))
                                                    @if (in_array([$i, $e], $students_schedules) && $role != 'student')
                                                        @foreach ($students as $student)
                                                            @php
                                                                $student_schedule = $student->schedules->first();
                                                                if (empty($student_schedule)) {
                                                                    dd('Estudiante sin horario: ', $student);
                                                                } else {
                                                                    $student_schedule = $student_schedule->selected_schedule;
                                                                    $schedule_utc = [];
                                                                    $timezone = carbon\Carbon::now()->setTimezone($this->user->timezone);
                                                                    foreach ($student_schedule as $key => $value) {
                                                                        $date = Carbon\Carbon::now();
                                                                        $date_local = Carbon\Carbon::parse(
                                                                            'Next ' .
                                                                                Carbon\Carbon::now()
                                                                                    ->setISODate($date->year, $date->weekOfYear, $value[1])
                                                                                    ->format('l') .
                                                                                ' at ' .
                                                                                $value[0] .
                                                                                ':00',
                                                                        );
                                                                        $schedule_utc[$key][0] = (int) $date_local->copy()->addHours($timezone->offsetHours)->hour;
                                                                        $schedule_utc[$key][1] = (int) $date_local->copy()->addHours($timezone->offsetHours)->dayOfWeek;
                                                                    }
                                                                    $student_schedule = $schedule_utc;
                                                                }
                                                            @endphp
                                                            @if (in_array([$i, $e], $student_schedule))
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
                                                                                    class="tooltiptext mb-3">{{ $date_format_class[$key] }}</span>
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
                                                                            <button
                                                                                class="tooltip button_tooltip_green">
                                                                                <span
                                                                                    class="tooltiptext mb-3">{{ $date_format_class[$key] }}</span>
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
                                                                            <button
                                                                                class="tooltip button_tooltip_green">
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
                            @hasanyrole('teacher')
                                <div class="flex items-center flex-col">
                                    <button onclick="toggleCellBlock()" @click=" edit = true, editBtn = false "
                                        wire:click="edit()"
                                        class="inline-block bg-green-800 text-white px-4 py-2 my-5 rounded hover:bg-green-900 hover:text-white hover:no-underline"
                                        x-show="editBtn" x-transition>Edit Schedule
                                    </button>
                                </div>
                            @endhasanyrole
                        @endforeach
                    @elseif($mode == 'absence')
                        <h1 class="font-medium leading-tight text-base mt-0 mb-2 text-left text-gray-600">Select the
                            new
                            date:
                        </h1>
                        <table wire:ignore id="absence_table" class="border" style="width: 100%">

                            <thead>
                                <tr>
                                    {{-- <th class="width border">UTC</th> --}}
                                    <th class="" style="">LOCAL TIME</th>
                                    @foreach ($days as $day)
                                        <th class="border width" style="">
                                            {{ $day }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $e = 0;
                                    $d = 0;
                                    $i = $university_schedule_start;
                                @endphp
                                @for ($week = 0; $week < 4; $week++)
                                    <tr>
                                        <td class="width border"></td>
                                        <td class="width border">{{ $table_date[$d + 0] }}</td>
                                        <td class="width border">{{ $table_date[$d + 1] }}</td>
                                        <td class="width border">{{ $table_date[$d + 2] }}</td>
                                        <td class="width border">{{ $table_date[$d + 3] }}</td>
                                        <td class="width border">{{ $table_date[$d + 4] }}</td>
                                        <td class="width border">{{ $table_date[$d + 5] }}</td>
                                        <td class="width border">{{ $table_date[$d + 6] }}</td>
                                    </tr>

                                    @for ($hour = 0; $hour < $university_schedule_hours; $hour++)
                                        <tr class="border">
                                            <td class="width border UTC">
                                                @if ($i == 0)
                                                    12:00 AM
                                                @elseif ($i < 12)
                                                    @if ($i < 10)
                                                        0{{ $i }}:00 AM
                                                    @else
                                                        {{ $i }}:00 AM
                                                    @endif
                                                @elseif ($i == 12)
                                                    12:00 PM
                                                @else
                                                    @if ($i - 12 < 10)
                                                        0{{ $i - 12 }}:00 PM
                                                    @else
                                                        {{ $i - 12 }}:00 PM
                                                    @endif
                                                @endif
                                            </td>
                                            {{-- <td class="width border Local"></td> --}}

                                            @foreach ($days as $day)
                                                @if (in_array([$i, $e], $schedule) && (new Carbon\carbon($day_format_range[$d]))->addHour($i)->greaterThan($now))
                                                    {{-- {{dd($abcense_classes, in_array('13-5', $abcense_classes), $day_range)}} --}}
                                                    @if (in_array([$i, $e], $students_schedules) || in_array($i . '-' . $day_range[$d], $abcense_classes_days))
                                                        <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                            class="border width occupied">
                                                        </td>
                                                    @else
                                                        <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                            class="border width cursor-pointer available selectable">
                                                        </td>
                                                    @endif
                                                @else
                                                    <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                        class="border width occupied">
                                                    </td>
                                                @endif
                                                @php
                                                    $e++;
                                                    $d++;
                                                @endphp
                                            @endforeach
                                            @php
                                                $e = 0;
                                                $d -= 7;
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
                                    @php
                                        
                                        $d += 7;
                                    @endphp
                                @endfor
                            </tbody>
                        </table>
                    @endif
                @endif
            </div>





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
                        onclick="saveSchedule({{ isset($plan) ? $plan : 0 }},'schedule.check',{{ $user->roles->pluck('id')[0] }});toggleCellBlock()"
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
                        onclick="saveSchedule({{ isset($user_schedules) ? count($user_schedules) : 0 }},'schedule.update',{{ $user->roles->pluck('id')[0] }});toggleCellBlock()"
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

    <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/viselect.cjs.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>


    @if ($role == 'teacher' || ($role == 'student' && $mode != 'absence' && ($role == 'student' && $mode != 'edit')))
        <script>
            // console.log("holaholahola");
            var BT = $(".button-teacher");
            for (var i = 0; i < BT.length; i++) {
                BT[i].addEventListener('click', function() {
                    document.getElementById("link-schedule").click();
                });
            }

            var timezone = @json(auth()->user()->timezone);
            var hoyLocal = new Date(new Date(@json($hoy)).toLocaleString('en-US', {
                timezone
            }));
            var horaLocal = hoyLocal.getHours();
            var difHora = hoyLocal.getTimezoneOffset() / 60;
            var OpenUTC = @json($university_schedule_start);
            var OpenLocal = OpenUTC - difHora;

            var cellsLocal = $('.Local');
            for (var i = 0; i < cellsLocal.length; i++) {
                if (OpenLocal < 0) {
                    OpenLocal += 24;
                }

                var horaFormateada = OpenLocal;
                if (OpenLocal < 10) {
                    horaFormateada = "0" + OpenLocal;
                } else if (OpenLocal >= 10 && OpenLocal < 12) {
                    horaFormateada = OpenLocal;
                } else if (OpenLocal >= 12 && OpenLocal < 22) {
                    horaFormateada = OpenLocal - 12;
                    horaFormateada = "0" + horaFormateada;
                } else if (OpenLocal >= 22) {
                    horaFormateada = OpenLocal - 12;
                }

                if (OpenLocal < 12) {
                    cellsLocal[i].innerHTML = horaFormateada + ":00 AM";
                } else if (OpenLocal === 12) {
                    cellsLocal[i].innerHTML = "12:00 PM";
                } else {
                    cellsLocal[i].innerHTML = horaFormateada + ":00 PM";
                }

                if (OpenLocal >= 23) {
                    OpenLocal = 0;
                } else {
                    OpenLocal++;
                }
            }

            var role = "{{ Auth::user()->roles->pluck('name')[0] }}";

            // $(document).ready(function() {
            //     var selectable = $("#selectable-container").selectable();

            //     $('body').on("contentChanged", event => {
            //         //  console.log("hola")
            //         var cells = $(".selected");
            //         // console.log(cells);
            //         var role = "{{ Auth::user()->roles->pluck('name')[0] }}";

            //         if (role == "student") {

            //             $(".cell").click(function() {
            //                 var selectedCells = 0;
            //                 var nOfClasses =
            //                 {{ isset($user_schedules) ? count($user_schedules) : 0 }};

            //                 selectedCells = $(".ui-selected").length;

            //                 if ($(this).hasClass("ui-selected") && $(this).hasClass("cell_block")) {
            //                     $(this).removeClass("ui-selected");
            //                 } else if ($(this).hasClass("cell_block") && (selectedCells < nOfClasses)) {
            //                     $(this).addClass("ui-selected");
            //                 }
            //             });

            //         }
            //         // else if (role == "teacher") {
            //         //     var disabled = $('#selectable-container .selectable').selectable("option", "disabled");
            //         //     $('#selectable-container .selectable').selectable("option", "disabled", !disabled);
            //         //     $('#selectable-container .selectable').on("selectableselected", function(event, ui) {
            //         //         // $.inArray("taken",ui.selected.classList);
            //         //         if ($.inArray("selected", ui.classList) > 0) {
            //         //             console.log(true);
            //         //         } else {
            //         //             console.log(false);
            //         //         }
            //         //     });
            //         // }

            //     });
            // });


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
                // console.log(element);
                preClassTd.push(document.getElementById(element));
            });
            // console.log(preClass, preClassTd);

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
                    // console.log(init)
                    // console.log(store)
                    // if (!event.ctrlKey && !event.metaKey) {
                    //     // console.log(store)
                    //     for (var el of store.stored) {
                    //         // console.log(el.classList)
                    //         if (el.classList.contains("selected") && el.classList.contains("selectable")) {
                    //             el.classList.remove("selected");
                    //             classSelected = classSelected.filter(function(cf) {
                    //                 return cf !== el.id;
                    //             });
                    //             if (numClass > 0)
                    //                 numClass--;
                    //             // console.log("uno"+numClass);
                    //         }
                    //     }

                    //     selection.clearSelection();
                    // }
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


            //PARTE DE EL HORARIO CON UNA SOLA CLASE
            var hourForDays = @json($university_schedule_hours) + 1;
            // console.log("holaholahola");
            $("#absence_table").DataTable({
                searching: false,
                ordering: false,
                pageLength: hourForDays,
                info: false,
                bLengthChange: false,
                pagingType: "simple",
                // stateSave: true,
            });
        </script>
    @endif

    @if ($role == 'guest' || $mode == 'absence')
        <script>
            // console.log("Inicio Guest")

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

                var timezone = @json(auth()->user()->timezone);
                var hoyLocal = new Date(new Date(@json($hoy)).toLocaleString('en-US', {
                    timezone
                }));
                var horaLocal = hoyLocal.getHours();
                var difHora = hoyLocal.getTimezoneOffset() / 60;
                var OpenUTC = @json($university_schedule_start);
                var OpenLocal = OpenUTC - difHora;

                var cellsLocal = $('.Local');
                for (var i = 0; i < cellsLocal.length; i++) {
                    if (OpenLocal < 0) {
                        OpenLocal += 24;
                    }

                    var horaFormateada = OpenLocal;
                    if (OpenLocal < 10) {
                        horaFormateada = "0" + OpenLocal;
                    } else if (OpenLocal >= 10 && OpenLocal < 12) {
                        horaFormateada = OpenLocal;
                    } else if (OpenLocal >= 12 && OpenLocal < 22) {
                        horaFormateada = OpenLocal - 12;
                        horaFormateada = "0" + horaFormateada;
                    } else if (OpenLocal >= 22) {
                        horaFormateada = OpenLocal - 12;
                    }

                    if (OpenLocal < 12) {
                        cellsLocal[i].innerHTML = horaFormateada + ":00 AM";
                    } else if (OpenLocal === 12) {
                        cellsLocal[i].innerHTML = "12:00 PM";
                    } else {
                        cellsLocal[i].innerHTML = horaFormateada + ":00 PM";
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
            var timezone = @json(auth()->user()->timezone);
            var hoyLocal = new Date(new Date(@json($hoy)).toLocaleString('en-US', {
                timezone
            }));
            var horaLocal = hoyLocal.getHours();
            var difHora = hoyLocal.getTimezoneOffset() / 60;
            var OpenUTC =
                @json($university_schedule_start); // Hora UTC a la que abre la academia en PERU! (06:00 am Hora local en peru) (07:00 am hora local)
            var OpenLocal = OpenUTC - difHora;

            //Asignar hora UTC y Local al Horario
            cellsLocal = $('.Local');
            for (var i = 0; i < cellsLocal.length; i++) {
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


            var hourForDays = @json($university_schedule_hours) + 1;
            var DT = $("#absence_table").DataTable({
                searching: false,
                ordering: false,
                pageLength: hourForDays,
                info: false,
                bLengthChange: false,
                pagingType: "simple",
                // stateSave: true,
            });
        </script>
    @endif

    @if ($role == 'student' && $mode == 'edit')
        <script>
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

                var timezone = @json(auth()->user()->timezone);
                var hoyLocal = new Date(new Date(@json($hoy)).toLocaleString('en-US', {
                    timezone
                }));
                var horaLocal = hoyLocal.getHours();
                var difHora = hoyLocal.getTimezoneOffset() / 60;
                var OpenUTC = @json($university_schedule_start);
                var OpenLocal = OpenUTC - difHora;

                var cellsLocal = $('.Local');
                for (var i = 0; i < cellsLocal.length; i++) {
                    if (OpenLocal < 0) {
                        OpenLocal += 24;
                    }

                    var horaFormateada = OpenLocal;
                    if (OpenLocal < 10) {
                        horaFormateada = "0" + OpenLocal;
                    } else if (OpenLocal >= 10 && OpenLocal < 12) {
                        horaFormateada = OpenLocal;
                    } else if (OpenLocal >= 12 && OpenLocal < 22) {
                        horaFormateada = OpenLocal - 12;
                        horaFormateada = "0" + horaFormateada;
                    } else if (OpenLocal >= 22) {
                        horaFormateada = OpenLocal - 12;
                    }

                    if (OpenLocal < 12) {
                        cellsLocal[i].innerHTML = horaFormateada + ":00 AM";
                    } else if (OpenLocal === 12) {
                        cellsLocal[i].innerHTML = "12:00 PM";
                    } else {
                        cellsLocal[i].innerHTML = horaFormateada + ":00 PM";
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
            var timezone = @json(auth()->user()->timezone);
            var hoyLocal = new Date(new Date(@json($hoy)).toLocaleString('en-US', {
                timezone
            }));
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


            var hourForDays = @json($university_schedule_hours) + 1;
            var DT = $("#absence_table").DataTable({
                searching: false,
                ordering: false,
                pageLength: hourForDays,
                info: false,
                bLengthChange: false,
                pagingType: "simple",
                // stateSave: true,
            });
        </script>
    @endif

</div>
