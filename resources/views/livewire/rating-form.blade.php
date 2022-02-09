<div x-data="{ showRatingForm: false, ratingResponse: false, maybeLaterShow: true, showRatingStars: true}" x-cloak>
    {{-- <button @click="showRatingForm = true">Show Rating Form</button> --}}
    <div
        class="min-h-screen py-6 flex flex-col justify-center sm:py-12 fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showRatingForm"
        x-transition:enter="transition duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        >
        <div class="py-3 sm:max-w-xl sm:mx-auto">
            <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg" @click.outside="showRatingForm = false" x-show="showRatingStars">
                <div class="px-12 py-5">
                    <h2 class="text-gray-800 text-3xl font-semibold">Your opinion matters to us!</h2>
                </div>
                <div class="bg-gray-200 w-full flex flex-col items-center">
                    <div class="flex flex-col items-center py-6 space-y-3">
                        <span class="text-lg text-gray-800">How was quality of the call?</span>
                        <div class="flex" id="stars">
                            <svg class="w-12 h-12 text-gray-500 star" data-value="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-12 h-12 text-gray-500 star" data-value="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-12 h-12 text-gray-500 star" data-value="3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-12 h-12 text-gray-500 star" data-value="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-12 h-12 text-gray-500 star" data-value="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <div class="w-3/4 flex flex-col">
                        <textarea rows="3" class="p-4 text-gray-500 rounded-xl resize-none" placeholder="Leave a message, if you want"></textarea>
                        <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white" @click="ratingResponse=true, showRatingStars=false">Rate now</button>
                    </div>
                </div>
                <div class="h-20 flex items-center justify-center" x-show="maybeLaterShow" x-transition.duration.200ms>
                    <button class="text-gray-600" @click="showRatingForm = false">Maybe later</button>
                </div>
            </div>
            <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg"  x-show="ratingResponse" x-transition.duration.200ms @click.outside="showRatingForm = false">
                <div class="px-12 py-5">
                    <h2 class="text-gray-800 text-3xl font-semibold">Your opinion matters to us!</h2>
                </div>
                <div class="w-full flex flex-col items-center">
                    <p class="text-xl">Thanks for your feedback!</p>
                </div>
                <div class="message-box mx-auto my-4"></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars svg').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10);
                // The star currently mouse on
            
                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('svg.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('text-yellow-500');
                }
                else {
                    $(this).removeClass('text-yellow-500');
                }
                });
                
            }).on('mouseout', function(){
                $(this).parent().children('svg.star').each(function(e){
                $(this).removeClass('text-yellow-500');
                });
            });

            /* 2. Action to perform on click */
            $('#stars svg').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('svg.star');
                
                for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('text-yellow-600');
                }
                
                for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('text-yellow-600');
                }
            });
        });
    </script>

</div>