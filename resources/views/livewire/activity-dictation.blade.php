@php

$activity_dictation = json_decode($activity_content->dictation_group);
@endphp

<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    @if ($activity_content->mode == 'one-by-one')
        <br><br>
        <div class="grid place-content-center">
            <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-y-4 gap-x-20">
                @foreach ($activity_dictation as $key => $value)
                    <div class="dictation-audio flex flex-row gap-2">
                        <audio class="" id="audio-{{$num_content}}-{{ $key }}">
                            {{-- Storage::url($value[0]) --}}
                            <source src="{{ asset('storage/activity-dictation/'.$value[0]) }}" type="audio/mpeg">
                            Tu navegador no soporta la etiqueta audio de HTML5
                        </audio>
                        <button class="audio flex align-middle text-gray-500" name="audio-{{$num_content}}-{{ $key }}">
                            <i class="fas fa-play  text-lg w-full"></i></button>
                        <input class="input-dictation" type="text" name="" id="">
                    </div>
                @endforeach
            </div>
        </div>

    @endif
{{-- 
    @if ($activity_content->mode == 'one-by-one')
        <br><br>
        <div class="grid place-content-center">
            <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-y-4 gap-x-20">
                @foreach ($activity_dictation as $key => $value)
                    <div class="dictation-audio flex flex-row gap-2">
                        <audio class="" id="audio{{ $key }}">
                            <source src="{{ asset('storage/activity-dictation/'.$value[0]) }}" type="audio/mpeg">
                            Tu navegador no soporta la etiqueta audio de HTML5
                        </audio>
                        <button class="audio flex align-middle text-gray-500" name="audio{{ $key }}">
                            <i class="fas fa-play  text-lg w-full"></i></button>
                        <input class="input-dictation" type="text" name="" id="">
                    </div>
                @endforeach
            </div>
        </div>

    @endif --}}


    <style>
        .audio {

            border: 1px solid lightgray;
            padding: 10px;
            border-radius: 10%;

        }

        .input-dictation {
            border: 1px solid transparent;
            border-bottom: 1px solid lightgray;
            font-size: 15px;
            font-weight: 700;
            /* text-align: center; */
            text-transform: uppercase;
            outline: none;
        }

        .input-dictation:focus {
            border: 1px solid transparent;
            border-bottom: 1px solid lightgray;
            box-shadow: 0 0 0 rgba(229, 102, 23, 0)inset, 0 0 8px rgba(121, 119, 116, 0);
            outline: 0 none;
        }
    </style>


    <script>
        $(".audio").click(function() {
            document.getElementById(this.name).play();
            $(this).toggleClass("text-gray-500");
            $(this).toggleClass("text-gray-300");
        });

        var audios = document.getElementsByTagName("audio");


        for (let i = 0; i < audios.length; i++) {

            audios[i].addEventListener('ended', (event) => {
                // console.log(event);
                setTimeout(() => {
                    event.target.nextElementSibling.classList.remove("text-gray-300");
                    event.target.nextElementSibling.classList.add("text-gray-500");
                }, 250);
            });

        }
    </script>

</div>
