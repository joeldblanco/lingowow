<div>
  
  @php

    $scheduled_classes = App\Models\Enrolment::select('student_id')->where('teacher_id',$user_id)->get();
    $temp_student_schedule = [];
    $student_schedule = [];

    $students = [];
    foreach ($scheduled_classes as $key => $value) {
      $students[$key] = $value->student_id;
    }
    $students = App\Models\User::find($students);

    // dd($students);
    
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

    $role =  Auth::user()->roles[0]->name;

    $students_schedules = [];
    foreach ($students as $student) {
      $students_schedules[] = $student[1];
    }
    $students_schedules = array_merge(...$students_schedules);
    
    $user_schedules = array_merge(...$user_schedules);

  @endphp

  @if($role != "admin")
  <div class="container mx-auto mt-10" x-data="{ editBtn: true, edit: false, showModal1: false, showModal2: false, showModal3: false, event: {{$event}}, loadingState: false }" x-cloak>
    <div class="wrapper bg-white rounded shadow w-full">
      {{-- <p x-show="event">Event</p>     --}}
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
        <div class="w-full" wire:ignore>
          @foreach ($days as $day)
            <div class="cell border font-bold" style="width: 14.28%">
              {{$day}}
            </div>
          @endforeach
          <div class="w-full flex flex-row h-full">
            {{-- @foreach ($user_schedules as $user_schedule) --}}
              @if ((!isset($user_schedules) || $user_schedules == null || count($user_schedules) <= 0) && auth()->user()->roles[0]->name == "student")
                <div class="w-full text-center" style="background-color: rgba(255, 255, 255, 0.5)">
                    <h2 class="text-4xl font-bold text-red-800" style="margin-top: 15%">You haven't selected a schedule yet.</h2>
                    <h2 class="text-2xl font-bold text-gray-800">You can select a schedule after you buy a plan of classes.</h2>
                    <a href="{{route('shop')}}" class="inline-block bg-blue-800 text-white px-6 py-4 mt-8 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Shop</a>
                </div>
              @else
                {{-- {{dd($user_schedule)}} --}}
                <div class="selectable w-full" id="selectable">
                  @for ($i = 0; $i < 16; $i++)
                    @for ($e = 0; $e < 7; $e++)
                      @if(in_array([$i+6,$e],$user_schedules))
                        @if(in_array([$i+6,$e],$students_schedules))
                          @foreach ($students as $student)
                            {{-- @if($student[1]) --}}
                              @if(in_array([$i+6,$e],$student[1]))

                                  <div class="w-32 h-10 border cell schedule_cell ui-selected flex flex-col justify-center cursor-pointer" style="width: 14.28%" id="{{$i+6}}-{{$e}}" x-show="edit">
                                    <a href="{{route('profile.show',$student->id)}}" class="text-sm text-black font-bold">{{$student->first_name}} {{$student->last_name}}</a>
                                  </div>
                                  
                                  <div onclick="location.href='{{route('profile.show',$student->id)}}'" class="w-32 h-10 border cell schedule_cell ui-selected flex flex-col justify-center cursor-pointer" style="width: 14.28%" id="{{$i+6}}-{{$e}}" x-show="editBtn">
                                    <a href="{{route('profile.show',$student->id)}}" class="text-sm text-black font-bold">{{$student->first_name}} {{$student->last_name}}</a>
                                  </div>
                                
                              {{-- @else
                                <div class="w-32 h-10 border cell schedule_cell ui-selected" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div> --}}
                              @endif
                            {{-- @endif --}}
                          @endforeach
                        @else
                          {{-- {{dd($user_schedules)}} --}}
                          <div class="w-32 h-10 border cell schedule_cell ui-selected" style="width: 14.28%" id="{{$i+6}}-{{$e}}">
                            <p class="font-bold text-black">
                              @foreach ($user_courses_aux as $item)
                                @if(in_array([$i+6,$e],$item))
                                  @php
                                    $arr = array_keys($user_courses_aux,$item);
                                    // echo strtok($arr[0], " ");
                                  @endphp
                                @endif
                              @endforeach
                            </p>
                          </div>
                        @endif
                      @else
                        <div class="w-32 h-10 border cell schedule_cell" style="width: 14.28%" id="{{$i+6}}-{{$e}}"></div>
                      @endif
                    @endfor
                  @endfor
                </div>
              @endif
            {{-- @endforeach --}}
          </div>
        </div>
        <div class="flex flex-col space-y-3" x-show="edit" x-transition>
          <button onclick="toggleCellBlock()" @click="edit = false, editBtn = true" class="bg-red-500 rounded-lg text-white font-bold px-6 py-1 shadow-md h-1/6" wire:click="refresh"><i class="fas fa-times"></i></button>
          <button @click="showModal1 = true" class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 shadow-md h-5/6" wire:click="edit()">Save</button>
        </div>
      </div>
      <button onclick="toggleCellBlock()" @click=" edit = true, editBtn = false " wire:click="edit()" class="inline-block bg-green-800 text-white px-4 py-2 my-5 rounded hover:bg-green-900 hover:text-white hover:no-underline" x-show="editBtn" x-transition>Edit Schedule</button>
    </div>
    @include('modal')
    @include('components.loading-state')
  </div>
  @endif
      
  <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
  <script>

    function toggleCellBlock(){
      $(".schedule_cell").toggleClass("cell_block");
    }

    $( ".selectable" ).selectable({
      disabled: true
    });

    $('body').on("contentChanged", event => {

      var role = "{{Auth::user()->roles->pluck('name')[0]}}";

      if(role == "student"){

        $(".cell").click(function(){
          var selectedCells = 0;
          var nOfClasses = {{isset($user_schedule) ? count($user_schedule) : 0}};

          selectedCells = $(".ui-selected").length;

          if($(this).hasClass("ui-selected") && $(this).hasClass("cell_block")){
            $(this).removeClass("ui-selected");
          }else if($(this).hasClass("cell_block") && (selectedCells < nOfClasses)){
            $(this).addClass("ui-selected");
          }
        });

      }else if(role == "teacher"){
        var disabled = $( ".selectable" ).selectable( "option", "disabled" );
        $( ".selectable" ).selectable( "option", "disabled", !disabled );
        $( ".selectable" ).on( "selectableselected", function( event, ui ) {
          // $.inArray("taken",ui.selected.classList);
          if($.inArray("taken",ui.selected.classList) > 0){
            console.log(true);
          }else{
            console.log(false);
          }
        } );
      }

    });
  </script>
</div>
