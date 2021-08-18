@php
    $nav_links = [
        // [
        //     'name' => 'Home',
        //     'route' => route('home'),
        //     'status' => request()->routeIs('home'),
        //     'parent_link' => request()->routeIs('shop')
        // ],
        // [
        //     'name' => 'Dashboard',
        //     'route' => route('dashboard'),
        //     'status' => request()->routeIs('dashboard'),
        //     'parent_link' => request()->routeIs('shop')
        // ],
        // [
        //     'name' => 'Courses',
        //     'route' => route('courses'),
        //     'status' => request()->routeIs('courses'),
        //     'parent_link' => request()->routeIs('shop')
        // ],
        // [
        //     'name' => 'Pages',
        //     'route' => route('pages'),
        //     'status' => request()->routeIs('pages'),
        //     'parent_link' => request()->routeIs('shop')
        // ],
        [
            'name' => 'Cart',
            'route' => route('cart'),
            'status' => request()->routeIs('cart'),
            'parent_link' => request()->is('shop','shop/*')
        ],
        [
            'name' => 'Invoices',
            'route' => route('invoices'),
            'status' => request()->routeIs('invoices'),
            'parent_link' => request()->is('shop','shop/*')
        ],
    ]
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div> --}}

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($nav_links as $nav_link)
                        @if($nav_link['parent_link'] || $nav_link['status'])
                            <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']">
                                {{ $nav_link['name'] }}
                            </x-jet-nav-link>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)
                @if($nav_link['parent_link'])
                    <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']">
                        {{ $nav_link['name'] }}
                @endif
            </x-jet-responsive-nav-link>
            @endforeach
        </div>
    </div>
</nav>
