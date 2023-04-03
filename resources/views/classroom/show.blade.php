@if (isset($enter_classroom) && $enter_classroom)
    <div id="meet"></div>

    <script src='https://meet.theuttererscorner.com/external_api.js'></script>
    <script>
        const domain = "meet.theuttererscorner.com";
        const options = {
            roomName: '{{ $student->first_name }} {{ $student->last_name }} - Lesson Room',
            width: "100%",
            height: "100%",
            parentNode: document.querySelector('#meet')
        };

        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
@else
    <x-app-layout>
        <div class="font-bold">
            <div class="py-20 flex flex-col items-center">
                <p class="text-red-500 text-3xl">{{$message1}} <span id="time-remaining"></span></p>
                <p class="text-gray-700 text-lg">{{ $message2 }}</p>
                {{-- <p id="time-remaining"></p> --}}
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script>
            var timeRemainingElement = document.getElementById('time-remaining');
            var timeRemaining = <?php echo $time; ?>;

            var intervalId = setInterval(function() {
                timeRemaining--;
                if (timeRemaining <= 0) {
                    clearInterval(intervalId);
                } else {
                    var duration = moment.duration(timeRemaining, 'seconds');
                    let dia = (duration.days()>1 ? duration.days()+" days, " : (duration.days()<1 ? "" : duration.days()+" day, "))
                    let hora = (duration.hours()>1 ? duration.hours()+" hours, " : (duration.hours()<1 ? "" : duration.hours()+" hour, "))
                    let minuto = (duration.minutes()>1 ? duration.minutes()+" minutes, " : (duration.minutes()<1 ? "" : duration.minutes()+" minute, "))
                    let segundo = (duration.seconds()>1 ? duration.seconds()+" seconds " : (duration.seconds()<1 ? duration.seconds()+" second " : duration.seconds()+" second "))
                    console.log(dia)
                    
                    timeRemainingElement.textContent = dia + hora + minuto + segundo;

                }
            }, 1000);
        </script>
    </x-app-layout>
@endif
