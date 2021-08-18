<div class="py-12 bg-white font-sans">

    @if (!empty($available_teachers))
    @php

    // echo '<br>';

    $test = Carbon\Carbon::now()->setTimezone('America/Lima')->isoFormat('e HH');
    // echo $test.'<br>';

    function calculateProRate($dOfClasses){
        
        $today = Carbon\Carbon::now()->setTimezone('America/Lima');
        // $today->day = 14;
        // $today->month = 8;
        $priceOfClass = 9.99;
        // echo $today.'<br><br>';
        $period = Carbon\CarbonPeriod::create('2021-05-23','4 weeks', '2100-12-31');
        $breakKey = -1;
        foreach ($period as $key => $date) {

            $breakKey--;

            if($breakKey == 0){
                $endOfPeriod = $date;
                if($nOfClasses <= 0){
                    if($nOfClasses <= 0){
                        $nOfClasses = $today->diffInDaysFiltered(function($date) use(&$dOfClasses,&$today) {
                            $classes = 0;
                            foreach ($dOfClasses as $day) {
                                if($date->isDayOfWeek($day) and ($date > $today)){
                                    $classes ++;
                                    // echo $date.'<br>';
                                }
                            }
                            return $classes;
                        }, $endOfPeriod);
                    }
                }
                break;
            }

            if ($date->greaterThan($today)) {
                $endOfPeriod = $date;
                
                $nOfClasses = $today->diffInDaysFiltered(function($date) use(&$dOfClasses,&$today) {
                    $classes = 0;
                    foreach ($dOfClasses as $day) {
                        if($date->isDayOfWeek($day) and ($date > $today)){
                            $classes ++;
                            // echo $date.'<br>';
                        }
                    }
                    return $classes;
                }, $endOfPeriod);

                // echo 'Number of classes: '.$nOfClasses.'<br>';

                $breakKey = 1;
            }
        }

        // echo 'Day of the Week: '.$today->weekday().'<br>';
        // echo 'End of Period: '.$endOfPeriod.'<br>';
        // echo 'Number of classes: '.$nOfClasses.'<br>';
        // echo 'Days of Classes: '. $dOfClasses[0] . '-' . $dOfClasses[1].'<br>';
        // echo 'Price of Class: '.$priceOfClass.'<br>';
        // echo 'Total: '.($nOfClasses*$priceOfClass).'<br>';

        return $nOfClasses;
    }

    $schedule = Session::get('user_schedule');

    // dd($schedule);

    $dOfClasses = [];

    if(isset($schedule)){
        $schedule = json_decode($schedule);
        
        foreach ($schedule as $classes) {
            array_push($dOfClasses,(int)$classes[1]);
        }
    }

    $qty = calculateProRate($dOfClasses);

    // echo $qty;

@endphp

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden">
        <div class="mt-10 mb-20">
            <h3 class="text-4xl font-bold text-gray-800">Available Teachers</h3>
            <h4 class="text-2xl font-bold text-gray-400">Please, select one to continue</h4>
            <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                @foreach ($available_teachers as $teacher)
                    <div class="gallery-cell">
                    <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
                    <img src="storage/{{$teacher->profile_photo_path}}" class="flex items-center border-2 rounded-full shadow-xl w-32" />
                    <div class="mt-8">
                        <p class="text-xl font-semibold my-2">{{$teacher->name}}</p>
                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p>Lima, Perú</p>
                        </div>
                        <div class="border-t-2 "></div>
            
                        <div class="flex justify-center">
                            <button wire:click.prevent="save(5,'English Regular Program - Individual Lesson',{{$qty}},9.99,{{$teacher->id}})" class="inline-block bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 hover:text-white mt-5">Select</button>
                        </div>
                    </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="mt-10 mb-20">
                    <h3 class="text-4xl font-bold text-gray-800">There are no available teachers in the selected schedule.</h3>
                    <h4 class="text-2xl font-bold text-gray-400">Please, go back and select a different schedule.</h4>
                    <a href="{{ url()->previous() }}" class="inline-block bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 hover:text-white mt-5">Go Back</a>
                </div>
            </div>
        </div>
    @endif

</div>