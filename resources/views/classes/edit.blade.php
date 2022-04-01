<x-app-layout>

    {{-- @php
        $days = ['SUNDAY','MONDAY','TUESDAY', 'WEDNESDAY','THURSDAY','FRIDAY','SATURDAY'];
    @endphp --}}
    <div class="flex flex-col bg-white" x-data="{ weekSchedule: false, monthlySchedule: true }" @showdate.window="weekSchedule=true, monthlySchedule=false">
        <div class="flex space-x-4 p-4 bg-gray-100 mx-3 rounded-xl">
            <div class="wrapper bg-white rounded w-full p-24">
                <form method="POST" action="{{ route('classes.update') }}" class="flex flex-col w-1/2 mx-auto space-y-8">
                    @csrf
                    <input type="text" name="absence_reason" id="absence_reason" placeholder="Reason for Absence" required>
                    <div class="flex flex-col">
                        <label for="recovery_datetime">Recovery Date and Time</label>
                        <input type="text" name="recovery_datetime" id="recovery_datetime" required>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <input type="checkbox" name="consent_checkbox" id="consent_checkbox" required>
                        <label for="consent_checkbox">I accept the <a href="#" class="text-blue-600 hover:underline">terms for class recovery</a></label>
                    </div>
                    <input type="submit" value="Submit" class="p-4 hover:bg-gray-300 cursor-pointer">
                </form>
                {{-- @if (!isset($teacher_schedule) || $teacher_schedule == null)
                    <div class="w-full text-center">
                        <h2 class="text-4xl font-bold text-red-800 my-20">This user hasn't selected a schedule yet.</h2>
                    </div>
                @else
                    <div class="w-full flex flex-row shadow my-10" x-show="weekSchedule">
                        <div class="flex flex-col">
                            <div class="cell border font-bold">
                                LIMA TIME
                            </div>
                            @for ($i = 0; $i < 16; $i++)
                                <div class="cell border">
                                    {{$i + 6}}:00
                                </div>
                            @endfor
                        </div>
                        <div class="w-full">
                            @foreach ($days as $day)
                                <div class="cell border font-bold" style="width: 14.28%">
                                    {{$day}}
                                </div>
                            @endforeach
                            <div class="w-full flex flex-row h-full">
                                <div class="selectable w-full" id="selectable">
                                    @for ($i = 0; $i < 16; $i++)
                                        @for ($e = 0; $e < 7; $e++)
                                            @if(in_array([$i+6,$e],$teacher_schedule))
                                                @if(!in_array([$i+6,$e],$students_schedules))
                                                    <div class="w-32 h-10 border cell schedule_cell ui-selected flex flex-col justify-center" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                                                @else
                                                    <div class="w-32 h-10 border cell schedule_cell" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                                                @endif
                                            @else
                                                <div class="w-32 h-10 border cell schedule_cell" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                                            @endif
                                        @endfor
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id='calendar' x-show="monthlySchedule"></div>
                @endif --}}
            </div>
        </div>
    </div>

    @php
        $current_period = App\Http\Controllers\ApportionmentController::currentPeriod();
        $period_start = new Carbon\Carbon($current_period[0]);
        $period_end = new Carbon\Carbon($current_period[1]);
        $period_start = $period_start->format('Y/m/d');
        $period_end = $period_end->format('Y/m/d');
        $teacher = App\Models\User::find($teacher_id);
        $teacher_classes = $teacher->teacherClasses;
        foreach ($teacher_classes as $key => $value) {
            $teacher_classes[$key] = $value->start_date;
        }
        $teacher_schedule = $teacher->schedules[0]->selected_schedule;
        // dd($teacher_schedule);
    @endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}" >
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

        var logic = function( currentDateTime ){

            var options = {
                year: 'numeric', month: '2-digit', day: '2-digit',
                hour: '2-digit',
                hour12: false,
                timeZone: 'America/Lima'
            };
            let year = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(currentDateTime);
            let month = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(currentDateTime);
            let day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(currentDateTime);
            let hour = new Intl.DateTimeFormat('en', { hour: '2-digit', hour12: false }).format(currentDateTime);

            // "2022-02-09 07:00:00"
            
            date = year + "-" + month + "-" + day;
            hour = hour + ":00:00";

            let teacher_classes = JSON.parse(decodeEntities("{{ $teacher_classes }}"));
            let teacher_schedule = JSON.parse(decodeEntities("{{ $teacher_schedule }}"));
            // console.log(teacher_schedule);
            let teacher_hours = [];
            let teacher_classes2 = [];
            for(let i = 0; i < teacher_classes.length; i++)
            {
                teacher_classes2 = teacher_classes[i].split(" ");

                if(teacher_classes2[0] == date){
                    // console.log(teacher_classes2[0],teacher_classes2[1].slice(0,-3));
                    teacher_hours.push(teacher_classes2[1].slice(0,-3));
                    teacher_classes2 = teacher_classes2[0];
                }
            }

            let dayOfWeek = -1;
            if(currentDateTime != null) dayOfWeek = currentDateTime.getDay();
            // console.log(dayOfWeek);
            let availableHours = [];
            for(let i = 0; i < teacher_schedule.length; i++)
            {
                if(teacher_schedule[i][1] == dayOfWeek)
                {
                    // console.log(teacher_schedule[i][0]);
                    if(teacher_schedule[i][0].length < 2) teacher_schedule[i][0] = "0" + teacher_schedule[i][0];
                    availableHours.push(teacher_schedule[i][0] + ":00");
                }
            }

            teacher_hours = [...new Set(teacher_hours)];
            // console.log(teacher_hours);
            // availableHours = ['06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00','20:00', '21:00'];

            let filtered = availableHours.filter(function(value, index, arr){
                return !teacher_hours.includes(value);
            });

            // let now = new Date();
            // now = Date.parse(now);
            // currentDateTime = Date.parse(currentDateTime);
            // let year2 = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(now);
            // let month2 = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(now);
            // let day2 = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(now);

            // console.log(year, month, day, year2, month2, day2);

            if(filtered.length > 0 && ((year >= year2) && (month >= month2) && (day > day2))){
                // console.log(teacher_hours);
                this.setOptions({
                    timepicker: true,
                    allowTimes: filtered,
                });
            }else{
                this.setOptions({
                    timepicker: false,
                });
            };
        };

        let now = new Date();
        let year2 = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(now);
        let month2 = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(now);
        let day2 = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(now);

        $('#recovery_datetime').datetimepicker({
            formatDate:'Y/m/d',
            minDate: year2 + "/" + month2 + "/" + (now.getDate()+1),
            maxDate: <?php echo "'".$period_end."'" ?>,
            // minTime:'06:00',
            // maxTime:'22:00',
            onChangeDateTime: logic,
            onShow: logic,
            inline: true,
        });

        $.datetimepicker.setLocale('en');

        var decodeEntities = (function() {
            // this prevents any overhead from creating the object each time
            var element = document.createElement('div');

            function decodeHTMLEntities (str) {
                if(str && typeof str === 'string') {
                // strip script/html tags
                str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
                str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
                element.innerHTML = str;
                str = element.textContent;
                element.textContent = '';
                }

                return str;
            }

            return decodeHTMLEntities;
        })();

        $(".xdsoft_datetimepicker").css("border", "none");
        $(".xdsoft_datetimepicker.xdsoft_inline").css({"display": "flex", "justify-content": "center"});

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