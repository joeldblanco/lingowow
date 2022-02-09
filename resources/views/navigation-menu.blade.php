@php
    $nav_links = [
        [
            'name' => 'Home',
            'route' => route('home'),
            'status' => request()->routeIs('home'),
            'roles' => ['student','guest','teacher','admin'],
        ],
        [
            'name' => 'Dashboard',
            'route' => route('dashboard'),
            'status' => request()->routeIs('dashboard'),
            'roles' => ['student','guest','teacher','admin'],
        ],
        [
            'name' => 'Courses',
            'route' => route('courses.index'),
            'status' => request()->is('courses','courses/*'),
            'roles' => ['student','guest','teacher','admin'],
        ],
        [
            'name' => 'Pages',
            'route' => route('pages'),
            'status' => request()->routeIs('pages'),
            'roles' => ['student','guest','teacher','admin'],
        ],
        [
            'name' => 'Shop',
            'route' => route('shop'),
            'status' => request()->is('shop','shop/*'),
            'roles' => ['student','guest','admin'],
        ],
        [
            'name' => 'Admin Dashboard',
            'route' => route('admin.dashboard'),
            'status' => request()->routeIs('admin.dashboard'),
            'roles' => ['admin'],
        ],
    ]
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

                        @if (in_array(Auth::user()->roles->pluck('name')[0],$nav_link['roles']))
                            
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
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-    slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
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
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition p-2">
                                <i class="fas fa-envelope text-gray-500 text-lg w-full"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Messages') }}
                            </div>

                                @php
                                    $messages = DB::table('messages')
                                                        ->where('sender_id',auth()->id())
                                                        ->orWhere('receiver_id',auth()->id())
                                                        ->get();

                                    $conversations = [];
                                    $participants = [];

                                    foreach ($messages as $key => $value) {

                                        if(count($conversations) > 7){
                                            break;
                                        }

                                        $conversations[$key] = $value->conversation_id;

                                        if($value->sender_id == auth()->id()){
                                            array_push($participants,$value->receiver_id);
                                            // Str::limit($notification_data[$key], 45, '...');
                                        }else{
                                            array_push($participants,$value->sender_id);
                                        }
                                    }

                                    $conversations = array_values(array_unique($conversations));
                                    $participants = array_values(array_unique($participants));

                                    // foreach ($conversations as $key => $value) {
                                        $last_messages["created_at"] = 0;
                                    // }

                                    foreach ($conversations as $key => $conversation_id) {
                                        foreach ($messages as $message) {
                                            if(($message->conversation_id == $conversation_id) AND ($message->created_at > $last_messages['created_at'])){
                                                $last_messages[$key] = $message;
                                                $last_messages_conversation_id[$key] = $message->conversation_id;
                                            }
                                        }
                                    }

                                    unset($last_messages["created_at"]);

                                    foreach ($participants as $key => $value) {
                                        $participants[$key] = DB::table('users')
                                            ->where('id',$value)
                                            ->select('first_name','last_name')
                                            ->get();

                                        $participants[$key] = $participants[$key][0];
                                    }

                                @endphp

                                @if (count($messages) > 0)

                                    {{-- {{dd($messages)}} --}}
                                    
                                    @for ($i=0; $i<count($participants); $i++)

                                        <x-jet-dropdown-link href="{{ route('chat.show',$last_messages_conversation_id[$i]) }}">
                                            {{-- <p class="@if($notification_read_at[$key] == null) font-bold @endif"> --}}
                                            <p class="font-bold">
                                                {{$participants[$i]->first_name}} {{$participants[$i]->last_name}}
                                            </p>
                                            <p class="text-xs text-gray-400">{{Str::limit($last_messages[$i]->message_content, 25, '...')}}</p>
                                        </x-jet-dropdown-link>

                                    @endfor

                                    <x-jet-dropdown-link href="{{ route('chat.index') }}" class="border-t mt-2">
                                        <p class="text-center">
                                            See All
                                        </p>
                                    </x-jet-dropdown-link>

                                @else
                                    <p class="p-1 text-sm text-center">There are no messages</p>
                                @endif

                            <div class="border-t border-gray-100"></div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <!-- Notifications Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="80">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition p-2">
                                <i class="fas fa-bell text-gray-500 text-lg w-full"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Notifications') }}
                            </div>

                            @php
                                $notifications = DB::table('notifications')->where('notifiable_id',auth()->id())->select('id','data','read_at','created_at')->limit(7)->get();

                                foreach ($notifications as $key => $value) {

                                    $temp_array = json_decode($value->data);
                                    if(count($temp_array) > 0){
                                        $user = App\Models\User::find($temp_array[0]);
                                        // $schedule_string = $temp_array[1];
                                    }else{
                                        $user = App\Models\User::find(auth()->id());
                                    }
                                    $notification_data[$key] = "New class booked by ".$user->first_name." ".$user->last_name;

                                    $notification_read_at[$key] = $value->read_at;

                                    $notification_created_at[$key] = new Carbon\Carbon($value->created_at);
                                    $notification_created_at[$key] = $notification_created_at[$key]->diffForHumans();

                                    $notification_id[$key] = $value->id;
                                }

                            @endphp

                            @if (count($notifications) > 0)
                                @foreach ($notifications as $key => $value)

                                    <x-jet-dropdown-link href="{{ route('notifications.show', $notification_id[$key]) }}">
                                        <p class="@if($notification_read_at[$key] == null) font-bold @endif">
                                            {{Str::limit($notification_data[$key], 40, '...')}}
                                        </p>
                                    </x-jet-dropdown-link>

                                @endforeach

                                <x-jet-dropdown-link href="{{ route('notifications.index') }}" class="border-t mt-2">
                                    <p class="text-center">
                                        See All
                                    </p>
                                </x-jet-dropdown-link>

                            @else
                                <p class="p-1 text-sm text-center">There are no notifications</p>
                            @endif
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
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
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
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
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
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
</nav>
