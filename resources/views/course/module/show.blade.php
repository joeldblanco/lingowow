<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <h2 class="text-4xl font-bold my-10 text-gray-800 capitalize">My Units</h2>
                <hr class="mb-10 mt-10">

                {{-- @foreach ($user_units as $group) --}}
                {{-- {{dd($user_units)}} --}}
                    {{-- {{dump(App\Http\Controllers\ModuleController::is_passed($group->isPassed($user->id)->first()))}} --}}
                    {{-- {{dd($group->isPassed($user->id)->first()->pivot->nota)}} --}}
                    @if ($role == 'admin' ||
                        $role == 'teacher' ||
                        App\Http\Controllers\ModuleController::is_passed($group->isPassed($user->id,$group->id)->first(),$group->id))
                        @foreach ($user_units as $unit)
                            {{-- {{dump($unit)}} --}}
                            {{-- {{dd($unit)}} --}}
                            <div class="flex justify-between items-center mb-10">
                                <div onclick="location.href='{{ route('units.show', $unit->id) }}';"
                                    class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between shadow-md hover:shadow-xl cursor-pointer items-center">
                                    <div class="w-3/12 m-5">
                                        <img class="rounded-lg rounded-b-none"
                                        src="{{ Storage::url($unit->unit_image) }}"
                                            alt="thumbnail" loading="lazy" />
                                    </div>
                                    <div class="w-full flex flex-col justify-start">
                                        <div class="my-5 px-5 space-y-4">
                                            <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                                {{ $unit->unit_name }}
                                            </h1>
                                            <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                                        </div>
                                    </div>
                                    <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                                @role('admin')
                                    <div onclick="location.href='{{ route('units.edit', $unit->id) }}';"
                                        class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6">
                                        <i class="fas fa-info-circle mx-auto"></i>
                                    </div>
                                @endrole
                            </div>
                        @endforeach
                        {{-- {{dd($group->exams)}} --}}
                        @if ($unit->exams->count() > 0)
                            @php
                                $exam = $group->exams->random();
                            @endphp
                            <div class="flex justify-between items-center mb-10">
                                <div onclick="location.href='{{ route('exam.display', $exam->id) }}';"
                                    class="group flex flex-row bg-red-100 rounded-lg w-full justify-between mb-10 shadow-md hover:shadow-xl cursor-pointer items-center">

                                    <div class="w-3/12 m-5">
                                        <img class="rounded-lg rounded-b-none"
                                            src="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"
                                            alt="thumbnail" loading="lazy" />
                                    </div>
                                    <div class="w-full flex flex-col justify-start">
                                        <div class="my-5 px-5 space-y-4">
                                            <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                                Quiz
                                            </h1>
                                            <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                                        </div>
                                    </div>
                                    <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                                @role('admin')
                                    <div onclick="location.href='{{ route('exam.details', $exam->id) }}';"
                                        class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6">
                                        <i class="fas fa-info-circle mx-auto"></i>
                                    </div>
                                @endrole
                            </div>
                        @endif
                    @else
                        @foreach ($user_units as $unit)
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
                                            {{ $unit->unit_name }}
                                        </h1>
                                        <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                                    </div>
                                </div>
                                <div class="text-3xl text-gray-400 w-1/12">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        @endforeach
                        @if ($group->exams->count() > 0)
                            @php
                                $exam = $group->exams->random();
                            @endphp
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
                                            Quiz
                                        </h1>
                                        <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                                    </div>
                                </div>
                                <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        @endif
                    @endif
                {{-- @endforeach --}}


            </div>
        </div>
    </div>
</x-app-layout>
