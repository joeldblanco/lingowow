<x-app-layout>
    <div class="bg-white font-sans" style="min-height: 80vh">
        {{-- <livewire:exam-display :exam="$exam" /> --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full flex flex-col space-y-36">
            {{-- <div class="my-10">
            <progress id="seekbar" value="0" max="1" class="w-full"></progress>
        </div> --}}
            <div class="p-6 sm:px-20 bg-white flex flex-col">
                @if (!empty($attempt->id))
                    <form action="{{ route('attempt.correct', ['attempt_id' => $attempt->id]) }}" method="POST">
                        <input class="mr-2" type="hidden" name="attempt_id" value="{{ $attempt->id }}" />
                @endif
                @csrf
                <div id="container" class="flex flex-col space-y-20">
                    @forelse ($exam->questions->sortBy('order') as $question)
                        <div class="flex flex-row w-5/6 bg-gray-200 p-5 rounded-md">
                            <div class="flex flex-col w-full">
                                <p class="text-xl mb-2">{!! $question->description !!}</p>

                                @if ($question->type == 'multiple-choice')
                                    <ul>
                                        @foreach (json_decode($question->options, 1) as $key => $value)
                                            <li>
                                                <input class="mr-2" type="radio" name="{{ $question->id }}"
                                                    value="{{ substr($key, -1) }}" />{{ $value }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif($question->type == 'info')
                                    @if ($question->file_path != null)
                                        <audio id="player">
                                            <source src="{{ asset(Storage::url($question->file_path)) }}"
                                                type="audio/mpeg">
                                            Your browser does not support the audio tag.
                                        </audio>
                                        <div class="flex items-center space-x-5">
                                            <i
                                                class="play cursor-pointer text-blue-500 text-2xl fas fa-play my-5 ml-5"></i>
                                            <progress id="seekbar" value="0" max="1"
                                                class="w-full"></progress>
                                        </div>
                                    @endif
                                @elseif($question->type == 'essay')
                                    @if ($question->file_path != null)
                                        <audio id="player">
                                            <source src="{{ asset(Storage::url($question->file_path)) }}"
                                                type="audio/mpeg">
                                            Your browser does not support the audio tag.
                                        </audio>
                                        <div class="flex items-center space-x-5">
                                            <i
                                                class="play cursor-pointer text-blue-500 text-2xl fas fa-play my-5 ml-5"></i>
                                            <progress id="seekbar" value="0" max="1"
                                                class="w-full"></progress>
                                        </div>
                                    @endif
                                    <div>
                                        <textarea id="essay" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Write your text here"
                                            style="resize: none" rows="4" name="{{ $question->id }}"></textarea>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="w-full flex justify-center h-screen ">
                            <div class="bg-gray-200 w-1/2 flex flex-col justify-center p-10 space-y-5 my-auto">
                                @if (empty($question))
                                    <p class="mx-auto font-bold text-lg">This exam has no questions</p>
                                @else
                                    <p>Your attempt will have a time limit of 40 mins. When you start, the timer
                                        will
                                        begin
                                        to count
                                        down and cannot be paused. You must finish your attempt before it expires.
                                        Are
                                        you
                                        sure you wish
                                        to start now?</p>
                                    <button onclick="startTimer()" wire:click="startAttempt"
                                        class="bg-gray-300 p-4 hover:bg-gray-400">Start Attempt</button>
                                @endif
                            </div>
                        </div>
                    @endforelse

                </div>
                @if (!empty($attempt->id))
                    <div class="flex justify-end mt-40 mb-16">
                        <button class="bg-blue-500 rounded-md p-3 text-white text-lg w-1/6">Submit</button>
                    </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea#essay',
            plugins: 'wordcount',
        });
    </script>
    <script>
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
    </script>
</x-app-layout>
