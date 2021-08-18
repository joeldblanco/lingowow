<div>

    <style>
      /* #feedback { font-size: 1.4em; } */
      .selectable .ui-selecting { background: #FECA40; }
      .selectable .ui-selected, .selected { background: #F39814; color: white; }
      .selectable { list-style-type: none; margin: 0; padding: 0; }
      .selectable div, .cell { float: left; width: 100px; height: 25px; text-align: center; }
      .taken { background: #fc4a1e; }
    </style>
  
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
    @php
      if(isset($schedule)){
        // dd($schedule);
        $schedule = json_decode($schedule);
        // var_dump($schedule);
      }
      $scheduled_classes = DB::table('scheduled_classes')->select('student_id')->where('teacher_id',auth()->id())->get();
      // dd($scheduled_classes);
      $temp_student_schedule = [];
      $student_schedule = [];

      foreach ($scheduled_classes as $classes){
        array_push($temp_student_schedule,DB::table('users')->select('selected_schedule')->where('id',$classes->student_id)->get());
        array_push($student_schedule,json_decode($temp_student_schedule[0][0]->selected_schedule));
      }

      // [["6","0"],["7","0"],["8","0"],["9","0"]]

      if(!empty(array_filter($student_schedule, function ($a) { return $a !== null;}))){
        $student_schedule = array_merge(...$student_schedule);
      }

    @endphp
  
    <div class="container mx-auto mt-10">
      <div class="wrapper bg-white rounded shadow w-full">
  
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
          <div class="w-full flex flex-row h-full">
            @if (!isset($schedule))
                <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                    <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't selected a schedule yet.</h2>
                    <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you buy a plan of classes.</h2>
                    <a href="{{route('shop')}}" class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Shop</a>
                </div>
            @else
                <div class="selectable w-full">
                    @for ($i = 0; $i < 16; $i++)
                        @for ($e = 0; $e < 7; $e++)
                        <div class="w-32 h-10 border @if(in_array([$i+6,$e],$student_schedule)) taken @elseif(in_array([$i+6,$e],$schedule)) selected  @endif" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                        @endfor
                    @endfor
                </div>
            @endif
          </div>
        </div>
      </div>
      </div>
    </div>
    
    <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
    
  </div>