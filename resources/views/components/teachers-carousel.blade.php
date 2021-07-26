<x-app-layout>
 <div class="py-12 bg-white font-sans">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden">
            <div class="mt-10 mb-20">
                <h3 class="text-4xl font-bold text-gray-800">Available Teachers</h3>
                <h4 class="text-2xl font-bold text-gray-400">Please, select one to continue</h4>
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    @foreach ($available_teachers as $teacher)
                        {{-- @php
                            var_dump($teacher);
                        @endphp --}}
                        {{-- NEWS-CARD --}}
                        <div class="gallery-cell">
                        <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
                        <img src="storage/{{$teacher->profile_photo_path}}" class="flex items-center border-2 rounded-full shadow-xl w-32" />
                        <div class="mt-8">
                            <p class="text-xl font-semibold my-2">{{$teacher->name}}</p>
                            <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                    <!-- svg  -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <p>Lima, Perú</p>
                            </div>
                            <div class="border-t-2 "></div>
                
                            <div class="flex justify-center">
                                <button class="inline-block bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 hover:text-white mt-5" onclick="addToCart(5,'English Regular Program - Individual Lesson',1,9.99)">Select</button>
                            </div>
                        </div>
                        </div>
                        </div>
                    @endforeach
                 </div>
             </div>
        </div>
    </div>
</div>
</x-app-layout>