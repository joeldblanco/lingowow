@php
    
    use App\Models\DetallesWords;
    
    // $data = 'El terreno de juego es rectangular de *césped* natural o artificial, con una portería o arco a cada lado del campo. Se juega mediante una pelota que se debe desplazar a través del campo con cualquier parte del cuerpo que no sean los *brazos* o las manos, y mayoritariamente con los pies (de ahí su nombre). El objetivo es introducirla dentro de la *portería* o arco contrario, acción que se denomina marcar un gol. El equipo que logre más goles al cabo del partido, de una *duración* de 90 minutos, es el que resulta ganador del encuentro.';
    // $activity_content = DetallesWords::where('mode', 'find-the-words')->first();
    // dd($activity_content->words);
    // dd($activity_content);
    $data = str_replace("\n", " \n ", $activity_content->text);
    // dd($data);
    // dd(DetallesWords::all()->first());
    $words = explode(' ', $data);
    $cadena = '';
    
    // for ($i=0; $i < count($words); $i++) {
    //     $cadena .= $words[$i];
    //         if ($i < count($words) - 1) {
    //             $cadena += "-";
    //         }
    // }
    // dd($cadena, $words);
    $cont_palabras = [];
    $palabras = [];
    
    if ($activity_content->mode == 'drag-the-words') {
        // $start = false;
        // $start_pos = 0;
        // $len = 0;
        // for ($i = 0; $i < strlen($data); $i++) {
        //     if ($data[$i] == '*') {
        //         if ($start == false) {
        //             $start = true;
        //             $start_pos = $i + 1;
        //             $len = 0;
        //         } else {
        //             array_push($cont_palabras, substr($data, $start_pos, $len - 1));
        //             $start = false;
        //         }
        //     }
        //     $len++;
        // }
        // $palabras = $cont_palabras;
        // shuffle($palabras);
    
        $selected = $activity_content->words;
        $selected = json_decode($selected);
        $cadena = implode('-', $selected);
    }
    
    if ($activity_content->mode == 'mark-the-words') {
        $selected = $activity_content->words;
        $selected = json_decode($selected);
        $cadena = implode('-', $selected);
    }
    
    if ($activity_content->mode == 'find-the-words') {
        $selected = $activity_content->words;
        $selected = json_decode($selected);
        $cadena = implode('-', $selected);
    }
    
    // dd($words, $selected);
    
@endphp

<div>


    @if ($activity_content->mode == 'drag-the-words')
        {{-- {{dd($content)}} --}}
        <div class="form_contact activity-create-form" id="{{ $content->id }}" name="">
            <h2 class="desc-content mt-4">WORDS - DRAG THE WORD</h2>
            <input id="id" name="id" type="text" value="{{ $content->id }}" style="display: none;">
            <input id="type" name="type" type="text" value="words" style="display: none;">
            <input id="mode" name="mode" type="text" value="drag-the-words" style="display: none;">
            <div class="user_info">
                <div class="mt-2 w-full">
                    <div class="center-h w-1/4">Title</div>
                    <div class="center-h"><input class="w-5/6 inpWord" type="text" name="activity_name"
                            value="{{ $content->titulo }}" /></div>
                </div>
                <div class="mt-2 mb-4 w-full card-activity">
                    <div class="flip-{{ $content->id }} card-front card-hidden">
                        <div class="center-h w-1/4">Text</div>
                        <div class="center-h">
                            <textarea class="w-5/6 text-{{ $content->id }} inpWord" name="text_word" id="" cols="30" rows="7">{{ $activity_content->text }}</textarea>
                        </div>
                    </div>
                    <div class="flip-{{ $content->id }} card-back ">
                        <div class="center-h w-full">Please, select the words to draw; at least one
                        </div>
                        <br>
                        <div
                            class="flex flex-wrap gap-x-1 gap-y-3 drag-and-drop w-5/6 center-h words-{{ $content->id }}">
                            {{-- Aqui van las palabras --}}
                            @foreach ($words as $key => $word)
                                @if (in_array($word, $selected))
                                    <div class="word-selectable word-selected" id="{{ $content->id }}">
                                        {{ $word }}</div>
                                @else
                                    <div class="word-selectable" id="{{ $content->id }}">{{ $word }}</div>
                                @endif
                            @endforeach

                            {{-- {{dd($palabras)}} --}}
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-x-5 mt-5">
                    <button type="button" class="btn-black-outliner btn-ready-word" name="{{ $content->id }}"
                        disabled>Ready</button>
                    <button class="btn-black-outliner btn-edit-word" name="{{ $content->id }}">Cancel</button>
                </div>
                <br>
                <input class="inputWords-{{ $content->id }}" type="text" name="words" style="display: none"
                    value="{{ $cadena }}" />
            </div>
            <button class="icon-delete-form"><i class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
        </div>
    @endif



    @if ($activity_content->mode == 'mark-the-words')
        <div class="form_contact activity-create-form" id="{{ $content->id }}" name="">
            <h2 class="desc-content mt-4">WORDS - MARK THE WORD</h2>
            <input id="id" name="id" type="text" value="{{ $content->id }}" style="display: none;">
            <input id="type" name="type" type="text" value="words" style="display: none;">
            <input id="mode" name="mode" type="text" value="mark-the-words" style="display: none;">
            <div class="user_info">
                <div class="mt-2 w-full">
                    <div class="center-h w-1/4">Title</div>
                    <div class="center-h"><input class="w-5/6 inpWord" type="text" name="activity_name"
                            value="{{ $content->titulo }}" /></div>
                </div>

                <div class="mt-2 mb-4 w-full card-activity">
                    <div class="flip-{{ $content->id }} card-front card-hidden">
                        <div class="center-h w-1/4">Text</div>
                        <div class="center-h">
                            <textarea class="w-5/6 text-{{ $content->id }} inpWord" name="text_word" id="" cols="30" rows="7">{{ $activity_content->text }}</textarea>
                        </div>
                    </div>

                    <div class="flip-{{ $content->id }} card-back ">
                        <div class="center-h w-full">Please, select the words to mark; at least one
                        </div>
                        <br>
                        <div
                            class="flex flex-wrap gap-x-1 gap-y-3 drag-and-drop w-5/6 center-h words-{{ $content->id }}">
                            {{-- Words Here --}}
                            @foreach ($words as $key => $word)
                                @if (in_array($word, $selected))
                                    <div class="word-selectable word-selected" id="{{ $content->id }}">
                                        {{ $word }}</div>
                                @else
                                    <div class="word-selectable" id="{{ $content->id }}">{{ $word }}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="flex justify-center gap-x-5 mt-5">
                    <button class="btn-black-outliner btn-ready-word" name="{{ $content->id }}"
                        disabled>Ready</button>
                    <button class="btn-black-outliner btn-edit-word" name="{{ $content->id }}">Cancel</button>
                </div>
                <br>
                <input class="inputWords-{{ $content->id }}" type="text" name="words" style="display: none;"
                    value="{{ $cadena }}" />

            </div>
            <button class="icon-delete-form"><i class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
        </div>
    @endif


    @if ($activity_content->mode == 'find-the-words')
        {{-- {{dd($selected)}} --}}
        <div class="form_contact activity-create-form" id="{{ $content->id }}">
            <h2 class="desc-content mt-4">WORDS - FIND THE WORD</h2>
            <input id="id" name="id" type="text" value="{{ $content->id }}"
                style="display: none;">
            <input id="type" name="type" type="text" value="words" style="display: none;">
            <input id="mode" name="mode" type="text" value="find-the-words" style="display: none;">
            <div class="user_info">

                <div class="mt-2 w-full mb-2">
                    <div class="center-h w-1/4">Title</div>
                    <div class="center-h"><input class="w-5/6 inpWord" type="text" name="activity_name"
                            value="{{ $content->titulo }}" /></div>
                </div>

                <div class="center-h w-5/6">Tipe the words</div>

                <div class="center-h">
                    <input id="add-word" class="w-5/6 inpWord" type="text" name="" id="dni_number"
                        value="" placeholder="Tipe one or more words" />
                    <button class="btn-add-word btn-add-outliner" name="{{ $content->id }}"><i
                            class="btn-add-word fas fa-plus w-full"></i></button>
                </div>

                <br>
                <div
                    class="flex flex-wrap gap-x-1 gap-y-3 place-content-center drag-and-drop w-5/6 center-h words-{{ $content->id }}">
                    {{-- words here --}}
                    @foreach ($selected as $key => $word)
                        <div class="word-selected">{{ $word }}<button class="icon-delete-word"><i
                                    class="fa fa-times mx-1 text-sm icon-delete-word"></i></button></div>
                    @endforeach
                </div>

                <br>
                <input type="text" class="inputWords-{{ $content->id }}" name="words"
                    value="{{ $cadena }}" style="display: none;" />

            </div>
            <button class="icon-delete-form"><i class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
        </div>
    @endif


</div>
