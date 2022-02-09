{{-- VISTA DEL CURSO --}}

<x-app-layout>

    <div class="bg-white font-sans">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                
                @foreach ($course as $module)
                    {{-- {{dd($module)}} --}}
                    {{-- <x-module id="{{$item->id}}" name="{{$item->name_module}}" descripcion="{{$item->descripcion}}"/> --}}
                    
                    <div class="p-10">  
                        <!--Card 1-->
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            {{-- <a href="{{route('courses.unit',[$module->id_course,$module->id])}}"><img class="w-full" src="https://campus.theuttererscorner.com/pluginfile.php/61/course/overviewfiles/A1%20-%20MODULE%201.png" alt="Mountain"></a> --}}
                            <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 titulomodule">{{$module->name_module}}</div>
                            <p class="text-gray-700 text-base">
                                {{$module->descripcion}}
                            </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                
                

            </div>
        </div>
    </div>
</x-app-layout>