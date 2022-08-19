<div class="flex flex-col border space-y-5 border-gray-100 hover:border-blue-500 rounded-xl p-6 bg-gray-50 justify-between"
    style="width: 32%"
    x-data="{ showUserInfo: false }">
    <div class="flex justify-between">
        <div class="w-2/12">
            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="profile_pic" class="rounded-full">
        </div>
        <button class="rounded-full w-10 h-10 bg-white active:bg-gray-200 transition duration-100 ease-in-out"
            wire:click="show" @click="showUserInfo = true">
            <i class="fas fa-info-circle m-1 text-gray-500"></i>
        </button>
    </div>
    <div class="flex flex-col space-y-8 mt-0">
        <p class="font-bold text-2xl">{{ $user->first_name }} {{ $user->last_name }}</p>
        <div class="flex flex-row w-full flex-wrap gap-y-4 gap-x-8">
            <div class="text-gray-700 text-sm">
                <p class="text-gray-500">Email</p>
                <p class="text-black font-semibold">{{ $user->email }}</p>
            </div>
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
            @click="editUser = true" wire:click="edit">Edit</button>
    </div>


    <x-modal type="info" name="showUserInfo">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <p class="text-2xl text-gray-600 font-bold">{{ $user->first_name }}
                {{ $user->last_name }}</p>
            <div>
                <a href="{{ route('impersonate', $user->id) }}">Impersonate</a>
            </div>
            <div>
                @livewire('schedule', ['user_id' => $user->id, 'mode' => 'show'])
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
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-modal>

</div>
