<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        
        // dd(Auth::user()->canBeImpersonated());
        $session_info = json_decode((new Illuminate\Http\Client\PendingRequest())->get('http://ipwho.is/' . $_SERVER['REMOTE_ADDR'])->getBody(), true);
        if ($session_info['success'] == false) {
            session()->forget('session_info');
        } else {
            session(['session_info' => $session_info]);
            session(['tz' => session('session_info')['timezone']['id']]);
        }
        // dd(session('session_info'));
        
        // if (isset($_GET['tz']) && session('tz') == null) {
        //     // This is just an example. In application this will come from Javascript (via an AJAX or something)
        //     $timezone_offset_minutes = $_GET['tz']; // $_GET['timezone_offset_minutes']
        
        //     // Convert minutes to seconds
        //     $timezone_name = timezone_name_from_abbr('', $timezone_offset_minutes * 60, false);
        //     session(['tz' => $timezone_name]);
        // }
        
        // function tz()
        // {
        //     if (session('tz') == null) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        
        //     // return !isset($_GET['tz']);
        // }
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js@8.3.1/dist/js/shepherd.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js@8.3.1/dist/js/shepherd.min.js" defer></script>
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
    <script src="https://cdn.tiny.cloud/1/xmua6246us3vdfealnkl1yf7ja0zafr4cttuehqtyz7nen6o/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/wordfind.js') }}"></script>
    <script src="{{ asset('js/wordfindgame.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js"></script>
    <script src='//fw-cdn.com/2451489/3025849.js' chat='true'></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-white flex flex-col">

        @if (Auth::user()->isImpersonated())
            <div class="bg-lw-blue text-center py-3">
                <p class="text-white font-semibold">Impersonating</p>
                <a href="{{ route('stopImpersonation') }}" class="text-sm hover:font-bold">Stop Impersonation</a>
            </div>
        @endif

        @if (auth()->user()->roles->first()->name == 'guest' &&
                (Route::currentRouteName() == 'courses.show' ||
                    Route::currentRouteName() == 'modules.show' ||
                    Route::currentRouteName() == 'units.show'))
            {{-- <div class="bg-lw-blue text-center py-3">
                <p class="text-black font-semibold">You are previewing a course. If you want to buy it click in the link
                    below.</p>
                <a href="{{ route('shop') }}" class="text-sm hover:font-bold text-white hover:underline">Shop</a>
            </div> --}}
            <div class="bg-yellow-300 text-center py-3">
                <p class="text-red-500 font-semibold">You are previewing a course. If you want to buy it click in the
                    link
                    below.</p>
                <a href="{{ route('shop') }}" class="text-md font-bold hover:underline">Shop</a>
            </div>
        @endif

        @livewire('first-navigation-menu')
        @include('second-navigation-menu')

        <!-- Page Content -->
        @livewireScripts

        <main class="pb-10 w-full min-h-screen">
            {{ $slot }}
        </main>
        @include('footer')
    </div>

    @stack('modals')
    {{-- <script>
        let _tz = JSON.parse("{{ json_encode(tz()) }}");
        if (_tz) {
            var tz = new Date().getTimezoneOffset();
            tz = tz == 0 ? 0 : -tz;
            window.location.href = window.location.href + "?tz=" + tz;
        }
    </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script> --}}
    @role('student')
        {{-- <script src='//fw-cdn.com/2207350/2881175.js' chat='true'></script>
        <script>
            var new_contact = {
                "First name": "{{auth()->user()->first_name}}", //Replace with first name of the user
                "Last name": "{{auth()->user()->last_name}}", //Replace with last name of the user
                "Email": "{{auth()->user()->email}}", //Replace with email of the user
                "ID": "{{auth()->user()->id}}", //Replace with a custom field
            };
            var identifier = "{{auth()->user()->id}}";
            fwcrm.identify(identifier, new_contact)
        </script> --}}
    @endrole
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
    <script src="{{ asset('js/activities.js') }}"></script>
    {{-- @include('components.loading-state') --}}

    {{-- <script>
        (function(d, t) {
            var BASE_URL = "https://app.chatwoot.com";
            var g = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
            g.src = BASE_URL + "/packs/js/sdk.js";
            g.defer = true;
            g.async = true;
            s.parentNode.insertBefore(g, s);
            g.onload = function() {
                window.chatwootSDK.run({
                    websiteToken: 'AT7bF4Zbt6nhFfpxDXUfoiBZ',
                    baseUrl: BASE_URL
                })
            }
        })(document, "script");

        window.chatwootSettings = {
            hideMessageBubble: false,
            position: "right", // This can be left or right
            locale: "en", // Language to be set
            useBrowserLanguage: true, // Set widget language from user's browser
            type: "expanded_bubble", // [standard, expanded_bubble]
            darkMode: "auto", // [light, auto]
        };

        window.addEventListener("chatwoot:ready", function() {

            window.$chatwoot.setUser("{{ auth()->id() }}", {
                email: "{{ auth()->user()->email }}",
                name: "{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}",
                // avatar_url: "<avatar-url-of-the-user>",
                // phone_number: "<phone-number-of-the-user>",
            });
        });
    </script> --}}

    <script defer>
        // window.fcWidget.user.create({
        //     externalId: '{{ auth()->id() }}',
        //     firstName: '{{ auth()->user()->first_name }}',
        //     lastName: '{{ auth()->user()->last_name }}',
        //     email: '{{ auth()->user()->email }}',
        // }, function(data) {
        //     console.log('User created', data)
        // })







        // function initFreshChat() {
        //     window.fcWidget.init({
        //         token: "d01c8512-38eb-4066-8446-862f13f26e8f",
        //         host: "https://lingowow-org.freshchat.com/",
        //         externalId: '{{ auth()->id() }}', // user’s id unique to your system
        //         firstName: '{{ auth()->user()->first_name }}', // user’s first name
        //         lastName: '{{ auth()->user()->last_name }}',
        //         email: '{{ auth()->user()->email }}', // user’s email
        //     });
        // }

        // function initialize(i, t) {
        //     var e;
        //     i.getElementById(t) ? initFreshChat() : ((e = i.createElement("script")).id = t, e.async = !0, e.src =
        //         "https://lingowow-org.freshchat.com/js/widget.js", e.onload = initFreshChat, i.head.appendChild(e))
        // }

        // function initiateCall() {
        //     initialize(document, "freshchat-js-sdk")
        // }

        // window.addEventListener ? window.addEventListener("load", initiateCall, !1) : window.attachEvent("onload",
        //     initiateCall);






        /// To set unique user id in your system when it is available
        // window.fcWidget.setExternalId = "john.doe1987";

        // // To set user name
        // window.fcWidget.user.setFirstName("John");

        // // To set user email
        // window.fcWidget.user.setEmail("john.doe@gmail.com");
    </script>

</body>

</html>
