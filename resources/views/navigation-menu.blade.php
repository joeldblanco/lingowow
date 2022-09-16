@php

$nav_links = [
    [
        'name' => 'Home',
        'route' => route('home'),
        'status' => request()->routeIs('home'),
        'roles' => ['student', 'guest', 'teacher', 'admin'],
    ],
    [
        'name' => 'Courses',
        'route' => route('course.index'),
        'status' => request()->is('courses', 'courses/*'),
        'roles' => ['student', 'guest', 'teacher', 'admin'],
    ],
    // [
    //     'name' => 'Pages',
    //     'route' => route('pages'),
    //     'status' => request()->routeIs('pages'),
    //     'roles' => ['student','guest','teacher','admin'],
    // ],
    [
        'name' => 'Shop',
        'route' => route('shop'),
        'status' => request()->is('shop', 'shop/*'),
        'roles' => ['student', 'guest', 'admin'],
    ],
];

if (auth()->user()->roles[0]->name == 'admin') {
    $dashboard = [
        [
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'status' => request()->routeIs('admin.dashboard'),
            'roles' => ['admin'],
        ],
    ];
} else {
    $dashboard = [
        [
            'name' => 'Dashboard',
            'route' => route('dashboard'),
            'status' => request()->routeIs('dashboard'),
            'roles' => ['student', 'guest', 'teacher'],
        ],
    ];
}

// array_push($nav_links, $dashboard);
array_splice($nav_links, 1, 0, $dashboard);

//TO DELETE//
array_shift($nav_links);

@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($nav_links as $nav_link)
                        @if (in_array(Auth::user()->roles->pluck('name')[0], $nav_link['roles']))
                            <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']">
                                {{ $nav_link['name'] }}
                            </x-jet-nav-link>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                                </x- slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Messages Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="80">
                        <x-slot name="trigger">
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition p-2">
                                <i class="fas fa-envelope text-gray-500 text-lg w-full"></i>
                                @php
                                    $unread_messages = 0;
                                    $messages = App\Models\Message::where('user_id', auth()->id())->get();
                                    $conversations = auth()->user()->conversations;
                                    foreach ($conversations as $conversation) {
                                        if ($conversation->unread_messages > 0) {
                                            $unread_messages++;
                                        }
                                    }
                                @endphp

                                <p class="inline-flex absolute -top-1 -right-1 justify-center items-center w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900 @if ($unread_messages <= 0) hidden @endif"
                                    id="unread_messages">{{ $unread_messages }}</p>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Messages') }}
                            </div>

                            @if (count($conversations) > 0)

                                @foreach ($conversations as $conversation)
                                    <x-jet-dropdown-link href="{{ route('chat.show', $conversation->id) }}">
                                        <div class="flex justify-between items-center">
                                            <p class="text-md @if ($conversation->unreadMessages > 0) font-bold @else font-normal text-gray-500 @endif"
                                                id="conversation_{{ $conversation->id }}">
                                                @if ($conversation->group_conversation)
                                                    {{ $conversation->name }}
                                                @else
                                                    @php
                                                        $participants = $conversation->users;
                                                    @endphp
                                                    @foreach ($participants as $participant)
                                                        @if ($participant->id != auth()->id())
                                                            {{ $participant->first_name }}
                                                            {{ $participant->last_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </p>
                                            <span class="inline-flex w-3 h-3 bg-blue-500 rounded-full mr-3 @if ($conversation->unreadMessages <= 0) hidden @endif" id="unread_conversation_{{$conversation->id}}"></span>
                                        </div>
                                        <p class="text-xs text-gray-400 @if ($conversation->unreadMessages > 0) font-bold @else font-normal @endif"
                                            id="last_message">
                                            {{ Str::limit($conversation->last_message->message_content, 25, '...') }}
                                        </p>
                                    </x-jet-dropdown-link>
                                @endforeach
                            @else
                                <p class="p-1 text-sm text-center">There are no messages</p>
                            @endif

                            <x-jet-dropdown-link href="{{ route('chat.index') }}" class="border-t mt-2">
                                <p class="text-center">
                                    See All
                                </p>
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <!-- Notifications Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="80">
                        <x-slot name="trigger">
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition p-2">
                                <i class="fas fa-bell text-gray-500 text-lg w-full"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Notifications') }}
                            </div>

                            @php
                                $notifications = DB::table('notifications')
                                    ->where('notifiable_id', auth()->id())
                                    ->select('id', 'data', 'read_at', 'type', 'created_at')
                                    ->limit(7)
                                    ->get();
                                
                                foreach ($notifications as $key => $value) {
                                    $data_array = json_decode($value->data, 1);
                                
                                    $value->type = explode('\\', $value->type);
                                    $value->type = end($value->type);
                                
                                    if (count($data_array) > 0) {
                                        $user = App\Models\User::find($data_array['user_id']);
                                    } else {
                                        $user = App\Models\User::find(auth()->id());
                                    }
                                
                                    $notification_read_at[$key] = $value->read_at;
                                
                                    $notification_created_at[$key] = new Carbon\Carbon($value->created_at);
                                    $notification_created_at[$key] = $notification_created_at[$key]->diffForHumans();
                                
                                    $notification_id[$key] = $value->id;
                                
                                    switch ($value->type) {
                                        case 'BookedClass':
                                            $notification_icon = 'fas fa-bookmark';
                                            $notification_data[$key] = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has booked a class ' . $data_array['schedule_string'];
                                            break;
                                
                                        case 'ClassRescheduledToTeacher':
                                            $notification_icon = 'fas fa-calendar-alt';
                                            $notification_data[$key] = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has rescheduled a class. New schedule: ' . $data_array['schedule_string'];
                                            break;
                                
                                        case 'StudentUnrolment':
                                            $notification_icon = 'fas fa-calendar-alt';
                                            if (auth()->user()->roles[0]->name == 'student' || auth()->user()->roles[0]->name == 'guest') {
                                                $notification_data[$key] = 'You have been automatically unenroled from the course ' . $data_array['course_name'];
                                            }
                                            break;
                                
                                        case 'StudentUnrolmentToTeacher':
                                            $notification_icon = 'fas fa-calendar-alt';
                                            $notification_data[$key] = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has been automatically unenroled from course ' . $data_array['schedule_string'];
                                            break;
                                
                                        default:
                                            $notification_icon = 'fas fa-bell';
                                            $notification_data[$key] = 'You have a new notification.';
                                            break;
                                    }
                                }
                                
                            @endphp

                            @if (count($notifications) > 0)
                                @foreach ($notifications as $key => $value)
                                    <x-jet-dropdown-link
                                        href="{{ route('notifications.show', $notification_id[$key]) }}">
                                        <p class="@if ($notification_read_at[$key] == null) font-bold @endif">
                                            {{ Str::limit($notification_data[$key], 40, '...') }}
                                        </p>
                                    </x-jet-dropdown-link>
                                @endforeach
                            @else
                                <p class="p-1 text-sm text-center">There are no notifications</p>
                            @endif

                            <x-jet-dropdown-link href="{{ route('notifications.index') }}" class="border-t mt-2">
                                <p class="text-center">
                                    See All
                                </p>
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Storage::url(Auth::user()->profile_photo_path) }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show', auth()->id()) }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)
                <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['status']">
                    {{ $nav_link['name'] }}
                </x-jet-responsive-nav-link>
            @endforeach

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="{{ Storage::url(Auth::user()->profile_photo_path) }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show', auth()->id()) }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        window.user_id = {{ auth()->id() }};
    </script>
</nav>
