<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Lingowow') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.min.css"
        integrity="sha512-BiFZ6oflftBIwm6lYCQtQ5DIRQ6tm02svznor2GYQOfAlT3pnVJ10xCrU3XuXnUrWQ4EG8GKxntXnYEdKY0Ugg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

    @livewireStyles
    @routes

    <!-- Scripts -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/eventListeners.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js@8.3.1/dist/js/shepherd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js@8.3.1/dist/css/shepherd.css" />
    <script src="https://kit.fontawesome.com/968fe8efd4.js" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"
        integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.12/lib/draggable.bundle.js"></script>
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.tiny.cloud/1/jy6nhm56ocupzi0w2x4amhox5z3e948f2838lr8uuyxovpck/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/wordfind.js') }}"></script>
    <script src="{{ asset('js/wordfindgame.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js"></script>
    <script src='//fw-cdn.com/2451489/3025849.js' chat='true'></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    @if (session('success'))
        <div class="flex justify-center fixed bottom-5 left-5 z-20" x-data="{ open: true }" x-show="open" x-cloak>
            <div
                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-green-600 border-green-600 text-white">
                <div>
                    {{ session('success') }}
                </div>
                <div class="flex mt-2 sm:mt-0 sm:ml-4">
                    <button @click="open = false"
                        class="px-3 py-2 hover:bg-green-700 transition ease-in-out duration-300 cursor-pointer">
                        Dismiss </button>
                </div>
            </div>
        </div>
        @php
            session()->forget('success');
        @endphp
    @endif

    @if (session('error'))
        <div class="flex justify-center fixed bottom-5 left-5 z-20" x-data="{ open: true }" x-show="open" x-cloak>
            <div
                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-red-600 border-red-600 text-white">
                <div>
                    {{ session('error') }}
                </div>
                <div class="flex mt-2 sm:mt-0 sm:ml-4">
                    <button @click="open = false"
                        class="px-3 py-2 hover:bg-red-700 transition ease-in-out duration-300 cursor-pointer">
                        Dismiss </button>
                </div>
            </div>
        </div>
        @php
            session()->forget('error');
        @endphp
    @endif

    <div class="min-h-screen bg-white flex flex-col">

        @if (Auth::user()->isImpersonated())
            <div class="bg-lw-blue text-center py-3">
                <p class="text-white font-semibold">Impersonating</p>
                <a href="{{ route('stopImpersonation') }}" class="text-sm hover:font-bold">Stop Impersonation</a>
            </div>
        @endif

        @if (auth()->user()->roles->first()->name == 'guest' &&
                (Route::currentRouteName() == 'courses.index' ||
                    Route::currentRouteName() == 'courses.show' ||
                    Route::currentRouteName() == 'modules.show' ||
                    Route::currentRouteName() == 'units.show'))
            <div class="bg-yellow-300 text-center py-3">
                <p class="text-red-500 font-semibold">You are previewing our courses. If you want to buy one click <a
                        href="{{ route('shop') }}" class="text-md font-bold hover:underline">here</a>.</p>
            </div>
        @endif

        @livewire('first-navigation-menu')
        @include('second-navigation-menu')

        <!-- Page Content -->
        @livewireScripts

        <main class="pb-10 w-full min-h-screen">
            {{ $slot }}
        </main>


        @if (auth()->user()->hasRole('admin') || Auth::user()->isImpersonated())
            @livewire('admin-tools')
        @endif

        @if (Route::currentRouteName() !== 'cart')
            @if (Cart::count() > 0)
                @livewire('cart-summary', ['show' => true])
            @endif
        @endif



        @include('footer')
    </div>

    @stack('modals')

    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
    {{-- <script src="{{ asset('js/activities.js') }}"></script> --}}

    <script defer>
        function runFcWidgetFunction() {
            return new Promise(resolve => {
                var intervalId = setInterval(() => {
                    if (typeof fcWidget !== 'undefined') {
                        clearInterval(intervalId);
                        resolve();
                    }
                }, 100);
            });
        }

        runFcWidgetFunction().then(() => {
            /// To set unique user id in your system when it is available
            window.fcWidget.setExternalId("{{ auth()->id() }}");

            // // To set user name
            window.fcWidget.user.setFirstName("{{ auth()->user()->first_name }}");
            window.fcWidget.user.setLastName("{{ auth()->user()->last_name }}");

            // // To set user email
            window.fcWidget.user.setEmail("{{ auth()->user()->email }}");
        });
    </script>
    @stack('scripts')
</body>

</html>
