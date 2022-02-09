<div>
  
  <script>
    // $( function() {

    //   var selectedCells = 0;
    //   var selectingCells = 0;
    //   var nOfClasses = 4;

    //   $(".selectable").selectable({
    //     selected: function( event, ui ) {
    //       selectedCells = $('.ui-selected').length;
    //       ui.selected.classList.replace("unselected","selected");
    //       console.log(selectedCells);
    //       if(selectedCells >= nOfClasses){
    //         $(".selectable").selectable( "option", "cancel", ".unselected" );
    //       }else{
    //         $(".selectable").selectable( "option", "cancel", "" );
    //       }
    //     },
    //     unselected: function( event, ui ){
    //       selectedCells = $(".ui-selected").length;
    //       ui.unselected.classList.replace("selected","unselected");
    //       console.log(selectedCells);
    //     }
    //   });
    // });

    // {{$nOfClasses = $plan}}

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
        // console.log(selectedCells);
      });

    });

  </script>

  {{-- @php
    if(isset($schedule)){
      // $schedule = json_decode($schedule);
    
      for($i=0; $i<count($schedule); $i++){

        switch ($schedule[$i][1]){
            
          case "Sunday": $schedule[$i][1] = "1";
          break;
          
          case "Monday": $schedule[$i][1] = "2";
          break;

          case "Tuesday": $schedule[$i][1] = "3";
          break;
          
          case "Wednesday": $schedule[$i][1] = "4";
          break;
          
          case "Thursday": $schedule[$i][1] = "5";
          break;

          case "Friday": $schedule[$i][1] = "6";
          break;
          
          case "Saturday": $schedule[$i][1] = "7";
          break;
        }
      }
    }
    
  @endphp --}}

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
                <div class="w-32 h-10 border cell_block @if(in_array([$i+6,$e],$schedule)) cursor-pointer bg-blue-300 available @endif" style="width: 14.28%" id="{{$i+6}}-{{$e}}">@if(in_array([$i+6,$e],$schedule)) Available @endif</div>
              @endfor
            @endfor
          </div>
        </div>
      </div>
    </div>      

      {{-- <table class="w-full">
        <thead>
          <tr>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Lima Time</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sun</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Sunday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sun</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Monday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Mon</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Tuesday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Tue</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Wednesday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Wed</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Thursday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Thu</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Friday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Fri</span>
            </th>
            <th class="p-2 border h-10 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
              <span class="xl:block lg:block md:block sm:block hidden">Saturday</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sat</span>
            </th>
          </tr>
        </thead>

        @if($mode == 1)
          <tbody id="scheduleTable">
            @for ($i = 0; $i < 17; $i++)
              <tr class="text-center">
                @for ($e = 0; $e < 8; $e++)
                  <td class="border p-0 lg:w-30 md:w-30 @if(isset($schedule) and in_array([$i+6,$e-1],$schedule)) selected @endif sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300" @if ($e!=0) name="scheduleBlock" @endif id="{{$i+6}}-{{$e-1}}">
                    <div class="flex flex-col mx-auto lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                      <div class="top w-full">
                        @if ($e == 0)
                            <span class="text-gray-500">{{ $i + 6 }}:00</span>
                        @endif
                      </div>
                    </div>
                  </td>
                @endfor
              </tr>
            @endfor
          </tbody>
        @endif
      </table>      --}}
    </div>
    <button class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" onclick="saveSchedule({{$plan}},'schedule.check')">Save</button>
    {{-- <button class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" wire:model="$mode = 0">Edit</button> --}}
  </div>
  
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@simonwep/selection-js/lib/selection.min.js"></script> --}}
  
</div>