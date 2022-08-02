<div class="bg-white font-sans" wire:ignore x-data="{ loadingState: @entangle('loadingState') }">

    @if (count($available_teachers) > 0)

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="mt-10 mb-20">
                    <h3 class="text-4xl font-bold text-gray-800">Available Teachers</h3>
                    <h4 class="text-2xl font-bold text-gray-400">Please, select one to continue</h4>
                    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                        @foreach ($available_teachers as $teacher)
                            {{-- @if ($teacher->id == $selectedTeacher)
                                <div class="bg-red-600">This</div>
                            @endif --}}
                            <div class="gallery-cell">
                                <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl mt-7 mb-2 mx-10">
                                    <div class="w-32 h-32">
                                        <img src="{{ Storage::url($teacher->profile_photo_path) }}"
                                        class="flex items-center border-2 rounded-full shadow-xl max-h-32" style="max-width: 8rem" />
                                    </div>
                                    <div class="mt-8">
                                        <p class="text-xl font-semibold my-2">{{ $teacher->first_name }}
                                            {{ $teacher->last_name }}</p>
                                        <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <p>Lima, Perú</p>
                                        </div>
                                        <div class="border-t-2"></div>
                                        <div class="flex justify-center">
                                            <button wire:click.prevent="loadSchedule({{ $teacher->id }})"
                                                class="button-teacher inline-block bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 hover:text-white mt-5">Select</button>
                                            
                                            </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="mt-10 mb-20">
                    <h3 class="text-4xl font-bold text-gray-800">There are no available teachers in the selected
                        schedule.</h3>
                    <h4 class="text-2xl font-bold text-gray-400">Please, go back and select a different schedule.</h4>
                    <a href="{{ url()->previous() }}"
                        class="inline-block bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 hover:text-white mt-5">Go
                        Back</a>
                </div>
            </div>
        </div>
    @endif
    @include('components.loading-state')
</div>
