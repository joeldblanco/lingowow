<div>

  <style>
    .selection-area {
      background: rgba(46, 115, 252, 0.11);
      border: 2px solid rgba(98, 155, 255, 0.81);
      border-radius: 0.1em;
    }
  </style>

  <script>

    $( function() {

      var selectedCells = 0;
      var nOfClasses = {{$plan}};

      $(".cell_block").click(function(){
        if($(this).hasClass("selected")){
          $(this).removeClass("selected");
        }else{
          if(selectedCells < nOfClasses){
            $(this).addClass("selected");
          }
        }

        selectedCells = $(".selected").length;
      });

    });

  </script>

  @php

    $scheduled_classes = App\Models\Enrolment::select('student_id')->where('teacher_id',$teacher_id)->get();
    $temp_student_schedule = [];
    $student_schedule = [];

    $students = [];
    foreach ($scheduled_classes as $key => $value) {
      $students[$key] = $value->student_id;
    }
    $students = App\Models\User::find($students);

    foreach ($students as $key => $value) {
      $students[$key][1] = App\Models\Schedule::select('selected_schedule')->where('user_id',$value->id)->get();
      $students[$key][1] = json_decode($students[$key][1][0]->selected_schedule);
    }

    for($i = 0; $i < count($scheduled_classes); $i++){
      array_push($temp_student_schedule, App\Models\Schedule::select('selected_schedule')->where('user_id',$scheduled_classes[$i]->student_id)->get());
      if($temp_student_schedule[$i][0]->selected_schedule)
        array_push($student_schedule,json_decode($temp_student_schedule[$i][0]->selected_schedule));
    }

    if(!empty(array_filter($student_schedule, function ($a) { return $a !== null;}))){
      $student_schedule = array_merge(...$student_schedule);
    }

    $students_schedules = [];
    foreach ($students as $student) {
      $students_schedules[] = $student[1];
    }
    $students_schedules = array_merge(...$students_schedules);

  @endphp

  <div class="container mx-auto">
    <div class="wrapper bg-white rounded shadow w-full">

      <h3 class="text-4xl font-bold text-gray-800">Select your schedule</h3>
      <h4 class="text-2xl font-bold text-gray-400 mb-8">Please, select {{$plan}} blocks to continue</h4>

      @php
        $days = ['SUNDAY','MONDAY','TUESDAY', 'WEDNESDAY','THURSDAY','FRIDAY','SATURDAY'];
      @endphp

      <div class="w-full flex flex-row">
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
          <div class="w-full flex flex-row">
            <div class="selectable w-full">
              @for ($i = 0; $i < 16; $i++)
                @for ($e = 0; $e < 7; $e++)
                  @if(in_array([$i+6,$e],$schedule))
                    @if(in_array([$i+6,$e],$students_schedules))
                      <div class="w-32 h-10 border" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                    @else
                      <div class="w-32 h-10 border cell_block cursor-pointer bg-blue-300 available" style="width: 14.28%" id="{{$i+6}}-{{$e}}">Available</div>
                    @endif
                  @else
                    <div class="w-32 h-10 border" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                  @endif
                @endfor
              @endfor
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" onclick="saveSchedule({{$plan}},'schedule.check')">Save</button>
    {{-- <button class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" wire:model="$mode = 0">Edit</button> --}}
  
  </div>

  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>

</div>