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
    
    $data = json_decode($activity_content->cards_group);
    // dd($data);

    
    // dd($words, $selected);
    
@endphp

<div>
    

    <div class="form_contact activity-create-form"
    id="{{$content->id}}">
    <h2 class="desc-content mt-4">CARDS</h2>

    <div class="mt-2 w-full mb-2">
        <div class="center-h w-1/4">Title</div>
        <div class="center-h"><input class="w-5/6 inpWord" type="text"
                name="activity_name" value="{{$content->titulo}}" /></div>
    </div>

    <input id="id" name="id" type="text" value="{{$content->id}}"
        style="display: none;">
    <input id="type" name="type" type="text" value="cards"
        style="display: none;">
    <input id="cards-images" type="text" name="cards-images" value=""
        style="display: none" />

    <br>
    <div class="center-h">
        <input class="inputImage" type="file" name="inputImage-{{$content->id}}[]" id="inputImage-{{$content->id}}"
            data-multiple-caption="{count} files selected" multiple accept="image/*"
            onchange="readFileImage(this)">
        <label class="labelInputImage" for="inputImage-{{$content->id}}">Choose image files</label>
    </div>
    <br><br>
    <div class="w-5/6 center-h grid place-content-center overflow-y-scroll">
        <div
            class="grid place-content-center lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-4 gap-x-5 images-inputImage-{{$content->id}}">

            @foreach ($data as $key => $image)

                {{-- {{ dd(substr($image[0], strrpos($image[0], '-') + 1)) }} --}}

                <div class="imageFile-{{$content->id}}">
                    <img id="{{substr($image[0], strrpos($image[0], '-') + 1)}}" src="{{ asset('storage/activity-cards/'.$image[0]) }}" alt="" wire:ignore class="img-file img-cards">
                    <input type="text" wire:ignore class="img-input w-full" placeholder="Insert text" value="{{$image[1]}}">
                </div>

            @endforeach

        </div>
    </div>
    <br>
    <button class="icon-delete-form"><i
            class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
</div>


</div>
