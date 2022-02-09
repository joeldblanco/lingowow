<x-app-layout>

    @php

        // dd(Auth::user()->canBeImpersonated());

        if(isset($_GET['tz']))
        {
            // This is just an example. In application this will come from Javascript (via an AJAX or something)
            $timezone_offset_minutes = $_GET['tz'];  // $_GET['timezone_offset_minutes']

            // Convert minutes to seconds
            $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);
            session(['tz' => $timezone_name]);
        }

        function tz()
        {
            $tz = isset($_GET['tz']) ? "false" : isset($_GET['tz']);
            return $tz;
        }
    @endphp

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                @if(isset($_GET['tz']))

                    @php
                        $users = \App\User::select('first_name','last_name','id')->get();
                        $affected_students = session('affected_students');
                    @endphp

                    @if (session('message'))

                        <div x-data="{ showModal1: true }">
                            <div
                            class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                            x-show="showModal1"
                            x-transition:enter="transition duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            >
                                <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                    <div
                                        class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
                                        @click.outside="showModal1 = false"
                                        x-show="showModal1"
                                        x-transition:enter="transition transform duration-300"
                                        x-transition:enter-start="scale-0"
                                        x-transition:enter-end="scale-100"
                                        x-transition:leave="transition transform duration-300"
                                        x-transition:leave-start="scale-100"
                                        x-transition:leave-end="scale-0"
                                    >
                                        <header class="flex items-center justify-between p-4 pb-2 text-lg">
                                        <h2 class="font-semibold">Scheduled Changed</h2>
                                        <button wire:click="edit()" class="focus:outline-none p-2" @click="showModal1 = false">
                                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <path
                                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                                            ></path>
                                            </svg>
                                        </button>
                                        </header>
                                        <main class="p-4 pt-2">
                                        <p class="mb-3">
                                            {{session('message')}}
                                        </p>
                                        @isset($affected_students)
                                            @if (count($affected_students) > 0)
                                                <ul class="list-inside list-disc">
                                                @foreach ($users as $user)
                                                    @if(in_array($user->id,$affected_students))
                                                        <li class="font-bold">{{$user->first_name}} {{$user->last_name}}</li>
                                                    @endif
                                                @endforeach
                                                </ul>
                                                @php
                                                    session()->forget('affected_students')
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
                            session()->forget('message')
                        @endphp
                    @endif

                @endif
                {{-- @php
                    $endpoint = "https://api-m.sandbox.paypal.com/v1/invoicing/invoices?page=3&page_size=4&total_count_required=true";
                    $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'AFUkXueT8iPjKy901SK.GCbRSHRlAxt9DlHdQNL-yCIwELb8Owl4Gopa'
                    ])->get("https://api-m.sandbox.paypal.com/v1/invoicing/invoices?page=3&page_size=4&total_count_required=true");

                    dd($response);
                @endphp --}}

                    <div class="mt-10">
                        @if (Auth::user()->roles->pluck('name')[0] == 'student')
                            <a href="{{route('classroom',auth()->id())}}" class="inline-block bg-blue-800 text-white px-6 py-4 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Classroom</a>
                        @endif
                        @if (Auth::user()->roles->pluck('name')[0] == 'teacher' || Auth::user()->roles->pluck('name')[0] == 'student')
                            <a href="{{route('classes.index')}}" class="inline-block bg-blue-500 text-white px-6 py-4 rounded hover:bg-blue-600 hover:text-white hover:no-underline">Classes</a>
                        @endif
                    </div>
                
                <div>
                    <livewire:scheduled-calendar />
                </div>
                
                <livewire:rating-form />

            </div>
        </div>
    </div>
    <script>
        let _tz = {{tz()}};
        if(_tz)
        {
            var tz = new Date().getTimezoneOffset();
            tz = tz == 0 ? 0 : -tz;
            window.location.href = window.location.href + "?tz=" + tz;
        }
    </script>

</x-app-layout>