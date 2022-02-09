<x-app-layout>

    <div class="py-12 bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @foreach ($unit as $item)
                   
                <x-unit name="{{$item->name_unit}}" slide="{{$item->url_slide}}" doc="{{$item->url_doc}}" audio="{{$item->url_audio}}" nameforo="{{$item->name_foro}}" foro="{{$item->url_foro}}"/>
                <br><br><br><hr><br>   

            @endforeach
            

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            {{-- <x-jet-welcome /> --}}
                
                

            </div>
        </div>
    </div>
</x-app-layout>
