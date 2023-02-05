<x-app-layout>

    @php
        
        $university_schedule_start = $university_schedule[0];
        $university_schedule_end = $university_schedule[1];
        $university_schedule_hours = $university_schedule[2];
        
        $hoy = (new Carbon\Carbon())->toCookieString();
        // $tz = session('tz');
        
        // $hoyLoc = Carbon\Carbon::now()->toCookieString();
        // $ip_add = $_SERVER['REMOTE_ADDR'];
        
        $current_period = App\Http\Controllers\ApportionmentController::currentPeriod();
        // $period_start_c = new Carbon\Carbon($current_period[0]);
        $period_end_c = new Carbon\Carbon($current_period[1]);
        // $period_start = $period_start_c->format('Y/m/d');
        $period_end = $period_end_c->format('Y/m/d');
        
        // $now = new Carbon\Carbon();
        
        // $date_range = new Carbon\CarbonPeriod($period_start_c->copy()->subDay(), $period_end_c);
        // $day_format_range = [];
        // $period_range = [];
        // $day_range = [];
        // $table_date = [];
        
        // foreach ($date_range as $key => $date) {
        
        //     $day_format_range[$key] = $date->format('Y-m-d');
        //     $period_range[$key] = $date->format('m-d');
        //     $day_range[$key] = $date->format('d');
        //     $table_date[$key] = $date->format('d/m');
        
        // }
        
        // $abcense = App\Models\Classes::select('start_date')
        //     ->whereBetween('start_date', [$period_start_c->copy()->subDay()->toDateTimeString(), $period_end_c->toDateTimeString()])
        //     ->get();
        
        // foreach ($abcense as $key => $value) {
        //     $abcense[$key] = $value->start_date;
        // }
        
        // foreach ($abcense as $key => $value) {
        //     $abcense[$key] = new Carbon\Carbon($abcense[$key]);
        // }
        
        // $abcense_classes = [];
        // foreach ($abcense as $key => $value) {
        //     $abcense_classes[$key] = $abcense[$key]->isoFormat('H') . '-' . $abcense[$key]->format('d');
        
        // }
        
        // function isFree($a, $buscado, $plan)
        // {
        //     $i = 0;
        //     if (is_array($a)) {
        //         foreach ($a as $v) {
        //             if ($buscado === $v) {
        //                 $i++;
        //             }
        //         }
        //     }
        //     return $i;
        // }
        
        $enrolment = auth()
            ->user()
            ->enrolments->first();
        $course_id = null;
        $course_modality = null;
        
        if ($enrolment != null) {
            $course_id = $enrolment->course->id;
            $course_modality = $enrolment->course->modality;
        }
        
    @endphp


    @if (session('message'))

        <div x-data="{ showModal1: true }">
            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                x-show="showModal1" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                    <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
                        @click.outside="showModal1 = false" x-show="showModal1"
                        x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                        x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                        x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                        <header class="flex items-center justify-between p-4 pb-2 text-lg">
                            <h2 class="font-semibold">Scheduled Changed</h2>
                            <button wire:click="edit()" class="focus:outline-none p-2" @click="showModal1 = false">
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </button>
                        </header>
                        <main class="p-4 pt-2">
                            <p class="mb-3">
                                {{ session('message') }}
                            </p>
                            @isset($affected_students)
                                @if (count($affected_students) > 0)
                                    <ul class="list-inside list-disc">
                                        @foreach ($users as $user)
                                            @if (in_array($user->id, $affected_students))
                                                <li class="font-bold">{{ $user->first_name }}
                                                    {{ $user->last_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @php
                                        session()->forget('affected_students');
                                    @endphp
                                @endif
                            @endisset
                        </main>
                        <footer class="p-2"></footer>
                    </div>
                </div>
            </div>
        </div>
        @php
            session()->forget('message');
        @endphp
    @endif


    <div class="flex flex-col bg-white" x-data="{ weekSchedule: false, monthlySchedule: true }"
        @showdate.window="weekSchedule=true, monthlySchedule=false">
        <div class="flex space-x-4 p-4 bg-gray-100 mx-3 rounded-xl">
            <div class="wrapper bg-white rounded w-full p-24 form-tour">
                <div class="dateReason-tour">
                    <h1 class="font-medium leading-tight text-xl mt-0 mb-2 text-center text-gray-500">Class to
                        reschedule:
                        {{ $class_date }}</h1>

                    <div class="mt-10 mb-5 grid grid-rows-1">
                        <input class="w-full" type="text" name="absence_reason" id="absence_reason"
                            placeholder="Reason for rescheduling" required>
                    </div>
                </div>
                <div class="container mx-auto" x-data="{ editBtn: true, edit: false, showModal1: false, showModal2: false, showModal3: false, showModalAbsence: false, loadingState: false }" x-cloak>

                    <div class="wrapper bg-white rounded  w-full schedule-tour">

                        @livewire('schedule', ['plan' => '1', 'user_id' => auth()->id(), 'mode' => 'absence', 'course_id' => $course_id, 'id_class' => $id])
                        {{-- @php
                            $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];
                            $aux = [];
                        @endphp --}}

                        {{-- <h1 class="font-medium leading-tight text-base mt-0 mb-2 text-left text-gray-600">Select the new
                            date:
                        </h1>
                        <table id="absence_table" class="border" style="width: 100%">

                            <thead>
                                <tr>
                                    <th class="width border">UTC</th>
                                    <th class="" style="">LOCAL</th>
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
                                                @if ($i < 10)
                                                    0{{ $i }}:00
                                                @else
                                                    {{ $i }}:00
                                                @endif
                                            </td>
                                            <td class="width border Local">

                                            </td>
                                            
                                            @foreach ($days as $day)
                                                @if (in_array([$i, $e], $teacher_schedule) && (new Carbon\carbon($day_format_range[$d]))->addHour($i)->greaterThan($now))

                                                    @if (in_array([$i, $e], $students_schedules) || in_array($i . '-' . $day_range[$d], $abcense_classes))
                                                        <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                            class="border width occupied bg-gray-100">
                                                        </td>
                                                    @else
                                                        <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                            class="border width cursor-pointer available selectable">
                                                        </td>
                                                    @endif
                                                @else
                                                    <td id="{{ $i }}-{{ $e }}-{{ $week }}-{{ $period_range[$d] }}"
                                                        class="border width occupied bg-gray-100">
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

                    </div>
                    --}}
                    <div class="mt-10 grid grid-rows-2 grid-flow-col gap-4 justify-center ...">
                        <div class="flex space-x-3 items-center terms-tour">
                            <input class="@error('message') border-red-500 @enderror" type="checkbox"
                                name="consent_checkbox" id="consent_checkbox" required>
                            <label for="consent_checkbox">I accept the <a href="#"
                                    class="text-blue-600 hover:underline">terms for class recovery</a></label>
                        </div>
                    </div>

                    <div class="grid justify-center">
                        <div>
                            <button class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md"
                                onclick="saveAbsence({{ $id }},'classes.update')">Submit</button>
                        </div>
                    </div>




                    </div>
                </div>
            </div>
            @role('student')
                <x-shepherd-tour tourName="students/rescheduling" role="student" />
            @endrole
        </div>

        @php
            
            $user = auth()->user()->id;
            $teacher = App\Models\User::find($teacher_id);
            $teacher_class = $teacher->teacherClasses;
            
            $teacher_classes = [];
            
            foreach ($teacher_class as $key => $value) {
                $teacher_classes[$key] = $value->start_date;
            }
            
            $teacher_schedule = $teacher->schedules[0]->selected_schedule;
            
            // $scheduled_classes;
            // $students = [];
            // $students_schedules = [];
            // $scheduled_classes = App\Models\Enrolment::select('student_id')
            //     ->where('teacher_id', $teacher_id)
            //     ->where('student_id', '!=', $user)
            //     ->get();
            
            // foreach ($scheduled_classes as $key => $value) {
            //     $students[$key] = $value->student_id;
            // }
            // $students = App\Models\User::find($students);
            
            // foreach ($students as $key => $value) {
            //     $students[$key][1] = App\Models\Schedule::select('selected_schedule')
            //         ->where('user_id', $value->id)
            //         ->get();
            //     $students[$key][1] = $students[$key][1][0]->selected_schedule;
            // }
            
            // foreach ($students as $student) {
            //     $students_schedules[] = $student[1];
            // }
            // $students_schedules = array_merge(...$students_schedules);
            
            $teacher_classes_encode = json_encode($teacher_classes);
            $teacher_schedule_encode = json_encode($teacher_schedule);
            
        @endphp


        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

        {{-- <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script> --}}
        <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>

        <script>
            // 0: "constructor"
            // 1: "toString"
            // 2: "toDateString"
            // 3: "toTimeString"
            // 4: "toISOString"
            // 5: "toUTCString"
            // 6: "toGMTString"
            // 7: "getDate"
            // 8: "setDate"
            // 9: "getDay"
            // 10: "getFullYear"
            // 11: "setFullYear"
            // 12: "getHours"
            // 13: "setHours"
            // 14: "getMilliseconds"
            // 15: "setMilliseconds"
            // 16: "getMinutes"
            // 17: "setMinutes"
            // 18: "getMonth"
            // 19: "setMonth"
            // 20: "getSeconds"
            // 21: "setSeconds"
            // 22: "getTime"
            // 23: "setTime"
            // 24: "getTimezoneOffset"
            // 25: "getUTCDate"
            // 26: "setUTCDate"
            // 27: "getUTCDay"
            // 28: "getUTCFullYear"
            // 29: "setUTCFullYear"
            // 30: "getUTCHours"
            // 31: "setUTCHours"
            // 32: "getUTCMilliseconds"
            // 33: "setUTCMilliseconds"
            // 34: "getUTCMinutes"
            // 35: "setUTCMinutes"
            // 36: "getUTCMonth"
            // 37: "setUTCMonth"
            // 38: "getUTCSeconds"
            // 39: "setUTCSeconds"
            // 40: "valueOf"
            // 41: "getYear"
            // 42: "setYear"
            // 43: "toJSON"
            // 44: "toLocaleString"
            // 45: "toLocaleDateString"
            // 46: "toLocaleTimeString"
            // 47: "countDaysInMonth"
            // 48: "__defineGetter__"
            // 49: "__defineSetter__"
            // 50: "hasOwnProperty"
            // 51: "__lookupGetter__"
            // 52: "__lookupSetter__"
            // 53: "isPrototypeOf"
            // 54: "propertyIsEnumerable"

            // var logic = function(currentDateTime) {

            //     var options = {
            //         year: 'numeric',
            //         month: '2-digit',
            //         day: '2-digit',
            //         hour: '2-digit',
            //         hour12: false,
            //         timeZone: 'America/Lima'
            //     };
            //     let year = new Intl.DateTimeFormat('en', {
            //         year: 'numeric'
            //     }).format(currentDateTime);
            //     let month = new Intl.DateTimeFormat('en', {
            //         month: '2-digit'
            //     }).format(currentDateTime);
            //     let day = new Intl.DateTimeFormat('en', {
            //         day: '2-digit'
            //     }).format(currentDateTime);
            //     let hour = new Intl.DateTimeFormat('en', {
            //         hour: '2-digit',
            //         hour12: false
            //     }).format(currentDateTime);



            //     date = year + "-" + month + "-" + day;
            //     hour = hour + ":00:00";

            //     let teacher_classes = JSON.parse(decodeEntities("{{ $teacher_classes_encode }}"));
            //     let teacher_schedule = JSON.parse(decodeEntities("{{ $teacher_schedule_encode }}"));


            //     let teacher_hours = [];
            //     let teacher_classes2 = [];
            //     for (let i = 0; i < teacher_classes.length; i++) {
            //         teacher_classes2 = teacher_classes[i].split(" ");

            //         if (teacher_classes2[0] == date) {

            //             teacher_hours.push(teacher_classes2[1].slice(0, -3));
            //             teacher_classes2 = teacher_classes2[0];
            //         }
            //     }

            //     let dayOfWeek = -1;
            //     if (currentDateTime != null) dayOfWeek = currentDateTime.getDay();

            //     let availableHours = [];
            //     for (let i = 0; i < teacher_schedule.length; i++) {
            //         if (teacher_schedule[i][1] == dayOfWeek) {

            //             if (teacher_schedule[i][0].length < 2) teacher_schedule[i][0] = "0" + teacher_schedule[i][0];
            //             availableHours.push(teacher_schedule[i][0] + ":00");
            //         }
            //     }

            //     teacher_hours = [...new Set(teacher_hours)];

            //     let filtered = availableHours.filter(function(value, index, arr) {
            //         return !teacher_hours.includes(value);
            //     });



            //     if (filtered.length > 0 && ((year >= year2) && (month >= month2) && (day > day2))) {

            //         this.setOptions({
            //             timepicker: true,
            //             allowTimes: filtered,
            //         });
            //     } else {
            //         this.setOptions({
            //             timepicker: false,
            //         });
            //     };
            // };

            // let now = new Date();
            // let year2 = new Intl.DateTimeFormat('en', {
            //     year: 'numeric'
            // }).format(now);
            // let month2 = new Intl.DateTimeFormat('en', {
            //     month: '2-digit'
            // }).format(now);
            // let day2 = new Intl.DateTimeFormat('en', {
            //     day: '2-digit'
            // }).format(now);
            // console.log(now.getDate())
            // $('#recovery_datetime').datetimepicker({
            //     formatDate: 'Y/m/d',
            //     minDate: year2 + "/" + month2 + "/" + (now.getDate() + 1),
            //     maxDate: <?php echo "'" . $period_end . "'"; ?>,

            //     onChangeDateTime: logic,
            //     onShow: logic,
            //     inline: true,
            // });

            // $.datetimepicker.setLocale('en');

            // var decodeEntities = (function() {

            //     var element = document.createElement('div');

            //     function decodeHTMLEntities(str) {
            //         if (str && typeof str === 'string') {

            //             str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
            //             str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
            //             element.innerHTML = str;
            //             str = element.textContent;
            //             element.textContent = '';
            //         }

            //         return str;
            //     }

            //     return decodeHTMLEntities;
            // })();

            // $(".xdsoft_datetimepicker").css("border", "none");
            // $(".xdsoft_datetimepicker.xdsoft_inline").css({
            //     "display": "flex",
            //     "justify-content": "center"
            // });


            // var selectedCells = 0;
            // var nOfClasses = 1;
            // let tds = $(".selectable");
            // for (let index = 0; index < tds.length; index++) {
            //     tds[index] = tds[index].addEventListener('click', changeClass);

            // }

            // function changeClass() {

            //     if ($(this).hasClass("selected")) {
            //         $(this).removeClass("selected");
            //         selectedCells--;
            //     } else {
            //         if (selectedCells < nOfClasses) {
            //             $(this).addClass("selected");
            //             selectedCells++;
            //         }
            //     }
            // }



            //         var hoyLocal = new Date(@json($hoy));
            //         var horaLocal = hoyLocal.getHours();

            //         var difHora = hoyLocal.getTimezoneOffset() / 60;
            //         var OpenUTC =
            //             @json($university_schedule_start); // Hora UTC a la que abre la academia en PERU! (06:00 am Hora local en peru) (07:00 am hora local)
            //         var OpenLocal = OpenUTC - difHora;

            // ;
            //         cellsLocal = $('.Local');
            //         for (let i = 0; i < cellsLocal.length; i++) {



            //             if (OpenLocal < 10) {
            //                 if (OpenLocal < 0) {
            //                     OpenLocal += 24;
            //                     cellsLocal[i].innerHTML = OpenLocal + ":00";
            //                 } else {
            //                     cellsLocal[i].innerHTML = "0" + OpenLocal + ":00";
            //                 }
            //             } else {
            //                 cellsLocal[i].innerHTML = OpenLocal + ":00";
            //             }

            //             if (OpenLocal >= 23) {
            //                 OpenLocal = 0;
            //             } else {
            //                 OpenLocal++;
            //             }
            //         }


            // let hourForDays = @json($university_schedule_hours) + 1;
            // $("#absence_table").DataTable({
            //     searching: false,
            //     ordering: false,
            //     pageLength: hourForDays,
            //     info: false,
            //     bLengthChange: false,
            //     pagingType: "simple",
            //     // stateSave: true,
            // });






            //         console.log($('.paginate_button.next'));
        </script>

        {{-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script> --}}
        {{-- <script>

        window.addEventListener("showdate", function(evt) {
            // alert(evt.detail.dateStr);
        }, false);

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                dateClick: function(info){
                    var evt = new CustomEvent("showdate", {detail: info});
                    window.dispatchEvent(evt);
                }
            });
            calendar.render();
        });

    </script> --}}
        {{-- <script defer>
        window.showWeeklySchedule = function(){
            document.getElementById('schedule').__x.$data.weekSchedule = true;
        }
    </script> --}}
</x-app-layout>
