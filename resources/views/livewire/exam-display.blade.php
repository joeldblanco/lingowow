<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full flex flex-col space-y-36" x-data="{ startAttempt: @entangle('startAttempt'), examContent: @entangle('examContent') }" x-cloak>
    <!-- Display the countdown timer in an element -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-screen flex flex-col justify-center items-center"
        x-show="startAttempt">
        <div class="w-1/2">
            <div class="bg-gray-200 w-full flex flex-col justify-center p-10 space-y-5">
                @php
                    $attempt = $exam->attempts
                        ->where('user_id', auth()->id())
                        ->where('completed_at', null)
                        ->first();
                @endphp
                @if ($exam->questions->count() <= 0)
                    <p class="mx-auto font-bold text-lg">This exam has no questions</p>
                @else
                    <p class="text-2xl font-bold text-left">Time limit</p>
                    <p class="text-justify">
                        @if (!empty($attempt))
                            You have already started this attempt. You have
                            {{ $attempt->created_at->copy()->addSecond()->addMinutes($exam->duration)->diffForHumans(Carbon\Carbon::now(), [
                                    'syntax' => Carbon\CarbonInterface::DIFF_ABSOLUTE,
                                    'parts' => 2,
                                    'join' => ' and ',
                                ]) }}
                            remaining.
                            Are you sure you wish to continue?
                        @else
                            Your attempt will have a time limit of
                            {{ Carbon\Carbon::now()->copy()->addSecond()->addMinutes($exam->duration)->diffForHumans(Carbon\Carbon::now(), [
                                    'syntax' => Carbon\CarbonInterface::DIFF_ABSOLUTE,
                                    'parts' => 2,
                                    'join' => ' and ',
                                ]) }}.
                            When you
                            start, the timer
                            will begin to count
                            down and cannot be paused. You must finish your attempt before it
                            expires.
                            Are you sure you
                            wish to start now?
                        @endif
                    </p>
                @endif
            </div>
            <div class="flex mt-7 space-x-2 justify-start w-full">
                <button @click="examContent = true, startAttempt = false" wire:click="startAttempt"
                    class="bg-lw-blue hover:bg-blue-800 py-2 px-4 rounded-md font-bold text-white">
                    @if (!empty($attempt))
                        Continue attempt
                    @else
                        Start attempt
                    @endif
                </button>
                <a href="{{ route('modules.show', $exam->unit->module->id) }}"
                    class="bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded-md font-bold text-gray-600">
                    Go Back
                </a>
            </div>
        </div>
    </div>
    <div class="p-6 sm:px-20 bg-white flex flex-col" x-show="examContent">
        <div wire:ignore class="text-center w-full flex justify-end fixed z-10 right-5 p-10 pointer-events-none"
            id="timer_container">
            <p id="timer"
                class="text-2xl w-28 h-28 flex justify-center items-center rounded-full bg-gray-100 border-8 border-gray-400">
            </p>
        </div>
        <div id="container" class="flex flex-col space-y-20">
            @forelse ($exam->questions->sortBy('order') as $question)
                <div class="flex flex-row w-5/6 bg-gray-200 p-5 rounded-md">
                    <div class="flex flex-col w-full">
                        <p class="text-xl mb-2">{!! $question->description !!}</p>

                        @if ($question->type == 'multiple-choice')
                            <ul>
                                @foreach (json_decode($question->options, 1) as $key => $value)
                                    <li><input class="mr-2" type="radio" name="answers.{{ $question->id }}"
                                            id="radio-{{ $question->id }}"
                                            value="{{ substr($key, -1) }}-{{ $question->id }}"
                                            wire:click="saveAnswer('{{ substr($key, -1) }}-{{ $question->id }}')"
                                            @if (array_key_exists($question->id, $answers) && $answers[$question->id] == substr($key, -1)) checked @endif />{{ $value }}
                                    </li>
                                @endforeach
                            </ul>
                        @elseif($question->type == 'info')
                            @if ($question->file_path != null)
                                <audio id="player">
                                    <source src="{{ asset(Storage::url($question->file_path)) }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                                <div class="flex items-center space-x-5">
                                    <i class="play cursor-pointer text-blue-500 text-2xl fas fa-play my-5 ml-5"></i>
                                    <progress id="seekbar" value="0" max="1" class="w-full"></progress>
                                </div>
                            @endif
                        @elseif($question->type == 'essay')
                            @if ($question->file_path != null)
                                <audio id="player">
                                    <source src="{{ asset(Storage::url($question->file_path)) }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                                <div class="flex items-center space-x-5">
                                    <i class="play cursor-pointer text-blue-500 text-2xl fas fa-play my-5 ml-5"></i>
                                    <progress id="seekbar" value="0" max="1" class="w-full"></progress>
                                </div>
                            @endif
                            <div>
                                <textarea wire:model="essay.{{ $question->id }}" id="essay" class="w-full px-2 py-2 text-gray-700 bg-white rounded"
                                    placeholder="Write your text here" style="resize: none" rows="4" name="{{ $question->id }}"></textarea>

                                <p class="text-sm w-full text-right">
                                    @if (isset($essay[$question->id]))
                                        {{ str_word_count($essay[$question->id]) }}
                                    @else
                                        0
                                    @endif
                                    WORDS
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="w-full flex justify-center h-screen ">
                    <div class="bg-gray-200 w-1/2 flex flex-col justify-center p-10 space-y-5 my-auto">
                        <p class="mx-auto font-bold text-lg">This exam has no questions</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="flex justify-end mt-40 mb-16">
            <button wire:click="submitExam" wire:loading.attr="disabled"
                class="bg-blue-500 rounded-md p-3 text-white text-lg w-1/6">Submit</button>
        </div>
    </div>
    @if (!empty($this->attempt))
        <script>
            function startTimer() {

                // Get attempt's starting date and time
                var examStartedOn = @json((new Carbon\Carbon($this->attempt->created_at))->toDateTimeString());

                // Set attempt's starting date and time
                var now = new Date(examStartedOn).getTime();

                // Set the date we're counting down to
                var countDownDate = new Date();
                countDownDate.setTime(now + (@json($exam->duration) * 60 * 1000));

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    var format = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') +
                        seconds;

                    // Display the result in the element with id="timer"
                    document.getElementById("timer").innerHTML = format;

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("timer").innerHTML = "EXPIRED";
                        Livewire.emit('timerExpired')
                    }
                }, 1000);
            }


            window.addEventListener('startAttempt', event => {

                console.log(true);

                startTimer();

                // tinymce.init({
                //     selector: 'textarea#essay',
                //     plugins: 'wordcount',
                // });



                let tries = 3;

                $('.play').on('click', function() {
                    console.log(tries);
                    if (tries > 0) {
                        document.getElementById('player').play();
                        $('.play').css({
                            'cursor': "default",
                            'opacity': 0.7,
                        });
                    }
                });

                $('#player').on('timeupdate', function() {
                    // $('#seekbar').attr("value", this.currentTime / this.duration);  
                    setProgress((this.currentTime / this.duration) * 100);
                    if (this.currentTime >= this.duration) {
                        setProgress(0);
                        tries--;
                        if (tries > 0) {
                            $('.play').css({
                                'cursor': "pointer",
                                'opacity': 1,
                            });
                        }
                    }
                });

                function setProgress(percent) {
                    $('#seekbar').attr("value", percent / 100);
                }

                // var circle = document.querySelector('circle');
                // if(circle != null){
                //     var radius = circle.r.baseVal.value;
                //     var circumference = radius * 2 * Math.PI;

                //     circle.style.strokeDasharray = `${circumference} ${circumference}`;
                //     circle.style.strokeDashoffset = `${circumference}`;

                //     function setProgress(percent) {
                //         const offset = circumference - percent / 100 * circumference;
                //         circle.style.strokeDashoffset = offset;
                //     }
                // }
                // })
            });
        </script>
    @endif
</div>
