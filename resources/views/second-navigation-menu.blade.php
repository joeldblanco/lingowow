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
            'parent_link' => request()->is('shop', 'shop/*'),
        ],
        [
            'name' => 'Invoices',
            'route' => route('invoices'),
            'status' => request()->routeIs('invoices'),
            'parent_link' => request()->is('shop', 'shop/*'),
        ],
        [
            'name' => 'Users',
            'route' => route('users', 4),
            'status' => request()->routeIs('users'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Enrolments',
            'route' => route('enrolments.index'),
            'status' => request()->routeIs('enrolments.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Courses',
            'route' => route('admin.courses.index'),
            'status' => request()->routeIs('admin.courses.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Grades',
            'route' => route('gradings.index'),
            'status' => request()->routeIs('gradings.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Classes',
            'route' => route('admin.classes.index'),
            'status' => request()->routeIs('admin.classes.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Invoices',
            'route' => route('admin.invoices'),
            'status' => request()->routeIs('admin.invoices'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Products',
            'route' => route('products.index'),
            'status' => request()->routeIs('products.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Plans',
            'route' => route('plans.index'),
            'status' => request()->routeIs('plans.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Categories',
            'route' => route('categories.index'),
            'status' => request()->routeIs('categories.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Features',
            'route' => route('features.index'),
            'status' => request()->routeIs('features.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Exams',
            'route' => route('exam.index'),
            'status' => request()->is('admin/exam', 'admin/exam/*'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Activities',
            'route' => route('activities.index'),
            'status' => request()->is('activities', 'activities/*'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Marketing',
            'route' => route('coupons.index'),
            'status' => request()->routeIs('coupons.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Globals',
            'route' => route('globals.index'),
            'status' => request()->routeIs('globals.index'),
            'parent_link' => request()->is('admin', 'admin/*'),
        ],
        [
            'name' => 'Recordings',
            'route' => route('recordings.index'),
            'status' => request()->routeIs('recordings', 'recordings/*'),
            'parent_link' => request()->is('classes'),
        ],
    ];
    
    $second_nav = false;
    
    foreach ($nav_links as $nav_link) {
        if ($nav_link['parent_link'] || $nav_link['status']) {
            $second_nav = true;
        }
    }
    
@endphp

@if ($second_nav)

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
                            @if ($nav_link['parent_link'] || $nav_link['status'])
                                @if ($nav_link['name'] == 'Recordings')
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']"
                                        class="class-recordings">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @else
                                    <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']">
                                        {{ $nav_link['name'] }}
                                    </x-jet-nav-link>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @foreach ($nav_links as $nav_link)
                    @if ($nav_link['parent_link'])
                        <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']">
                            {{ $nav_link['name'] }}
                    @endif
                    </x-jet-responsive-nav-link>
                @endforeach
            </div>
        </div>
    </nav>

@endif
