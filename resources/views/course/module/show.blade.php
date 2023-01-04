<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 units-list">

                <div class="w-full flex justify-between my-10" x-data="{ unitOrExam: false }">
                    <h2 class="text-4xl font-bold text-gray-800 capitalize">My Units</h2>
                    @role('admin')
                        <div class="relative">
                            @if (count($module_units))
                                <a href="{{ route('modules.details', $module_units->first()->module->id) }}"
                                    class="leading-10 text-xl font-bold text-white capitalize rounded-full p-2 bg-green-600 w-10 mr-5 hover:bg-green-800"><i
                                        class="fas fa-sort"></i></a>
                            @endif
                            <button @click="unitOrExam = true"
                                class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-blue-800">+</button>
                            <div x-show="unitOrExam" @click.outside="unitOrExam = false"
                                class="right-4 top-8 absolute flex flex-col border border-gray-400 rounded-xl divide-y divide-opacity-100 divide-gray-300 bg-white">
                                <a href="{{ route('units.create') }}" class="hover:bg-gray-200 p-2 rounded-xl"
                                    @click="unitOrExam = false">Unit</a>
                                <a href="{{ route('exam.create') }}" class="hover:bg-gray-200 p-2 rounded-xl"
                                    @click="unitOrExam = false">Exam</a>
                            </div>
                        </div>
                    @endrole
                </div>
                <hr class="mb-10 mt-10">

                {{-- {{dd($user_units, $module_units)}} --}}

                {{-- @foreach ($user_units as $group) --}}
                {{-- {{dd($user_units)}} --}}
                {{-- {{dump(App\Http\Controllers\ModuleController::is_passed($group->isPassed($user->id)->first()))}} --}}
                {{-- {{dd($group->isPassed($user->id)->first()->pivot->nota)}} --}}
                {{-- @if ($role == 'admin' || $role == 'teacher' || App\Http\Controllers\ModuleController::is_passed($group->isPassed($user->id, $group->id)->first(), $group->id)) --}}
                @forelse ($module_units as $unit)
                    @if ($user_units->contains($unit))
                        <div
                            class="flex justify-between items-center mb-10 @if ($loop->first) first-unit @endif">
                            <div onclick="location.href='{{ route('units.show', $unit->id) }}';"
                                class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between shadow-md hover:shadow-xl cursor-pointer items-center">
                                <div class="w-3/12 m-5">
                                    <img class="rounded-lg rounded-b-none" src="{{ Storage::url($unit->image) }}"
                                        alt="thumbnail" loading="lazy" />
                                </div>
                                <div class="w-full flex flex-col justify-start">
                                    <div class="my-5 px-5 space-y-4">
                                        <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                            {{ $unit->name }}
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
                        @if ($unit->exams->count() > 0)
                            @php
                                $exam = $unit->exams->random();
                            @endphp
                            <div class="flex justify-between items-center mb-10">
                                <div onclick="location.href='{{ route('exam.display', $exam->id) }}';"
                                    class="group flex flex-row bg-red-100 rounded-lg w-full justify-between shadow-md hover:shadow-xl cursor-pointer items-center">

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
                                        {{ $unit->name }}
                                    </h1>
                                    <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                                </div>
                            </div>
                            <div class="text-3xl text-gray-400 w-1/12">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        @if ($unit->exams->count() > 0)
                            @php
                                $exam = $unit->exams->random();
                            @endphp
                            <div class="flex justify-between items-center mb-10">
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
                                @role('admin')
                                    <div onclick="location.href='{{ route('exam.details', $exam->id) }}';"
                                        class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6">
                                        <i class="fas fa-info-circle mx-auto"></i>
                                    </div>
                                @endrole
                            </div>
                        @endif
                    @endif
                @empty
                    <div class="flex justify-center items-center">
                        <h1 class="text-2xl text-gray-500">No units found</h1>
                    </div>
                @endforelse
                {{-- @else --}}
                {{-- @foreach ($user_units as $unit)
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
                                    {{ $unit->name }}
                                </h1>
                                <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 w-1/12">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                @endforeach --}}
                {{-- @if ($group->exams->count() > 0)
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
                    @endif --}}
                {{-- @endif --}}
                {{-- @endforeach --}}


            </div>
        </div>
    </div>

    {{-- FALTA COLOCAR UNA CONDICIÓN PARA QUE SE EJECUTE SOLO LA PRIMERA VEZ QUE EL USUARIO INGRESA AL SITIO --}}
    <script src="{{ asset('js/shepherdjs_tours/units_preview.js') }}" defer></script>
</x-app-layout>
