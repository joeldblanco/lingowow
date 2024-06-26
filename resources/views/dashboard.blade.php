<x-app-layout>

    @php
        $session_info = json_decode(
            (new Illuminate\Http\Client\PendingRequest())
                ->get('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'])
                ->getBody(),
            true,
        );
        // dump($session_info['timezone']);
        if ($session_info['status'] == 'fail') {
            session()->forget('session_info');
        } else {
            if (!Auth::user()->isImpersonated()) {
                session(['session_info' => $session_info]);
                // auth()
                //     ->user()
                //     ->update(['timezone' => session('session_info')['timezone']['id']]);

                $user = auth()->user();
                $user->timezone = session('session_info')['timezone'];
                $user->ip = session('session_info')['query'];
                $user->save();
            }
        }
    @endphp

    <script>
        console.log(Intl.DateTimeFormat().resolvedOptions().timezone == @json(auth()->user()->timezone));
    </script>

    <div style="width: 100%" class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">

                @php
                    $users = \App\User::select('first_name', 'last_name', 'id')->get();
                    $affected_students = session('affected_students');
                @endphp

                @if (session('message'))

                    <div x-data="{ showModal1: true }">
                        <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                            x-show="showModal1" x-transition:enter="transition duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0">
                            <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
                                    @click.outside="showModal1 = false" x-show="showModal1"
                                    x-transition:enter="transition transform duration-300"
                                    x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                                    x-transition:leave="transition transform duration-300"
                                    x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                                    <header class="flex items-center justify-between p-4 pb-2 text-lg">
                                        <h2 class="font-semibold">Scheduled Changed</h2>
                                        <button wire:click="edit()" class="focus:outline-none p-2"
                                            @click="showModal1 = false">
                                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewBox="0 0 18 18">
                                                <path
                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                </path>
                                            </svg>
                                        </button>
                                    </header>
                                    <main class="p-4 pt-2">
                                        <p class="mb-3">
                                            {{ session('message') }}
                                        </p>
                                        @isset($affected_students)
                                            @if (count($affected_students) > 0)
                                                <ul class="list-inside list-disc">
                                                    @foreach ($users as $user)
                                                        @if (in_array($user->id, $affected_students))
                                                            <li class="font-bold">{{ $user->first_name }}
                                                                {{ $user->last_name }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @php
                                                    session()->forget('affected_students');
                                                @endphp
                                            @endif
                                        @endisset
                                    </main>
                                    <footer class="p-2"></footer>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        session()->forget('message');
                    @endphp
                @endif

                {{-- @endif --}}
                {{-- @php
                    $endpoint = "https://api-m.sandbox.paypal.com/v1/invoicing/invoices?page=3&page_size=4&total_count_required=true";
                    $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'AFUkXueT8iPjKy901SK.GCbRSHRlAxt9DlHdQNL-yCIwELb8Owl4Gopa'
                    ])->get("https://api-m.sandbox.paypal.com/v1/invoicing/invoices?page=3&page_size=4&total_count_required=true");

                    dd($response);
                @endphp --}}

                @php
                    $enrolment = auth()->user()->enrolments->first();
                    $course_id = null;
                    $course_modality = null;

                    if ($enrolment != null) {
                        $course_id = $enrolment->course->id;
                        $course_modality = $enrolment->course->modality;
                    }
                @endphp

                <div class="mt-10 w-full flex items-center space-x-4">
                    <div class="w-3/12">
                        <div class="buttons-dashboard-tour">
                            @role('student')
                                <a href="{{ route('classroom', auth()->id()) }}"
                                    class="inline-block bg-lw-blue text-white px-4 py-2 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Classroom</a>
                            @endrole

                            @hasanyrole('student|teacher')
                                <a href="{{ route('classes.index', ['start_date' => App\Http\Controllers\ApportionmentController::currentPeriod(true)['start_date'], 'end_date' => App\Http\Controllers\ApportionmentController::currentPeriod(true)['end_date']]) }}"
                                    class="inline-block bg-lw-light_blue text-white px-4 py-2 rounded hover:bg-lw-light_blue hover:text-white hover:no-underline">Classes</a>
                            @endhasanyrole
                        </div>
                    </div>

                    @role('student')
                        @if (!$enrolment->course->categories->pluck('name')->contains('Conversational'))
                            <div class="w-9/12">
                                <div id="chart" class="barprogress-tour"></div>
                                @php
                                    $user_units = auth()->user()->units;
                                    if (count($user_units) <= 0) {
                                        $user_units = 0;
                                    } else {
                                        $user_units = auth()->user()->units->last();

                                        $user_units = $user_units
                                            ->course()
                                            ->modules->sortBy('order')
                                            ->where('order', '<=', $user_units->module->order)
                                            ->pluck('units')
                                            ->flatten();

                                        $user_units =
                                            $user_units->count() -
                                            $user_units
                                                ->where('module_id', auth()->user()->units->last()->module->id)
                                                ->where('order', '>', auth()->user()->units->last()->order)
                                                ->count();
                                    }
                                @endphp
                                @push('header-scripts')
                                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                @endpush
                                <script>
                                    var options = {
                                        series: [{
                                                name: 'Progress (Units)',
                                                data: [{{ $user_units }}]
                                            },
                                            {
                                                name: 'Remaining (Units)',
                                                data: [{{ count($enrolment->course->units()) - $user_units }}]
                                            },
                                        ],
                                        chart: {
                                            type: 'bar',
                                            height: 150,
                                            stacked: true,
                                            stackType: "100%",
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        legend: {
                                            position: 'top'
                                        },
                                        xaxis: {
                                            categories: ['{{ $enrolment->course->name }}'],
                                        },
                                        yaxis: {
                                            labels: {
                                                show: false
                                            }
                                        },
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                                    chart.render();
                                </script>
                            </div>
                        @endif
                    @endrole
                </div>

                <div class="mt-5">
                    @role('student')
                        @if ($course_modality == 'synchronous')
                            {{-- @if (auth()->id() == 9 || auth()->id() == 5) --}}
                            {{-- @php
                                    dd(now()->dayOfWeek);
                                @endphp --}}
                            @livewire('schedule-controller', ['limit' => null, 'week' => null, 'users' => auth()->id(), 'action' => 'studentShow'])
                            {{-- @livewire('schedule', ['user_id' => auth()->id(), 'mode' => 'show', 'course_id' => $course_id]) --}}
                            {{-- @else --}}
                            {{-- @livewire('schedule', ['user_id' => auth()->id(), 'mode' => 'show', 'course_id' => $course_id]) --}}
                            {{-- @endif --}}
                        @endif
                    @endrole
                    @hasanyrole('teacher')
                        {{-- @if (auth()->id() == 7) --}}
                        @livewire('schedule-controller', ['limit' => null, 'week' => null, 'users' => auth()->id(), 'action' => 'teacherShow'])
                        {{-- @livewire('schedule', ['user_id' => auth()->id(), 'mode' => 'show', 'course_id' => $course_id]) --}}
                        {{-- @endif --}}
                    @endrole
                    @role('guest')
                        <div class="flex flex-col items-center h-screen pt-20">
                            <i class="fas fa-ghost text-9xl text-gray-300 mb-10"></i>
                            <p class="text-4xl text-gray-500">Nothing to show here</p>
                            <p class="text-2xl text-gray-400 mb-10">You are not enrolled in any course</p>
                            <a href="{{ route('courses.index') }}"
                                class="bg-lw-blue py-2 px-4 rounded-md text-white hover:bg-blue-800 preview-courses-button">Preview
                                Courses 👀</a>
                        </div>
                    @endrole
                </div>

                @role('teacher')
                    @php
                        $classes = App\Models\Enrolment::select('student_id')->where('teacher_id', auth()->id())->get();

                        $students = [];
                        foreach ($classes as $key => $value) {
                            $students[$key] = $value->student_id;
                        }
                        $students = App\Models\User::find($students);
                    @endphp
                    @if (count($students) > 0)
                        <table class="flex flex-col w-1/2 space-y-5 border border-gray-200 p-5 mb-16">
                            <thead>
                                <tr class="flex justify-around">
                                    <th class="text-xl font-bold">Students</th>
                                </tr>
                                <tr class="flex text-md">
                                    <th class="flex w-10/12 items-start">User Profile</th>
                                    <th class="flex w-2/12 justify-around">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="space-y-4">
                                @foreach ($students as $student)
                                    <tr class="flex">
                                        <td class="flex w-10/12 items-start">
                                            <div class="flex space-x-3">
                                                <img class="rounded-full w-10 h-10 object-cover"
                                                    src="{{ Storage::url($student->profile_photo_path) }}"
                                                    alt="profile_picture">
                                                <div class="flex flex-col items-start text-sm">
                                                    <p>{{ $student->first_name }}
                                                        {{ $student->last_name }}
                                                    </p>
                                                    <p>{{ $student->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="flex w-2/12 justify-around">
                                            <a href="{{ route('profile.show', $student->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('classroom', $student->id) }}">
                                                <i class="fas fa-door-open"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endrole

                {{-- @if (!Auth::user()->isImpersonated()) --}}
                {{-- @role('student')
                        <livewire:rating-form />
                    @endrole --}}
                {{-- @endif --}}

            </div>
        </div>
    </div>
    @role('guest')
        <x-shepherd-tour tourName="guests/welcome" role="guest" />
    @endrole
    @role('teacher')
        <x-shepherd-tour tourName="teachers/welcome" role="teacher" />
    @endrole
    @role('student')
        <x-shepherd-tour tourName="students/welcome" role="student" />
    @endrole

</x-app-layout>
