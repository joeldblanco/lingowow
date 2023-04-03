<div class="flex flex-col border space-y-5 border-gray-100 hover:border-blue-500 rounded-xl p-6 bg-gray-50 justify-between @if ($user->trashed()) opacity-50 filter saturate-0 @endif"
    style="width: 32%" x-data="{ showUserInfo: false, editUser: false, newMessage: false, deleteConfirmation: false }">
    <div class="flex justify-between">
        <div class="w-2/12">
            <a href="{{ route('profile.show', $user->id) }}">
                <img src="{{ Storage::url($user->profile_photo_path) }}" alt="profile_pic" class="rounded-full">
            </a>
        </div>
        <div class="w-full flex justify-end items-center">
            {{-- @if (!$user->trashed())
                <button wire:click="hide({{ $user->id }})"
                    class="rounded-full my-auto w-10 h-10 bg-white active:bg-gray-200 transition duration-100 ease-in-out flex justify-center items-center">
                    <i class="fas fa-eye m-1 mr-0 text-gray-500"></i>
                </button>
            @else
                <button wire:click="unhide({{ $user->id }})"
                    class="rounded-full w-10 h-10 bg-white active:bg-gray-200 transition duration-100 ease-in-out flex justify-center items-center">
                    <i class="fas fa-eye-slash m-1 mr-0 text-gray-500"></i>
                </button>
            @endif --}}
            <button class="rounded-full w-10 h-10 bg-white active:bg-gray-200 transition duration-100 ease-in-out"
                wire:click="show" @click="showUserInfo = true">
                <i class="fas fa-info-circle m-1 text-gray-500"></i>
            </button>
        </div>
    </div>
    <div class="flex flex-col space-y-8 mt-0">
        <a href="{{ route('profile.show', $user->id) }}">
            <p class="font-bold text-2xl">{{ $user->first_name }} {{ $user->last_name }}</p>
        </a>
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
        <button @click="newMessage = true"
            class="border border-blue-500 px-2 py-1 w-1/2 rounded-md text-center text-blue-500 font-bold hover:bg-blue-500 hover:text-white transition-all">
            Messages
        </button>
        <button
            class="border border-green-500 px-2 py-1 w-1/2 rounded-md text-center text-green-500 font-bold hover:bg-green-500 hover:text-white transition-all"
            @click="editUser = true" wire:click="editUser({{ $user->id }})">Edit</button>
    </div>

    <div class="bg-black bg-opacity-50 z-30 fixed top-0 left-0 w-full h-full flex items-center justify-center"
        x-show="deleteConfirmation" x-transition x-cloak>
        <div class="leading-loose">
            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                @click.outside="deleteConfirmation = false">
                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                    <h1 class="">Confirm</h1>
                    <i class="fas fa-times cursor-pointer text-xl" @click="deleteConfirmation = false"></i>
                </div>
                @if (isset($current_user) && $current_user != null)
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

    <x-modal type="info" name="editUser">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            @if (isset($current_user) && $current_user != null)
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
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-modal>

    <x-modal type="info" name="showUserInfo" class="w-10/12 mx-auto">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <p class="text-2xl text-gray-600 font-bold">{{ $user->first_name }}
                {{ $user->last_name }}</p>
            <div>
                <a href="{{ route('impersonate', $user->id) }}">Impersonate</a>
            </div>
            <div>
                @php
                    $course_id = $user->enrolments->first();
                    if ($course_id != null) {
                        $course_id = $course_id->course->id;
                    }
                @endphp
                
                {{-- @livewire('schedule', ['user_id' => $user->id, 'mode' => 'show', 'course_id' => $course_id]) --}}
                <livewire:new-schedule :limit=null :week=null :users="$user->id" :action="'adminShow'" :wire:key="$user->id" />
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

    <x-modal type="info" name="newMessage" class="w-1/2 mx-auto">
        <x-slot name="title"></x-slot>

        <x-slot name="content">
            <form method="POST" action="{{ route('chat.message') }}">
                @csrf
                <div class="flex space-x-3 w-full p-3 items-center">
                    <img src="{{ Storage::url($user->profile_photo_path) }}" alt="profile_pic"
                        class="w-1/6 rounded-full">
                    <p class="w-3/4 font-bold text-xl">{{ $user->first_name }}
                        {{ $user->last_name }}</p>
                    <input type="text" class="hidden" name="friend_id" value="{{ $user->id }}">
                </div>
                <div class="w-full">
                    <textarea class="w-full rounded-lg border-gray-300" name="message" cols="30" rows="10"
                        placeholder="Write a message"></textarea>
                    <div
                        class="flex px-3 h-10 cursor-pointer hover:bg-gray-200 border border-gray-300 hover:border-white hover:text-blue-500 rounded-lg">
                        <button type="submit" class="mx-auto flex space-x-3 items-center font-bold">
                            <p>Send</p>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer" class="justify-center"></x-slot>
    </x-modal>

    <div wire:loading>
        @include('components.loading-state')
    </div>

</div>
