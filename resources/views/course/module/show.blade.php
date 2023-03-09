<x-app-layout>

    <div class="bg-white font-sans" x-data="{ unitOrExam: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 units-list">

                {{ Breadcrumbs::render('modules.show', $module->id) }}

                <div class="w-full flex justify-between my-10">
                    <h2 class="text-4xl font-bold text-gray-800 capitalize">My Units</h2>
                    @if ($module->course->categories->pluck('name')->contains('Conversational'))
                        @hasanyrole('admin|teacher')
                            <div class="relative">
                                @if (count($module_units))
                                    <a href="{{ route('modules.details', $module_units->first()->module->id) }}"
                                        class="leading-10 text-xl font-bold text-white capitalize rounded-full p-2 bg-green-600 w-10 mr-5 hover:bg-green-800 orden-unit"><i
                                            class="fas fa-sort"></i></a>
                                @endif
                                <button @click="unitOrExam = true"
                                    class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-blue-800 add-unit">+</button>
                                <div x-show="unitOrExam" @click.outside="unitOrExam = false"
                                    class="right-4 top-8 absolute flex flex-col border border-gray-400 rounded-xl divide-y divide-opacity-100 divide-gray-300 bg-white">
                                    <a href="{{ route('units.create', ['module_id' => $module->id]) }}"
                                        class="hover:bg-gray-200 p-2 rounded-xl" @click="unitOrExam = false">Unit</a>
                                    <a href="{{ route('exams.create', ['module_id' => $module->id]) }}"
                                        class="hover:bg-gray-200 p-2 rounded-xl" @click="unitOrExam = false">Exam</a>
                                </div>
                                <x-shepherd-tour tourName="teachers/course_conversational" role="teacher" />
                            </div>
                        @endhasanyrole
                    @else
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
                                    <a href="{{ route('units.create', ['module_id' => $module->id]) }}"
                                        class="hover:bg-gray-200 p-2 rounded-xl" @click="unitOrExam = false">Unit</a>
                                    <a href="{{ route('exams.create', ['module_id' => $module->id]) }}"
                                        class="hover:bg-gray-200 p-2 rounded-xl" @click="unitOrExam = false">Exam</a>
                                </div>
                            </div>
                        @endrole
                    @endif

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
                            @if ($module->course->categories->pluck('name')->contains('Conversational'))
                                @hasanyrole('admin|teacher')
                                    <div onclick="location.href='{{ route('units.edit', $unit->id) }}';"
                                        class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6 @if ($loop->first) first-unit-edit @endif">
                                        <i class="fas fa-info-circle mx-auto"></i>
                                    </div>
                                @endhasanyrole
                            @else
                                @role('admin')
                                    <div onclick="location.href='{{ route('units.edit', $unit->id) }}';"
                                        class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6">
                                        <i class="fas fa-info-circle mx-auto"></i>
                                    </div>
                                @endrole
                            @endif
                        </div>
                        @if ($unit->exams->where('status', 1)->count() > 0 && $role != 'guest')
                            @php
                                $exam = $unit->exams->where('status', 1)->random();
                            @endphp
                            <div class="flex justify-between items-center mb-10" x-data="{ examModal_{{ $exam->id }}: false }">
                                <div @click="examModal_{{ $exam->id }} = true"
                                    class="group flex flex-row bg-red-100 rounded-lg w-full justify-between shadow-md hover:shadow-xl cursor-pointer items-center">

                                    <div class="w-3/12 m-5">
                                        <img class="rounded-lg rounded-b-none"
                                            src="{{ Storage::url($unit->module->image) }}" alt="thumbnail"
                                            loading="lazy" />
                                    </div>
                                    <div class="w-full flex flex-col justify-start">
                                        <div class="my-5 px-5 space-y-4">
                                            <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                                {{ $exam->title }}
                                            </h1>
                                            <p class="text-justify pr-10">{{ $exam->description }}</p>
                                        </div>
                                    </div>
                                    <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>


                                @if (auth()->user()->hasRole('student'))
                                    <x-modal type="info" name="examModal_{{ $exam->id }}"
                                        class="w-6/12 mx-auto">
                                        <x-slot name="title">
                                            @php
                                                $attempt = $exam->attempts
                                                    ->where('user_id', auth()->id())
                                                    ->where('completed_at', null)
                                                    ->first();
                                            @endphp
                                            <p class="text-2xl font-semibold mt-5 ml-5 text-gray-500">
                                                @if (!empty($attempt))
                                                    Continue attempt
                                                @else
                                                    Start attempt
                                                @endif
                                            </p>
                                        </x-slot>
                                        <x-slot name="content" class="px-16">
                                            <p class="text-2xl font-bold text-left mb-3">Time limit</p>
                                            <p class="text-justify">

                                                @if (!empty($attempt))
                                                    You have already started this attempt. You have
                                                    {{ (new Carbon\Carbon($attempt->created_at))->addSecond()->addMinutes($exam->duration)->diffForHumans(Carbon\Carbon::now(), [
                                                            'syntax' => Carbon\CarbonInterface::DIFF_ABSOLUTE,
                                                            'parts' => 2,
                                                            'join' => ' and ',
                                                        ]) }}
                                                    remaining.
                                                    Are you sure you wish to continue?
                                                @else
                                                    Your attempt will have a time limit of
                                                    {{ Carbon\Carbon::now()->addSecond()->addMinutes($exam->duration)->diffForHumans(Carbon\Carbon::now(), [
                                                            'syntax' => Carbon\CarbonInterface::DIFF_ABSOLUTE,
                                                            'parts' => 2,
                                                            'join' => ' and ',
                                                        ]) }}.
                                                    When you
                                                    start, the timer
                                                    will begin to count
                                                    down and cannot be paused. You must finish your attempt before it
                                                    expires.
                                                    Are you sure you
                                                    wish to start now?
                                                @endif
                                            </p>

                                            <div class="flex mt-10 space-x-2 justify-start">
                                                <a href="{{ route('exams.show', $exam->id) }}"
                                                    class="bg-lw-blue hover:bg-blue-800 py-2 px-4 rounded-md font-bold text-white">
                                                    @if (!empty($attempt))
                                                        Continue attempt
                                                    @else
                                                        Start attempt
                                                    @endif
                                                </a>
                                                <button
                                                    class="bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded-md font-bold text-gray-600">
                                                    Cancel
                                                </button>
                                            </div>
                                        </x-slot>
                                        <x-slot name="footer">
                                        </x-slot>
                                    </x-modal>
                                @endif

                                @role('admin')
                                    <div onclick="location.href='{{ route('exams.edit', $exam->id) }}';"
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
                                <img class="rounded-lg rounded-b-none" src="{{ Storage::url($unit->module->image) }}"
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
                        @if ($unit->exams->count() > 0 && $role != 'guest')
                            @php
                                $exam = $unit->exams->random();
                            @endphp
                            <div class="flex justify-between items-center mb-10">
                                <div
                                    class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between mb-10 shadow-inner items-center opacity-50 filter saturate-0">

                                    <div class="w-3/12 m-5">
                                        <img class="rounded-lg rounded-b-none"
                                            src="{{ Storage::url($unit->module->image) }}" alt="thumbnail"
                                            loading="lazy" />
                                    </div>
                                    <div class="w-full flex flex-col justify-start">
                                        <div class="my-5 px-5 space-y-4">
                                            <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                                {{ $exam->title }}
                                            </h1>
                                            <p class="text-justify pr-10">{{ $unit->unit_description }}</p>
                                        </div>
                                    </div>
                                    <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                                @role('admin')
                                    <div
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

                @php
                    $tourReschedulingButton = DB::table('shepherd_users')
                        ->where('user_id', auth()->id())
                        ->where('tour_name', 'teachers/unit_created')
                        ->first();
                @endphp
                @if ($tourReschedulingButton == null)
                    @role('teacher')
                        <x-shepherd-tour tourName="teachers/unit_created" role="teacher" />
                    @endrole
                @endif

            </div>
        </div>
    </div>

    <x-shepherd-tour tourName="guests/units_preview" role="guest" />

</x-app-layout>
