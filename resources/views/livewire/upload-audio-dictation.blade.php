<div id="uploadAudio" wire:ignore>

    <form>
        
            <input class="inputAudio" type="file" wire:model="audio_dictation" multiple accept="audio/*"
                onchange="readFile(this)">
        
        {{-- <audio wire:ignore id="audio-test" src="" controls></audio> --}}

        {{-- @if ($audio_dictation)

            

            Audios Preview:
            @foreach ($audio_dictation as $audio)
                <div class="audioFile">
                    <audio class="" id="{{ pathinfo($audio->path(), PATHINFO_BASENAME) }}" controls>
                        <source src="" type="audio/mpeg">
                        Tu navegador no soporta la etiqueta audio de HTML5
                    </audio>
                    <input type="text" placeholder="Ingrese el texto"
                        value="{{ explode('.', $audio->getClientOriginalName())[0] }}">
                </div>
            @endforeach
            {{ $this->dispatchBrowserEvent('loadAudio', ['this' => $this]) }}

        @endif --}}

        @error('audio_dictation.*')
            <span class="error">{{ $message }}</span>
        @enderror


    </form>

</div>
