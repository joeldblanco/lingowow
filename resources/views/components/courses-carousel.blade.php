<div class="mt-10 mb-20">
    <h3 class="text-4xl font-bold my-10 text-gray-800">Courses</h3>
    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
       {{-- NEWS-CARD --}}
       <div class="gallery-cell" wire:click="$emit('selectProduct')">
          <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
             <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 left-4 -top-6">
                <!-- svg  -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
             </div>
             <div class="mt-8">
                <p class="text-xl font-semibold my-2">Regular English Course</p>
                <div class="flex space-x-2 text-gray-400 text-sm">
                      <!-- svg  -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <p>Marketing Team</p> 
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                      <!-- svg  -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <p>1 Week Left</p> 
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
                         <p class="font-semibold text-base mb-2">Progress</p>
                         <div class="text-base text-gray-400 font-semibold">
                            <p>34%</p>
                         </div>
                      </div>
                </div>
             </div>
          </div>
       </div>
       {{-- NEWS-CARD --}}
       <div class="gallery-cell">
       <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
          <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 left-4 -top-6">
             <!-- svg  -->
             <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
             </svg>
          </div>
          <div class="mt-8">
             <p class="text-xl font-semibold my-2">Regular Spanish Course</p>
             <div class="flex space-x-2 text-gray-400 text-sm">
                   <!-- svg  -->
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                   </svg>
                   <p>Core UI Team</p> 
             </div>
             <div class="flex space-x-2 text-gray-400 text-sm my-3">
                   <!-- svg  -->
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
       {{-- NEWS-CARD --}}
       <div class="gallery-cell">
       <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
          <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
             <!-- svg  -->
             <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
             </svg>
          </div>
          <div class="mt-8">
             <p class="text-xl font-semibold my-2">English Pronunciation Course</p>
             <div class="flex space-x-2 text-gray-400 text-sm">
                   <!-- svg  -->
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                   </svg>
                   <p>Marketing Team</p> 
             </div>
             <div class="flex space-x-2 text-gray-400 text-sm my-3">
                   <!-- svg  -->
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
       {{-- NEWS-CARD --}}
       <div class="gallery-cell">
       <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
          <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-yellow-500 left-4 -top-6">
             <!-- svg  -->
             <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
             </svg>
          </div>
          <div class="mt-8">
             <p class="text-xl font-semibold my-2">English Grammar Course</p>
             <div class="flex space-x-2 text-gray-400 text-sm">
                   <!-- svg  -->
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                   </svg>
                   <p>Marketing Team</p> 
             </div>
             <div class="flex space-x-2 text-gray-400 text-sm my-3">
                   <!-- svg  -->
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
       </div>
    </div>
 </div>