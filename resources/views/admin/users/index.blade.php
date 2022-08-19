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
                            @livewire('user-component', ['user' => $user, 'role' => $role, 'key' => $user->id])
                        @endforeach
                    </div>
                </div>
                {{ $users->links() }}
                
            </div>
        </div>
    </div>

</x-app-layout>
