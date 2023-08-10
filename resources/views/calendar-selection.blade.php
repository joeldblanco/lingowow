<x-app-layout>

    {{-- @if (session('message'))

        <div x-data="{ showModal1: true }">
            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                x-show="showModal1" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                    <div class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
                        @click.outside="showModal1 = false" x-show="showModal1"
                        x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                        x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                        x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                        <header class="flex items-center justify-between p-4 pb-2 text-lg">
                            <h2 class="font-semibold">Scheduled Changed</h2>
                            <button wire:click="edit()" class="focus:outline-none p-2" @click="showModal1 = false">
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
    @endif --}}

    <div style="height: 100%" class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">

                @if ($plan != 1)
                    @livewire('teachers-carousel')
                @endif
                @php
                    $course_id = session('selected_course');
                    if ($course_id != null) {
                        $modality_course = App\Models\Course::find($course_id)->modality;
                    }
                @endphp

                @if (App\Models\Course::find($course_id)->categories()->pluck('name')->contains('Test'))
                    @php
                        $available_teachers = App\Models\User::role('teacher')
                            ->pluck('id')
                            ->toArray();
                    @endphp
                    @livewire('teachers-carousel', ['available_teachers' => $available_teachers])
                    @livewire('schedule-controller', [
                        'limit' => 2,
                        'users' => $available_teachers,
                        'action' => 'examSelection',
                        'week' => App\Http\Controllers\ApportionmentController::getWeekOfPeriod(now()),
                    ])
                @else
                    @if (!empty($preselection))
                        @livewire('schedule-controller', ['week' => null, 'users' => auth()->id(), 'action' => 'schedulePreselection', 'limit' => $plan, 'data' => ['product_id' => $product_id]])
                    @else
                        @livewire('schedule-controller', ['week' => null, 'users' => auth()->id(), 'action' => 'scheduleSelection', 'limit' => $plan, 'data' => ['product_id' => $product_id]])
                    @endif
                @endif

                @role('guest')
                    <x-shepherd-tour tourName="guests/teachers-carousel" role="guest" />
                @endrole

            </div>
        </div>
    </div>

</x-app-layout>
