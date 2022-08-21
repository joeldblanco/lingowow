<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <h2 class="text-4xl font-bold my-10 text-gray-800 capitalize">My Modules</h2>
                <hr class="mb-10 mt-10">

                @foreach ($module_first as $module)
                    <div onclick="location.href='{{ route('module.show', $module->id) }}';"
                        class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between mb-10 shadow-md hover:shadow-xl cursor-pointer items-center">

                        <div class="w-3/12 m-5">
                            <img class="rounded-lg rounded-b-none"
                                src="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"
                                alt="thumbnail" loading="lazy" />
                        </div>
                        <div class="w-full flex flex-col justify-start">
                            <div class="my-5 px-5 space-y-4">
                                <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                    {{ $module->module_name }}
                                </h1>
                                <p class="text-justify pr-10">{{ $module->module_description }}</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                @endforeach
                @foreach ($modules as $module)
                    {{-- @php App\Http\Controllers\CourseController::module_passed($module) @endphp --}}
                    @if ($role == 'admin' || $role == 'teacher' || App\Http\Controllers\CourseController::module_passed($module,$user->id))
                    <div onclick="location.href='{{ route('module.show', $module->id) }}';"
                        class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between mb-10 shadow-md hover:shadow-xl cursor-pointer items-center">

                        <div class="w-3/12 m-5">
                            <img class="rounded-lg rounded-b-none"
                                src="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"
                                alt="thumbnail" loading="lazy" />
                        </div>
                        <div class="w-full flex flex-col justify-start">
                            <div class="my-5 px-5 space-y-4">
                                <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                    {{ $module->module_name }}
                                </h1>
                                <p class="text-justify pr-10">{{ $module->module_description }}</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    @else
                    <div
                    class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between mb-10 shadow-inner items-center opacity-50 filter saturate-0">

                    <div class="w-3/12 m-5">
                        <img class="rounded-lg rounded-b-none"
                            src="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"
                            alt="thumbnail" loading="lazy" />
                    </div>
                    <div class="w-full flex flex-col justify-start">
                        <div class="my-5 px-5 space-y-4">
                            <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                {{ $module->module_name }}
                            </h1>
                            <p class="text-justify pr-10">{{ $module->module_description }}</p>
                        </div>
                    </div>
                    <div class="text-3xl text-gray-400 w-1/12">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
