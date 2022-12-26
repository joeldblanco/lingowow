<x-app-layout>

    <div style="width: 100%" class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                {{-- @if (isset($_GET['tz'])) --}}

                {{-- {{ dd(session('affected_students')) }} --}}

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

                <div class="mt-10">
                    @role('student')
                        <a href="{{ route('classroom', auth()->id()) }}"
                            class="inline-block bg-lw-blue text-white px-6 py-4 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Classroom</a>
                    @endrole

                    @hasanyrole('student|teacher')
                        <a href="{{ route('classes.index', ['start_date' => App\Http\Controllers\ApportionmentController::currentPeriod(true)[0], 'end_date' => App\Http\Controllers\ApportionmentController::currentPeriod(true)[1]]) }}"
                            class="inline-block bg-lw-light_blue text-white px-6 py-4 rounded hover:bg-lw-light_blue hover:text-white hover:no-underline">Classes</a>
                    @endhasanyrole
                </div>

                <div>
                    @php
                        $course_id = auth()->user()->enrolments->first()->course->id;
                    @endphp
                    @livewire('schedule', ['user_id' => auth()->id(), 'mode' => 'show', 'course_id' => $course_id])
                </div>

                @role('teacher')
                    @php
                        $classes = App\Models\Enrolment::select('student_id')
                            ->where('teacher_id', auth()->id())
                            ->get();
                        
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
                                                <img class="rounded-full w-10 h-10"
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endrole

                <livewire:rating-form />

            </div>
        </div>
    </div>

</x-app-layout>
