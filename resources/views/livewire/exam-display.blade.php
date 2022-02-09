<div>
    <style>
        .progress-ring__circle {
            transition: 0.35s stroke-dashoffset;
            // axis compensation
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            stroke: rgba(37, 99, 235);
            fill: #3b82f6;
        }

        #seekbar::-moz-progress-value {
            border-radius: 8px;
            background-color: #07294d;
        }

        #seekbar::-moz-progress-bar {
            border-radius: 8px;
        }

        #seekbar::-webkit-progress-value {
            border-radius: 8px;
            background-color: #07294d;
        }

        #seekbar::-webkit-progress-bar {
            border-radius: 8px;
        }
    </style>
    <div class="bg-white font-sans" style="min-height: 80vh" x-data="{create_question: false, import_create: true, questionList: true, error: @if(session('error')) true @else false @endif, loadingState: true}" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full flex flex-col space-y-36">
            <div class="my-10">
                <progress id="seekbar" value="0" max="1" class="w-full"></progress>
            </div>
            <div class="p-6 sm:px-20 bg-white flex flex-col">
                {{-- <input id="current_question" type="number" value="{{$loop->iteration}}" class="hidden">
                <input id="total_questions" type="number" value="{{$loop->count}}" class="hidden"> --}}
                @php
                    $question_data = json_decode($question->data);
                    if($question_data != null) $question_data = get_object_vars($question_data);
                @endphp
                <div id="container" class="flex flex-row justify-between px-28">
                    @switch($question->type)
                        @case('info')

                            @if ($question_data["path-to-file"] != null)
                                <div class="relative my-auto">
                                    <audio id="player">
                                        <source src="{{asset(Storage::url($question_data["path-to-file"]))}}" type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                    {{-- <button class="rounded-full w-52 h-52 p-10 pr-8 text-white text-7xl text-center absolute -left-3 -top-32 z-10"></button>  --}}
                                    {{-- <button onclick="document.getElementById('player').pause()">Pause</button> 
                                    <button onclick="document.getElementById('player').volume += 0.1">Vol +</button> 
                                    <button onclick="document.getElementById('player').volume -= 0.1">Vol -</button> --}}
                                    <svg class="progress-ring absolute -left-8 -top-28 z-0" width="250" height="250">
                                        <circle class="play cursor-pointer progress-ring__circle" stroke-width="10" r="112" cx="125" cy="125">
                                        <i class="play cursor-pointer text-white text-8xl fas fa-play absolute left-16 -top-8"></i>
                                    </svg>
                                </div>
                            @endif
                            <div class="text-center">
                                <p class="text-gray-800 text-3xl">{{$question->description}}</p>
                            </div>
                            @break

                        @case('multiple-choice')
                            @if ($question_data["path-to-file"] != null)
                                <div class="relative my-auto">
                                    <audio id="player">
                                        <source src="{{asset(Storage::url($question_data["path-to-file"]))}}" type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                    {{-- <button class="rounded-full w-52 h-52 p-10 pr-8 text-white text-7xl text-center absolute -left-3 -top-32 z-10"></button>  --}}
                                    {{-- <button onclick="document.getElementById('player').pause()">Pause</button> 
                                    <button onclick="document.getElementById('player').volume += 0.1">Vol +</button> 
                                    <button onclick="document.getElementById('player').volume -= 0.1">Vol -</button> --}}
                                    <svg class="progress-ring absolute -left-8 -top-28 z-0" width="250" height="250">
                                        <circle class="play cursor-pointer progress-ring__circle" stroke-width="10" r="112" cx="125" cy="125">
                                        <i class="play cursor-pointer text-white text-8xl fas fa-play absolute left-16 -top-8"></i>
                                    </svg>
                                </div>
                            @else
                                <div class="my-auto">
                                    <p class="text-gray-800 text-3xl">{{$question->description}}</p>
                                </div>
                            @endif
                            <div class="text-left text-2xl">
                                @php
                                    $question_data['options'] = (array)$question_data['options'];
                                @endphp
                                @foreach ($question_data['options'] as $option)
                                    @if ($loop->last == null)
                                    <div class="mb-6">
                                        <input type="radio" id="option-{{$option}}" name="options" value="{{$loop->iteration}}" class="mr-4" wire:model="answer">
                                        <label for="option-{{$loop->iteration}}">{{$option}}</label>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            @break

                        @case('essay')
                        
                            @break

                        @default
                            
                    @endswitch
                </div>
                <div wire:loading>
                    @include('components.loading-state')
                </div>
                <div class="flex justify-end mt-40 mb-16">
                    <button wire:click="nextQuestion" class="bg-blue-500 rounded-md p-3 text-white text-lg w-1/6">Submit</button>
                    {{-- <button wire:click="prevQuestion">Previous</button> --}}
                </div>
            </div>
        </div>
    </div>
    <script>

        let tries = 3;
        
        window.addEventListener('question-changed', event => {

            $('#seekbar').attr("value",((event.detail.questionIndex + 1)/event.detail.totalQuestions));

            $('.play').on('click', function() {
                if(tries > 0){
                    document.getElementById('player').play();
                    tries--;
                    $('.play').css({
                        'cursor' :"default",
                        'opacity': 0.7,
                    });
                }
            });

            $('#player').on('timeupdate', function() {
                // $('#seekbar').attr("value", this.currentTime / this.duration);  
                setProgress((this.currentTime / this.duration)*100);
                if(this.currentTime >= this.duration){
                    setProgress(0);
                    if(tries > 0){
                        $('.play').css({
                            'cursor' :"pointer",
                            'opacity': 1,
                        });
                    }
                }
            });

            var circle = document.querySelector('circle');
            if(circle != null){
                var radius = circle.r.baseVal.value;
                var circumference = radius * 2 * Math.PI;

                circle.style.strokeDasharray = `${circumference} ${circumference}`;
                circle.style.strokeDashoffset = `${circumference}`;

                function setProgress(percent) {
                    const offset = circumference - percent / 100 * circumference;
                    circle.style.strokeDashoffset = offset;
                }
            }

        });

        document.addEventListener('livewire:load', function () {
            $('#seekbar').attr("value",((@this.index + 1)/@this.total_questions));

            $('.play').on('click', function() {
                if(tries > 0){
                    document.getElementById('player').play();
                    tries--;
                    $('.play').css({
                        'cursor' :"default",
                        'opacity': 0.7,
                    });
                }
            });

            $('#player').on('timeupdate', function() {
                // $('#seekbar').attr("value", this.currentTime / this.duration);  
                setProgress((this.currentTime / this.duration)*100);
                if(this.currentTime >= this.duration){
                    setProgress(0);
                    if(tries > 0){
                        $('.play').css({
                            'cursor' :"pointer",
                            'opacity': 1,
                        });
                    }
                }
            });

            var circle = document.querySelector('circle');
            if(circle != null){
                var radius = circle.r.baseVal.value;
                var circumference = radius * 2 * Math.PI;

                circle.style.strokeDasharray = `${circumference} ${circumference}`;
                circle.style.strokeDashoffset = `${circumference}`;

                function setProgress(percent) {
                    const offset = circumference - percent / 100 * circumference;
                    circle.style.strokeDashoffset = offset;
                }
            }
        })

    </script>
</div>
