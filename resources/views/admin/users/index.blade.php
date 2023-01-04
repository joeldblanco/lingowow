<x-app-layout>

    <div class="bg-white font-sans" x-data="{ createUser: false, editUser: false, deleteConfirmation: false }" x-cloak>
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">


                <div class="w-full flex justify-between my-2">
                    <div class="text-xl font-bold text-gray-800 my-5 ml-5 flex space-x-2 items-start">
                        <a href="{{ route('users', 1) }}"
                            class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 1) bg-gray-400 text-gray-100 @endif">Guests
                            @if ($role == 1)
                                ({{ $users->total() }})
                            @endif
                        </a>
                        <a href="{{ route('users', 2) }}"
                            class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 2) bg-gray-400 text-gray-100 @endif">Students
                            @if ($role == 2)
                                ({{ $users->total() }})
                            @endif
                        </a>
                        <a href="{{ route('users', 3) }}"
                            class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 3) bg-gray-400 text-gray-100 @endif">Teachers
                            @if ($role == 3)
                                ({{ $users->total() }})
                            @endif
                        </a>
                        <a href="{{ route('users', 4) }}"
                            class="px-3 py-2 border border-gray-300 rounded-md font-bold hover:bg-gray-200 hover:border-white hover:text-gray-800 @if ($role == 4) bg-gray-400 text-gray-100 @endif">Admins
                            @if ($role == 4)
                                ({{ $users->total() }})
                            @endif
                        </a>
                    </div>
                    <div class="flex flex-col justify-center">
                        <button class="border p-3 rounded-md hover:bg-gray-400 hover:text-white"
                            @click="createUser = true">Add User
                        </button>
                    </div>
                </div>

                {{ $users->links() }}
                <div class="flex flex-col space-y-8">
                    <div class="flex flex-row w-full gap-x-4 gap-y-4 flex-wrap justify-evenly items-stretch">
                        @foreach ($users as $user)
                            {{-- @if (!$user->trashed()) --}}
                                @livewire('user-component', ['user' => $user, 'role' => $role, 'key' => $user->id])
                            {{-- @endif --}}
                        @endforeach
                        {{-- @foreach ($users as $user)
                            @if ($user->trashed())
                                @livewire('user-component', ['user' => $user, 'role' => $role, 'key' => $user->id])
                            @endif
                        @endforeach --}}
                    </div>
                </div>
                {{ $users->links() }}

                <x-modal type="info" name="createUser">
                    <x-slot name="title">
                        Create User
                    </x-slot>

                    <x-slot name="content">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_username"
                            type="text" required placeholder="Username" aria-label="Username" wire:model="username">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password"
                            type="password" required placeholder="Password" aria-label="Password" wire:model="password">
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_password_confirm"
                            type="password" required placeholder="Password Confirmation" aria-label="Password"
                            wire:model="password_confirm">
                        <div class="flex mt-2 w-full space-x-1">
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_name"
                                type="text" required placeholder="Name" aria-label="Name" wire:model="first_name">
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_lastname"
                                type="text" required placeholder="Last Name" aria-label="Lastname"
                                wire:model="last_name">
                        </div>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="user_email"
                            type="email" required placeholder="Email" aria-label="Email" wire:model="email">
                        <select class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="roles" required
                            wire:model="user_role">
                            <option value="1">Guest</option>
                            <option value="2">Student</option>
                            <option value="3">Teacher</option>
                            <option value="4">Admin</option>
                        </select>
                    </x-slot>

                    <x-slot name="footer" class="justify-center">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                            wire:click="saveUser">Create</button>
                    </x-slot>
                </x-modal>

            </div>
        </div>
    </div>

</x-app-layout>
