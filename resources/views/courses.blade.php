{{-- VISTA DE LOS CURSOS --}}

<x-app-layout>

    <div class="py-12 bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (count($course)>=3)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            @endif
            
                
                @foreach ($course as $item)
                    <x-course_card id="{{$item->id}}" name="{{$item->name_course}}" image="{{$item->url_image}}"/>
                @endforeach
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                
                

            </div>
        </div>
    </div>
</x-app-layout>
