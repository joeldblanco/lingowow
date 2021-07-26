<div>

  @php
    if(isset($schedule)){
      $schedule = json_decode($schedule);
    
      for($i=0; $i<count($schedule); $i++){
        // $schedule[$i] = explode(" ",$schedule[$i]);

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
    
  @endphp

  <div class="container mx-auto mt-10">
    <div class="wrapper bg-white rounded shadow w-full">

      {{-- <div id="boundary" class="border border-indigo-300 p-10 bg-indigo-50 rounded-md">
        @for ($i = 0; $i < 17; $i++)
          <div class="flex flex-row">
            @for ($e = 0; $e < 8; $e++)
              <div class="border border-indigo-300 m-1 w-20 h-10 rounded-sm @if(in_array([$i+6,$e],$schedule)) selected @else unselected @endif overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300" @if ($e!=0) name="scheduleBlock" @endif id="{{$i+6}}-{{$e}}">
                <div class="flex mx-auto overflow-hidden">
                  <div class="top px-4 py-1">
                    @if ($e == 0)
                        <span class="text-gray-500">{{ $i + 6 }}:00</span>
                    @endif
                  </div>
                </div>
              </div>
            @endfor
          </div>
        @endfor
      </div> --}}

      <table class="w-full">
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
        
        @if($mode == 0)
          <tbody id="scheduleTable">
              @for ($i = 0; $i < 17; $i++)
                <tr class="text-center">
                  @for ($e = 0; $e < 8; $e++)
                    <td class="border p-0 lg:w-30 md:w-30 @if(isset($schedule) and in_array([$i+6,$e],$schedule)) selected @endif sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300" @if ($e!=0) name="scheduleBlock" @endif id="{{$i+6}}-{{$e}}">
                      <div class="flex flex-col mx-auto lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                        <div class="top w-full px-6 py-4">
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
      </table>     
    </div>
    <button class="bg-green-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" onclick="selectedLog()">Save</button>
    <button class="bg-blue-500 rounded-lg text-white font-bold px-6 py-1 my-3 shadow-md" wire:model="$mode = 0">Edit</button>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/scheduleSelection.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/selection-js/lib/selection.min.js"></script>
</div>