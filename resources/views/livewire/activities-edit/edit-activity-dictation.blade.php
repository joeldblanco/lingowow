@php
    
    use App\Models\DetallesWords;
    
    // $data = 'El terreno de juego es rectangular de *césped* natural o artificial, con una portería o arco a cada lado del campo. Se juega mediante una pelota que se debe desplazar a través del campo con cualquier parte del cuerpo que no sean los *brazos* o las manos, y mayoritariamente con los pies (de ahí su nombre). El objetivo es introducirla dentro de la *portería* o arco contrario, acción que se denomina marcar un gol. El equipo que logre más goles al cabo del partido, de una *duración* de 90 minutos, es el que resulta ganador del encuentro.';
    // $activity_content = DetallesWords::where('mode', 'find-the-words')->first();
    // dd($activity_content->words);
    // dd($activity_content);
    // $data = str_replace("\n", " \n ", $activity_content->cards_group);
    // dd($data);
    // dd(DetallesWords::all()->first());
    // $words = explode(' ', $data);
    // $cont_palabras = [];
    // $palabras = [];
    
    $data = json_decode($activity_content->dictation_group);
    // dd($data);
    
    // dd($words, $selected);
@endphp

<div>


    <div class="form_contact activity-create-form" id="{{ $content->id }}">
        <h2 class="desc-content mt-4">DICTATION - ONE BY ONE</h2>
        <div class="mt-2 w-full mb-2">
            <div class="center-h w-1/4">Title</div>
            <div class="center-h"><input class="w-5/6 inpWord" type="text" name="activity_name"
                    value="{{ $content->titulo }}" />
            </div>
        </div>
        <input id="id" name="id" type="text" value="{{ $content->id }}" style="display: none;">
        <input id="type" name="type" type="text" value="dictation" style="display: none;">
        <input id="mode" name="mode" type="text" value="one-by-one" style="display: none;">
        <input id="audios-dictation" type="text" name="dictation-audio" value="" style="display: none;" />

        <br>
        <div class="center-h">
            <input class="inputAudio" type="file" name="inputAudio-{{ $content->id }}[]"
                id="inputAudio-{{ $content->id }}" data-multiple-caption="{count} files selected" multiple
                accept="audio/*" onchange="readFileAudio(this)">
            <label class="labeInputAudio" for="inputAudio-{{ $content->id }}">Choose audio files</label>
        </div>

        <br><br>

        <div class="grid place-content-center w-5/6 center-h">
            <div
                class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-4 gap-x-20 audios-inputAudio-{{ $content->id }}">

                @foreach ($data as $key => $audio)
                    {{-- {{ dd(substr($audio[0], strrpos($audio[0], '-') + 1)) }} --}}

                    <div class="audioFile-{{ $content->id }}">
                        <audio id="{{ substr($audio[0], strrpos($audio[0], '-') + 1) }}"
                            src="{{ asset('storage/activity-dictation/' . $audio[0]) }}" controls
                            class="audio-file w-full" wire:ignore></audio>
                        <input type="text" wire:ignore class="inpWord" placeholder="Insert text"
                            value="{{ $audio[1] }}">
                    </div>
                @endforeach

            </div>
        </div>
        <br>
        <button class="icon-delete-form"><i class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
    </div>


</div>
