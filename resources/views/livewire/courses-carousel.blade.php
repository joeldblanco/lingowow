<div class="mt-10 mb-20">
    <h3 class="text-4xl font-bold my-10 text-gray-800">Courses</h3>
    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }' wire:ignore>
        @php
            $courses = DB::table('courses')->get();
        @endphp
        @foreach ($courses as $course)
        {{-- NEWS-CARD --}}
        <div class="gallery-cell">
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10 flex flex-col">
                <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
                    <!-- svg  -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2">{{$course->course_name}}</p>
                    <div class="flex space-x-2 text-gray-400 text-sm items-center">
                        <!-- svg  -->
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="language" class="svg-inline--fa fa-language fa-w-20 h-7 w-7" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="currentColor" d="M152.1 236.2c-3.5-12.1-7.8-33.2-7.8-33.2h-.5s-4.3 21.1-7.8 33.2l-11.1 37.5H163zM616 96H336v320h280c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24zm-24 120c0 6.6-5.4 12-12 12h-11.4c-6.9 23.6-21.7 47.4-42.7 69.9 8.4 6.4 17.1 12.5 26.1 18 5.5 3.4 7.3 10.5 4.1 16.2l-7.9 13.9c-3.4 5.9-10.9 7.8-16.7 4.3-12.6-7.8-24.5-16.1-35.4-24.9-10.9 8.7-22.7 17.1-35.4 24.9-5.8 3.5-13.3 1.6-16.7-4.3l-7.9-13.9c-3.2-5.6-1.4-12.8 4.2-16.2 9.3-5.7 18-11.7 26.1-18-7.9-8.4-14.9-17-21-25.7-4-5.7-2.2-13.6 3.7-17.1l6.5-3.9 7.3-4.3c5.4-3.2 12.4-1.7 16 3.4 5 7 10.8 14 17.4 20.9 13.5-14.2 23.8-28.9 30-43.2H412c-6.6 0-12-5.4-12-12v-16c0-6.6 5.4-12 12-12h64v-16c0-6.6 5.4-12 12-12h16c6.6 0 12 5.4 12 12v16h64c6.6 0 12 5.4 12 12zM0 120v272c0 13.3 10.7 24 24 24h280V96H24c-13.3 0-24 10.7-24 24zm58.9 216.1L116.4 167c1.7-4.9 6.2-8.1 11.4-8.1h32.5c5.1 0 9.7 3.3 11.4 8.1l57.5 169.1c2.6 7.8-3.1 15.9-11.4 15.9h-22.9a12 12 0 0 1-11.5-8.6l-9.4-31.9h-60.2l-9.1 31.8c-1.5 5.1-6.2 8.7-11.5 8.7H70.3c-8.2 0-14-8.1-11.4-15.9z"></path>
                        </svg>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg> --}}
                        <p>{{$course->course_category}}</p> 
                    </div>
                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        {{-- <!-- svg  -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p>1 Week Left</p>  --}}
                    </div>
                    <div class="border-t-2"></div>

                    <div class="flex justify-between">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Teachers</p>
                            <div class="flex space-x-2">
                                <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
                                class="w-6 h-6 rounded-full"/>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxSqK0tVELGWDYAiUY1oRrfnGJCKSKv95OGUtm9eKG9HQLn769YDujQi1QFat32xl-BiY&usqp=CAU" 
                                class="w-6 h-6 rounded-full"/>
                            </div>
                        </div>
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2 float-right">Modality</p>
                            <div class="text-base text-gray-400 font-semibold">
                                <p>{{ucfirst($course->course_modality)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="selectProduct({{$course->course_id}})" class="inline-block bg-green-600 text-white px-6 py-2 mt-4 rounded-lg hover:bg-green-700">Select</button>
            </div>
        </div>
        @endforeach
        {{-- NEWS-CARD
        <div class="gallery-cell">
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
                <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 left-4 -top-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                    </svg>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2">Regular Spanish Course</p>
                    <div class="flex space-x-2 text-gray-400 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p>Core UI Team</p> 
                    </div>
                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p>3 Weeks Left</p> 
                    </div>
                    <div class="border-t-2 "></div>

                    <div class="flex justify-between">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Teachers</p>
                            <div class="flex space-x-2">
                                <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
                                class="w-6 h-6 rounded-full"/>
                            </div>
                        </div>
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Progress</p>
                            <div class="text-base text-gray-400 font-semibold">
                                <p>76%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        NEWS-CARD
        <div class="gallery-cell">
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
                <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2">English Pronunciation Course</p>
                    <div class="flex space-x-2 text-gray-400 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p>Marketing Team</p> 
                    </div>
                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p>2 Days Left</p> 
                    </div>
                    <div class="border-t-2 "></div>

                    <div class="flex justify-between">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Teachers</p>
                            <div class="flex space-x-2">
                                <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
                                class="w-6 h-6 rounded-full"/>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxSqK0tVELGWDYAiUY1oRrfnGJCKSKv95OGUtm9eKG9HQLn769YDujQi1QFat32xl-BiY&usqp=CAU" 
                                class="w-6 h-6 rounded-full"/>
                            </div>
                        </div>
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Progress</p>
                            <div class="text-base text-gray-400 font-semibold">
                                <p>4%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        NEWS-CARD
        <div class="gallery-cell">
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
                <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                    </svg>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold my-2">English Grammar Course</p>
                    <div class="flex space-x-2 text-gray-400 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p>Marketing Team</p> 
                    </div>
                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p>1 Month Left</p> 
                    </div>
                    <div class="border-t-2 "></div>

                    <div class="flex justify-between">
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Teachers</p>
                            <div class="flex space-x-2">
                                <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" 
                                class="w-6 h-6 rounded-full"/>
                            </div>
                        </div>
                        <div class="my-2">
                            <p class="font-semibold text-base mb-2">Progress</p>
                            <div class="text-base text-gray-400 font-semibold">
                                <p>90%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script>

        function selectProduct(object){
            // console.log(object);
            @this.selectProduct(object);
        }
        
    </script>
 </div>
