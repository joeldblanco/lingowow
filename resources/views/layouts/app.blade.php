<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        
        // dd(Auth::user()->canBeImpersonated());
        // $session_info = json_decode(((new Illuminate\Http\Client\PendingRequest())->get('http://ipwho.is/' . $_SERVER['REMOTE_ADDR']))->getBody(), true);
        // session(['session_info' => $session_info]);
        // dump(session('session_info'));
        
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
        
        // session(['tz' => session('session_info')['timezone']['id']]);
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.tiny.cloud/1/xmua6246us3vdfealnkl1yf7ja0zafr4cttuehqtyz7nen6o/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/wordfind.js') }}"></script>
    <script src="{{ asset('js/wordfindgame.js') }}"></script>
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

        @livewire('first-navigation-menu')
        @include('second-navigation-menu')

        <!-- Page Content -->
        @livewireScripts

        <main class="pb-20 w-full">
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
</body>

</html>
