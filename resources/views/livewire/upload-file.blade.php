<div id="uploadImages">
    {{-- <form wire:submit.prevent="save"> --}}
    <form>
        <input class="inputImage" type="file" wire:model="photos" multiple>
        {{-- <input type="file" wire:model="photos" multiple> --}}
        @if ($photos)
            {{-- {{dd($photos[0], explode("/",$photos[0]->path())[1], pathinfo($photos[0]->path(), PATHINFO_BASENAME))}} --}}
            <br>

            Images Preview:
            @foreach ($photos as $photo)
            <div class="imageFile">
                <img id="{{ pathinfo($photo->path(), PATHINFO_BASENAME) }}" src="{{ $photo->temporaryUrl() }}" width="150" height="100">
                <input wire:ignore type="text" placeholder="Ingrese el texto" value="{{ explode('.', $photo->getClientOriginalName())[0] }}">
            </div>
            @endforeach


        @endif
        @error('photos.*')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- <button type="submit">Save Photo</button> --}}
        {{--  --}}
    </form>
</div>
