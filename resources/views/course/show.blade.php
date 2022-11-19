<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="w-full flex justify-between my-10">
                    <h2 class="text-4xl font-bold text-gray-800 capitalize">My Modules</h2>
                    @role('admin')
                        <a href="{{ route('modules.create') }}"
                            class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-lw-light_blue">+</a>
                    @endrole
                </div>
                <hr class="mb-10">
                @forelse ($modules as $module)
                    <div class="flex items-center mb-10">
                        <div @if ($user_modules->contains($module)) onclick="location.href='{{ route('modules.show', $module->id) }}';" @endif
                            class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between items-center @if (!$user_modules->contains($module)) shadow-inner opacity-50 filter saturate-0 @else shadow-md hover:shadow-xl cursor-pointer @endif">

                            <div class="w-3/12 m-5">
                                <img class="rounded-lg rounded-b-none" src="{{ Storage::url($module->image) }}"
                                    alt="thumbnail" loading="lazy" />
                            </div>
                            <div class="w-full flex flex-col justify-start">
                                <div class="my-5 px-5 space-y-4">
                                    <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                        {{ $module->name }}
                                    </h1>
                                    <p class="text-justify pr-10">{{ $module->description }}</p>
                                </div>
                            </div>
                            <div class="text-3xl text-gray-400 w-1/12">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        @role('admin')
                            <div onclick="location.href='{{ route('modules.details', $module->id) }}';"
                                class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6">
                                <i class="fas fa-info-circle mx-auto"></i>
                            </div>
                        @endrole
                    </div>
                @empty
                    <div class="flex justify-center items-center">
                        <h1 class="text-2xl text-gray-500">No modules found</h1>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
