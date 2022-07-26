<div class="antialiased bg-white w-full rounded-xl p-4" x-data="{ showUserInfo: @entangle('showUserInfo'), createUser: false, editUser: false, deleteConfirmation: false }">
    <div class="w-full flex justify-between my-2">
        <div class="text-xl font-bold text-gray-800 my-5 ml-5 flex space-x-2 items-start">
            <button
                class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 1) bg-gray-400 text-gray-100 @endif"
                wire:click="selectRole(1)">Guests @if ($role == 1)
                    ({{ count($models) }})
                @endif </button>
            <button
                class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 2) bg-gray-400 text-gray-100 @endif"
                wire:click="selectRole(2)">Students @if ($role == 2)
                    ({{ count($models) }})
                @endif </button>
            <button
                class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 3) bg-gray-400 text-gray-100 @endif"
                wire:click="selectRole(3)">Teachers @if ($role == 3)
                    ({{ count($models) }})
                @endif </button>
            <button
                class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 4) bg-gray-400 text-gray-100 @endif"
                wire:click="selectRole(4)">Admins @if ($role == 4)
                    ({{ count($models) }})
                @endif </button>
        </div>
        <div class="flex flex-col justify-center">
            <button class="border p-3 rounded-md hover:bg-gray-400 hover:text-white" @click="createUser = true">Add
                User</button>
        </div>
    </div>
    <div class="flex flex-col space-y-8">
        <div class="flex flex-row w-full gap-x-4 gap-y-4 flex-wrap justify-evenly items-stretch">
            @foreach ($models as $user)
                <div class="flex flex-col border space-y-5 border-gray-100 hover:border-blue-500 rounded-xl p-6 bg-gray-50 justify-between"
                    style="width: 32%">
                    <div class="flex justify-between">
                        <div class="w-2/12">
                            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="profile_pic"
                                class="rounded-full">
                        </div>
                        <button
                            class="rounded-full w-10 h-10 bg-white active:bg-gray-200 transition duration-100 ease-in-out"
                            wire:click="showInfo({{ $user->id }})" {{-- @click="showUserInfo = true" --}}>
                            <i class="fas fa-info-circle m-1 text-gray-500"></i>
                        </button>
                    </div>
                    <div class="flex flex-col space-y-8 mt-0">
                        <p class="font-bold text-2xl">{{ $user->first_name }} {{ $user->last_name }}</p>
                        {{-- <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laborum accusantium similique cupiditate doloribus. Fuga, sint. Voluptas quos rerum maiores!
                            Animi cumque hic nesciunt at ut eum amet sequi laboriosam eius!</p> --}}
                        <div class="flex flex-row w-full flex-wrap gap-y-4 gap-x-8">
                            <div class="text-gray-700 text-sm">
                                <p class="text-gray-500">Email</p>
                                <p class="text-black font-semibold">{{ $user->email }}</p>
                            </div>
                            {{-- <div class="text-gray-700 text-sm">
                                <p class="text-gray-500">Phone</p>
                                <p class="text-black font-semibold">+51 916 829 487</p>
                            </div> --}}
                            <div class="text-gray-700 text-sm">
                                <p class="text-gray-500">Username</p>
                                <p class="text-black font-semibold">{{ $user->username }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between space-x-4">
                        <a href="#"
                            class="border border-blue-500 px-2 py-1 w-1/2 rounded-md text-center text-blue-500 font-bold hover:bg-blue-500 hover:text-white transition-all">Messages</a>
                        <button
                            class="border border-green-500 px-2 py-1 w-1/2 rounded-md text-center text-green-500 font-bold hover:bg-green-500 hover:text-white transition-all"
                            @click="editUser = true" wire:click="editUser({{ $user->id }})">Edit</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if ($selected_teacher)
        {{-- Show User Info Modal --}}
        <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
            x-show="showUserInfo" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
            <div class="relative w-10/12 mx-2 sm:mx-auto mt-10 mb-24 opacity-100">
                <div class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                    @click.outside="showUserInfo = false" x-show="showUserInfo"
                    x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0"
                    x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300"
                    x-transition:leave-start="scale-100" x-transition:leave-end="scale-0">
                    <main class="p-3 text-center py-20">
                        <div>

                        </div>
                        <p class="text-2xl text-gray-600 font-bold">{{ $selected_teacher->first_name }}
                            {{ $selected_teacher->last_name }}</p>
                        <div class="w-10/12 mx-auto">
                            <div>
                                <a href="{{ route('impersonate', $selected_teacher->id) }}">Impersonate</a>
                            </div>
                            <div>
                                <div class="container mx-auto mt-10">
                                    <div class="wrapper bg-white rounded w-full">
                                        @if (!isset($user_schedule) || $user_schedule == null)
                                            <div class="w-full text-center">
                                                <h2 class="text-4xl font-bold text-red-800 my-20">This user hasn't
                                                    selected a schedule yet.</h2>
                                            </div>
                                        @else
                                            <div class="w-full flex flex-row shadow my-10">
                                                <div class="flex flex-col">
                                                    <div class="cell border font-bold">
                                                        LIMA TIME
                                                    </div>
                                                    @for ($i = 0; $i < 16; $i++)
                                                        <div class="cell border">
                                                            {{ $i + 6 }}:00
                                                        </div>
                                                    @endfor
                                                </div>
                                                <div class="w-full">
                                                    @foreach ($days as $day)
                                                        <div class="cell border font-bold" style="width: 14.28%">
                                                            {{ $day }}
                                                        </div>
                                                    @endforeach
                                                    <div class="w-full flex flex-row h-full">
                                                        <div class="selectable w-full" id="selectable">
                                                            @for ($i = 0; $i < 16; $i++)
                                                                @for ($e = 0; $e < 7; $e++)
                                                                    @if (in_array([$i + 6, $e], $user_schedule))
                                                                        @if (in_array([$i + 6, $e], $students_schedules))
                                                                            @foreach ($students as $student)
                                                                                @if (in_array([$i + 6, $e], $student[1]))
                                                                                    <div onclick="location.href='{{ route('profile.show', $student->id) }}'"
                                                                                        class="w-32 h-10 border cell schedule_cell ui-selected flex flex-col justify-center cursor-pointer"
                                                                                        style="width: 14.28%"
                                                                                        id="{{ $i + 6 }}-{{ $e }}">
                                                                                        <p
                                                                                            class="text-sm text-black font-bold">
                                                                                            {{ $student->first_name }}
                                                                                            {{ $student->last_name }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        @else
                                                                            <div class="w-32 h-10 border cell schedule_cell ui-selected"
                                                                                style="width: 14.28%"
                                                                                id="{{ $i + 6 }}-{{ $e }}">
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="w-32 h-10 border cell schedule_cell"
                                                                            style="width: 14.28%"
                                                                            id="{{ $i + 6 }}-{{ $e }}">
                                                                        </div>
                                                                    @endif
                                                                @endfor
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- @include('modal') --}}
                                </div>
                            </div>
                            @if (count($students) > 0)
                                <table class="flex flex-col w-1/2 space-y-5 border border-gray-200 p-5">
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
                                            {{-- {{$student}} --}}
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
                        </div>
                    </main>
                </div>
            </div>
        </div>
        {{-- End Show User Info Modal --}}
    @endif
    <div wire:loading>
        @include('components.loading-state')
    </div>

    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center"
        x-show="createUser" x-transition x-cloak>
        {{-- <div class="container mx-auto py-6 px-4"> --}}
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1" @click.outside="createUser = false">
                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                    <h1 class="">Create User</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="createUser = false"></i>
                </div>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_username" type="text"
                    required placeholder="Username" aria-label="Username" wire:model="username">
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password" type="password"
                    required placeholder="Password" aria-label="Password" wire:model="password">
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password_confirm"
                    type="password" required placeholder="Password Confirmation" aria-label="Password"
                    wire:model="password_confirm">
                <div class="flex mt-2 w-full space-x-1">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_name" type="text"
                        required placeholder="Name" aria-label="Name" wire:model="first_name">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_lastname" type="text"
                        required placeholder="Last Name" aria-label="Lastname" wire:model="last_name">
                </div>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_email" type="email"
                    required placeholder="Email" aria-label="Email" wire:model="email">
                <select class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="roles" required
                    wire:model="user_role">
                    <option value="1">Guest</option>
                    <option value="2">Student</option>
                    <option value="3">Teacher</option>
                    <option value="4">Admin</option>
                </select>
                <div class="flex pt-4 justify-end">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                        @click="createUser = false" wire:click="createUser">Create</button>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>

    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center"
        x-show="editUser" x-transition x-cloak>
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1">
                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                    <h1 class="">Edit User</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="editUser = false"></i>
                </div>
                @if ($current_user != null)
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_username" type="text"
                        required placeholder="Username" aria-label="Username" wire:model="username">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password"
                        type="password" required placeholder="Password" aria-label="Password" wire:model="password">
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password_confirm"
                        type="password" required placeholder="Password Confirmation" aria-label="Password"
                        wire:model="password_confirm">
                    <div class="flex mt-2 w-full space-x-1">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_name" type="text"
                            required placeholder="Name" aria-label="Name" wire:model="first_name">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_lastname"
                            type="text" required placeholder="Last Name" aria-label="Lastname" wire:model="last_name">
                    </div>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_email" type="email"
                        required placeholder="Email" aria-label="Email" wire:model="email">
                    <select class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="roles" required
                        wire:model="user_role">
                        <option value="1">Guest</option>
                        <option value="2">Student</option>
                        <option value="3">Teacher</option>
                        <option value="4">Admin</option>
                    </select>
                @endif
                <div class="flex pt-4 justify-between w-full">
                    <button
                        class="px-4 py-1 text-white font-light tracking-wider bg-red-700 rounded border hover:border-red-700 hover:bg-white hover:text-red-700 transition-all"
                        @click="deleteConfirmation = true">Delete</button>
                    <button
                        class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded border hover:border-gray-900 hover:bg-white hover:text-gray-900 transition-all"
                        @click="editUser = false" wire:click="updateUser">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center"
        x-show="deleteConfirmation" x-transition x-cloak>
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                @click.outside="deleteConfirmation = false">
                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                    <h1 class="">Confirm</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="deleteConfirmation = false"></i>
                </div>
                @if ($current_user != null)
                    <p>Are you sure you want to delete this user?</p>
                @endif
                <div class="flex pt-4 justify-between w-full">
                    <button
                        class="px-4 py-1 text-white font-light tracking-wider bg-red-700 rounded border hover:border-red-700 hover:bg-white hover:text-red-700 transition-all"
                        @click="deleteConfirmation = false, editUser = false" wire:click="deleteUser">Yes</button>
                    <button
                        class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded border hover:border-gray-900 hover:bg-white hover:text-gray-900 transition-all"
                        @click="deleteConfirmation = false, editUser = true">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>
