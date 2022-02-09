<x-app-layout>

    <div class="flex flex-col bg-white">
        <div class="flex space-x-4 p-4 bg-gray-100 mx-3 rounded-xl">
            {{-- <div class="rounded-xl bg-white w-full flex flex-col">
                <div class="flex justify-between p-6">
                    <p class="text-xl font-bold">List</p>
                    <input type="text" id="friends-search" class="pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search...">
                </div>
                <div>
                    <table class="w-full">
                        <thead>
                            <tr class="flex w-full py-4 justify-around border-t border-b">
                                <th>#</th>
                                <th>User Profile</th>
                                <th>Country</th>
                                <th>Friends</th>
                                <th>Followers</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="flex w-full py-4 justify-around">
                                <td class="justify-start">{{$user->id}}</td>
                                <td class="justify-start">
                                    <div class="flex space-x-3 items-center">
                                        <div class="w-12">
                                            <img class="rounded-full" src="{{Storage::url($user->profile_photo_path)}}" alt="profile_pic">
                                        </div>
                                        <div class="flex flex-col">
                                            <p>{{$user->first_name}} {{$user->last_name}}</p>
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="justify-start">Country</td>
                                <td class="justify-start">0</td>
                                <td class="justify-start">0</td>
                                <td class="justify-start">
                                    <div class="bg-green-200 text-green-600 rounded-3xl p-1 px-2">
                                        <p>Active</p>
                                    </div>
                                </td>
                                <td class="justify-start">
                                    <div>
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-ban"></i>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between p-6">
                    <div>Pages</div>
                    <div>Items per page</div>
                </div>
            </div> --}}

            {{-- <livewire:users-table-component /> --}}
            <livewire:users-table />
        </div>
    </div>

</x-app-layout>