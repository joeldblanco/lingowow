{{-- VISTA DEL MODULO --}}

<x-app-layout>

    <div class="py-12 bg-white font-sans">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                
                @foreach ($module as $item)
                    <x-module id="{{$item->id}}" name="{{$item->name_module}}" descripcion="{{$item->descripcion}}"/>
                @endforeach
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                
                

            </div>
        </div>
    </div>
</x-app-layout>
