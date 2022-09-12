<div>
    @php
        $randomizer = [];
        for ($i = 0; $i < 25; $i++) {
            array_push($randomizer, $i);
        }
    @endphp

    <div class="p-12 bg-gray-200 font-sans text-gray-600" x-data="{ profile: true, followers: false, friends: false, gallery: false, friend_requests: false, editProfile: false }" x-cloak>
        <div class="max-w-7xl border rounded-xl bg-white flex flex-col pt-3 px-3 mb-6">
            <div class="border rounded-xl bg-blue-600 h-56"
                style="background-image: url('https://berrydashboard.io/static/media/img-profile-bg.2b15e931.png'); background-size: cover;">
                {{-- <img src="https://berrydashboard.io/static/media/img-profile-bg.2b15e931.png" alt="cover_image" /> --}}
            </div>
            <div class="flex flex-row">
                <div class="w-1/4 relative">
                    <div class="w-32 h-32 z-10 absolute -top-14 right-5 rounded-full border-4 border-gray-400 bg-white cursor-pointer" @click="editProfile = true">
                        {{-- style="background-image: url('{{ Storage::url($user->profile_photo_path) }}')"> --}}
                        <img src="{{ Storage::url($user->profile_photo_path) }}" class="w-full h-full rounded-full object-cover" alt="">
                    </div>
                </div>
                <div class="w-3/4 flex flex-col pl-5 pt-5">
                    <div class="flex flex-row">
                        <div class="w-1/4 font-semibold">{{ $user->first_name }} {{ $user->last_name }}</div>
                        <div class="w-3/4 flex justify-end">

                            <div class="flex space-x-4">
                                @hasanyrole('teacher|admin')
                                    <button onclick="window.location.href='{{ route('attempt.index', $user->id) }}';"
                                        class="border border-gray-500 rounded h-9 w-24 text-gray-500 hover:text-gray-700 hover:border-gray-700 hover:bg-gray-50">Attempts</button>
                                    {{-- <button onclick="openClassroomPopupWindow(); return false;"
                                        class="border border-green-500 rounded h-9 w-24 text-green-500 hover:text-green-700 hover:border-green-700 hover:bg-green-50">Classroom</button> --}}
                                    <a href="{{ $user->personalMeeting($user->id) }}"
                                        class="border border-green-500 rounded h-9 w-24 text-green-500 hover:text-green-700 hover:border-green-700 hover:bg-green-50 flex justify-center items-center">Classroom</a>
                                @endhasanyrole
                                @if ($user->id != auth()->id())
                                    @if ($request_sent != null)
                                        @if ($request_sent->status == 0 || $request_sent->status == 2)
                                            {{-- <button
                                                class="border border-blue-500 rounded h-9 w-24 text-blue-500 hover:text-blue-700 hover:border-blue-700 hover:bg-blue-50">Message</button> --}}
                                            <button wire:click="cancelRequest({{ $user->id }})"
                                                class="px-3 rounded h-9 w-30 font-semibold text-white bg-red-700 hover:border-red-700 hover:bg-red-800 shadow-md">Cancel
                                                Request</button>
                                        @else
                                            <button
                                                class="border border-blue-500 rounded h-9 w-24 text-blue-500 hover:text-blue-700 hover:border-blue-700 hover:bg-blue-50">Message</button>
                                        @endif
                                    @else
                                        {{-- <button
                                            class="border border-blue-500 rounded h-9 w-24 text-blue-500 hover:text-blue-700 hover:border-blue-700 hover:bg-red-50">Message</button> --}}
                                        <button wire:click="sendRequest({{ $user->id }})"
                                            class="px-3 rounded h-9 w-30 font-semibold text-white bg-blue-700 hover:border-blue-700 hover:bg-blue-800 shadow-md">Send
                                            Request</button>
                                    @endif
                                @else
                                    <button @click="editProfile = true"
                                        class="px-3 rounded h-9 w-30 font-semibold text-white bg-blue-700 hover:border-blue-700 hover:bg-blue-800 shadow-md">Edit
                                        Profile</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-end space-x-6 mx-3 pt-8">
                        <button class="flex flex-col"
                            @click=" profile = true, followers = false, friends = false, gallery = false, friend_requests = false ">
                            <div class="flex px-1 font-semibold" :class="{ 'text-blue-500': profile == true }">
                                <i class="fas fa-inbox mr-3"></i>
                                PROFILE
                            </div>
                            <span class="w-full h-0.5" :class="{ 'bg-blue-500': profile == true }"></span>
                        </button>
                        {{-- <button class="flex flex-col" @click=" profile = false, followers = true, friends = false, gallery = false, friend_requests = false">
                            <div class="flex px-1 font-semibold" :class="{'text-blue-500': followers == true}">
                                <i class="fas fa-users mr-3"></i>
                                FOLLOWERS
                            </div>
                            <span class="w-full h-0.5" :class="{'bg-blue-500': followers == true}"></span>
                        </button> --}}
                        <button class="flex flex-col"
                            @click=" profile = false, followers = false, friends = true, gallery = false, friend_requests = false">
                            <div class="flex px-1 font-semibold" :class="{ 'text-blue-500': friends == true }">
                                <i class="fas fa-user-friends mr-3"></i>
                                FRIENDS
                            </div>
                            <span class="w-full h-0.5" :class="{ 'bg-blue-500': friends == true }"></span>
                        </button>
                        <button class="flex flex-col"
                            @click=" profile = false, followers = false, friends = false, gallery = true, friend_requests = false">
                            <div class="flex px-1 font-semibold" :class="{ 'text-blue-500': gallery == true }">
                                <i class="fas fa-images mr-3"></i>
                                GALLERY
                            </div>
                            <span class="w-full h-0.5" :class="{ 'bg-blue-500': gallery == true }"></span>
                        </button>
                        @if ($user->id == auth()->id())
                            <button class="flex flex-col"
                                @click=" profile = false, followers = false, friends = false, gallery = false, friend_requests = true">
                                <div class="flex px-1 font-semibold"
                                    :class="{ 'text-blue-500': friend_requests == true }">
                                    <i class="fas fa-user-plus mr-3"></i>
                                    FRIEND REQUESTS
                                </div>
                                <span class="w-full h-0.5" :class="{ 'bg-blue-500': friend_requests == true }"></span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        {{-- PROFILE --}}
        <div class="flex flex-row space-x-10" x-show="profile" x-transition>
            <div class="flex flex-col w-1/3">
                <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                    <div class="flex flex-col space-y-4">
                        <button class="flex justify-between items-center"
                            @click=" profile = false, followers = false, friends = true, gallery = false, friend_requests = false">
                            <div class="flex space-x-5 items-center text-purple-800">
                                <div class="bg-purple-200 p-3 rounded-lg">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                                <div class="flex flex-col items-start">
                                    <span class="font-black text-xl">{{ count($friends) }}</span>
                                    <span class="text-gray-600">Friends</span>
                                </div>
                            </div>
                            <div class="mr-5">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </button>
                        {{-- <hr>
                        <button class="flex justify-between items-center"  @click=" profile = false, followers = true, friends = false, gallery = false, friend_requests = false">
                            <div class="flex space-x-5 items-center text-blue-800">
                                <div class="bg-blue-200 p-3 rounded-lg">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="flex flex-col items-start">
                                    <span class="font-black text-xl">10M</span>
                                    <span class="text-gray-600">Followers</span>
                                </div>
                            </div>
                            <div class="mr-5">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </button> --}}
                    </div>
                </div>
                <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                    <div class="flex flex-col space-y-4">
                        <h4 class="font-bold">About</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        <hr>
                        <div class="flex flex-col space-y-4">
                            <a href="https://www.facebook.com/joeldanielblanco/" class="flex items-center"
                                target="_blank">
                                <i class="fab fa-facebook-square mr-3 text-blue-700 text-2xl"></i>
                                <p class="text-sm text-gray-600">https://www.facebook.com/joeldanielblanco/</p>
                            </a>
                            <a href="https://www.instagram.com/joeld_b/" class="flex items-center" target="_blank">
                                <i class="fab fa-instagram mr-3 text-red-500 text-2xl"></i>
                                <p class="text-sm text-gray-600">https://www.instagram.com/joeld_b/</p>
                            </a>
                            <a href="https://www.linkedin.com/in/joel-d-blanco-l/" class="flex items-center"
                                target="_blank">
                                <i class="fab fa-linkedin mr-3 text-gray-800 text-2xl"></i>
                                <p class="text-sm text-gray-600">https://www.linkedin.com/in/joel-d-blanco-l/</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-2/3">
                @if ($user->id == auth()->id())
                    <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                        <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST"
                            id="post-form">
                            @csrf
                            <textarea class="rounded-xl resize-none w-full" name="post_text" id="post_text" cols="30" rows="4"
                                placeholder="What's on your mind, {{ $user->first_name }}"></textarea>
                            <div class="flex flex-row justify-between items-center mt-2">
                                <input type="file" name="post_image" id="post_image" class="hidden"
                                    accept=".jpeg,.jpg,.png,.webp">
                                <label for="post_image"
                                    class="flex flex-row items-center space-x-2 text-blue-800 cursor-pointer">
                                    <i class="fas fa-file-image"></i>
                                    <p>Gallery</p>
                                </label>

                                <input id="submit" type="submit" value="Comment" class="hidden">
                                <label for="submit">
                                    <button
                                        class="inline-block bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Comment</button>
                                </label>
                            </div>
                        </form>
                    </div>
                @endif
                @foreach ($posts as $post)
                    <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                        <div class="flex justify-between mb-5 relative" x-data="{ editDelete: false }">
                            <div class="flex space-x-3 items-center">
                                <img class="rounded-full w-16" src="{{ Storage::url($user->profile_photo_path) }}"
                                    alt="profile_pic">
                                <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                <i class="fas fa-dot-circle"></i>
                                <p class="text-gray-400 text-xs">
                                    {{ (new Carbon\Carbon($post->created_at))->diffForHumans() }}</p>
                            </div>
                            <button @click=" editDelete = !editDelete ">
                                ...
                            </button>
                            <div class="absolute right-4 top-8" x-show="editDelete"
                                @click.outside="editDelete = false">
                                <div
                                    class="flex flex-col border border-gray-400 rounded-xl divide-y divide-opacity-100 divide-gray-300">
                                    <button class="hover:bg-gray-200 p-2 rounded-t-xl">Edit</button>
                                    <button class="hover:bg-gray-200 p-2 rounded-b-xl">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <p>{{ json_decode($post->content, 1)['text'] }}</p>
                            @if (json_decode($post->content, 1)['photo_path'] != null)
                                <img class="rounded-lg w-3/4 shadow-xl {{-- transform hover:scale-105 transition duration-500 --}}"
                                    src="{{ Storage::url(json_decode($post->content, 1)['photo_path']) }}"
                                    alt="profile_pic">
                            @endif
                        </div>
                        <div>
                            <div class="flex justify-between">
                                <div class="flex space-x-6">
                                    <button class="flex space-x-2 items-center">
                                        <i class="fas fa-thumbs-up"></i>
                                        <p>0 Likes</p>
                                    </button>
                                    <button class="flex space-x-2 items-center">
                                        <i class="far fa-comment-alt"></i>
                                        <p>0 Comments</p>
                                    </button>
                                </div>
                                <button>
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                            <div class="flex items-center space-x-3 mt-3">
                                <img class="rounded-full w-10" src="{{ Storage::url($user->profile_photo_path) }}"
                                    alt="profile_pic">
                                <textarea class="rounded-xl resize-none w-5/6" name="" id="" cols="30" rows="1"
                                    placeholder="Write a comment"></textarea>
                                <button
                                    class="inline-block bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 hover:text-white hover:no-underline">Comment</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- FOLLOWERS --}}
        {{-- <div class="flex flex-row space-x-10" x-show="followers" x-transition>
            <div class="flex flex-col w-full">
                <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                    <h4 class="mt-4 text-xl font-bold">Followers</h4>
                    <hr class="my-6">
                    <div class="grid grid-flow-row grid-cols-4 gap-4">
                        @foreach ($randomizer as $randomized)
                        <div class="flex flex-col mx-2 border rounded-xl bg-gray-50 w-full p-3 hover:border-blue-500" x-data="{follow: true, followed: false}" x-cloak>
                            <div class="flex justify-between">
                                <div class="flex items-center space-x-3">
                                    <img class="rounded-full w-12" src="https://picsum.photos/200?random={{$loop->index}}" alt="profile_pic">
                                    <p class="text-sm font-bold">{{$user->first_name}} {{$user->last_name}}</p>
                                </div>
                                <div class="flex flex-col items-start mx-4">
                                    <button class="font-bold text-lg text-indigo-400">
                                        ...
                                    </button>
                                </div>
                            </div>
                            <button class="flex border border-blue-500 rounded m-4 py-2 space-x-3 items-center justify-center text-blue-500 hover:bg-blue-50" x-show="followed" @click="follow = true, followed = false">
                                <i class="fas fa-user-friends"></i>
                                <p class="text-sm font-bold">Followed</p>
                            </button>
                            <button class="flex border bg-blue-500 rounded m-4 py-2 space-x-3 items-center justify-center text-white hover:bg-blue-600" x-show="follow" @click="followed = true, follow = false">
                                <i class="fas fa-user-plus"></i>
                                <p class="text-sm font-bold">Follow</p>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- FRIENDS --}}
        <div class="flex flex-row space-x-10" x-show="friends" x-transition>
            <div class="flex flex-col w-full">
                <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                    <div class="flex mt-4 justify-between">
                        <h4 class="text-xl font-bold">Friends</h4>
                        <input type="text" id="friends-search"
                            class="pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="Search...">
                    </div>
                    <hr class="my-6">
                    <div class="grid grid-flow-row grid-cols-4 gap-4">
                        {{-- {{dd($friends)}} --}}
                        @foreach ($friends as $friend)
                            {{-- {{dd($friend)}} --}}
                            <div class="flex flex-col mx-2 border rounded-xl bg-gray-50 w-full p-3 hover:border-blue-500"
                                wire:key="friend-{{ $friend->id }}">
                                <div class="flex justify-between">
                                    <div class="flex items-center space-x-3">
                                        <img class="rounded-full w-12"
                                            src="{{ Storage::url($friend->profile_photo_path) }}" alt="profile_pic">
                                        <p class="text-sm font-bold">{{ $friend->first_name }}
                                            {{ $friend->last_name }}</p>
                                    </div>
                                    <div class="flex flex-col items-start mx-4">
                                        <button class="font-bold text-lg text-indigo-400">
                                            ...
                                        </button>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button
                                        class="transition-colors ease-out delay-75 flex border bg-white rounded my-4 py-2 space-x-3 w-1/2 items-center justify-center text-purple-500 hover:bg-purple-100">
                                        <i class="fas fa-video"></i>
                                    </button>
                                    <button
                                        class="transition-colors ease-out delay-75 flex border bg-white rounded my-4 py-2 space-x-3 w-1/2 items-center justify-center text-blue-500 hover:bg-blue-100">
                                        <i class="far fa-comment-alt"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- {{ $friends->links() }} --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- GALLERY --}}
        <div class="flex flex-row space-x-10" x-show="gallery" x-transition>
            <div class="flex flex-col w-full">
                <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                    <div class="flex mt-4 justify-between">
                        <h4 class="text-xl font-bold">Gallery</h4>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded shadow-lg">
                            Add Photos
                        </button>
                    </div>
                    <hr class="my-6">
                    <div class="grid grid-flow-row grid-cols-4 gap-4">
                        @foreach ($randomizer as $randomized)
                            <div class="flex rounded-xl rounded-b-2xl h-48 bg-white w-full items-end"
                                style="background-image: url('https://picsum.photos/200?random={{ $loop->index }}'); background-size: cover">
                                {{-- <img class="rounded-t-lg max-h-36" src="https://picsum.photos/200?random={{$loop->index}}" style="background-size: cover" alt="profile_pic"> --}}
                                <div
                                    class="flex space-x-2 bg-white w-full rounded-b-xl border border-gray-200 p-3 justify-between">
                                    <div class="flex flex-col space-y-1">
                                        <p class="text-black font-bold">random_name.jpg</p>
                                        <p class="text-xs text-gray-400">
                                            <i class="far fa-calendar-alt"></i>
                                            Sun Sep 5 2021
                                        </p>
                                    </div>
                                    <button
                                        class="transition-colors ease-out delay-75 flex border bg-purple-50 rounded-lg py-2 w-2/12 items-center justify-center text-purple-500 hover:bg-purple-800 hover:text-white text-sm">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- FRIENDS REQUESTS --}}
        <div class="flex flex-row space-x-10" x-show="friend_requests" x-transition>
            <div class="flex flex-col w-full">
                <div class="w-full border rounded-xl bg-white flex flex-col p-5 mb-6">
                    <div class="flex mt-4 justify-between">
                        <h4 class="text-xl font-bold">Friend requests</h4>
                        <input type="text" id="friends-search"
                            class="pl-3 pr-10 py-2 border-2 border-gray-200 rounded-xl hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors"
                            placeholder="Search...">
                    </div>
                    <hr class="my-6">
                    <div class="grid grid-flow-row grid-cols-4 gap-4">
                        @foreach ($friend_requests as $friend_request)
                            @php
                                $friend = App\Models\User::find($friend_request->user_id);
                            @endphp
                            <div
                                class="flex flex-col mx-2 border rounded-xl bg-gray-50 w-full p-3 hover:border-blue-500">
                                <div class="flex justify-between">
                                    <div class="flex items-center space-x-3">
                                        <img class="rounded-full w-12"
                                            src="{{ Storage::url($friend->profile_photo_path) }}" alt="profile_pic">
                                        <div>
                                            <p class="text-sm font-bold">{{ $friend->first_name }}
                                                {{ $friend->last_name }}</p>
                                            <p class="text-xs text-gray-400">10 mutual friends</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-start mx-4">
                                        <button class="font-bold text-lg text-indigo-400">
                                            ...
                                        </button>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button wire:click="confirmRequest({{ $friend_request->id }})"
                                        class="transition-colors ease-out delay-75 flex border bg-white rounded my-4 py-2 space-x-3 w-1/2 items-center justify-center text-blue-500 hover:bg-blue-100 font-bold">
                                        Confirm
                                    </button>
                                    <button wire:click="deleteRequest({{ $friend_request->id }})"
                                        class="transition-colors ease-out delay-75 flex border bg-white rounded my-4 py-2 space-x-3 w-1/2 items-center justify-center text-red-500 hover:bg-red-400 font-bold hover:text-white">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <x-modal type="info" name="editProfile">
            <x-slot name="title">
                <p class="text-md ">Profile</p>
            </x-slot>

            <x-slot name="content">

                <div class="bg-white flex space-x-6 mx-4">
                    <div class="border border-b rounded-xl divide-y w-1/3">
                        <div class="py-4">
                            <p>Profile Picture</p>
                        </div>
                        <div class="flex flex-col items-center space-y-4 p-4">
                            <div class="w-32 h-32 border-gray-400 bg-white cursor-pointer">
                                {{-- style="background-image: url('{{ Storage::url($user->profile_photo_path) }}')"> --}}
                                <img src="{{ Storage::url($user->profile_photo_path) }}" class="w-full h-full object-cover" alt="">
                            </div>
                            {{-- <p class="text-gray-500 text-xs font-light">Upload/Change Your Profile Image</p> --}}
                            {{-- <button class="bg-blue-400 text-white font-semibold p-2 rounded-md"> --}}
                            <input type="file" name="new_profile_pic" id="new_profile_pic" class="hidden"
                                accept=".jpeg,.jpg,.png,.webp" form="update_profile_form">

                            {{-- </button> --}}
                            <label for="new_profile_pic"
                                class="bg-blue-400 text-white font-semibold p-2 rounded-md cursor-pointer">
                                <p>Upload Avatar</p>
                            </label>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('profile.update', $user->id) }}"
                        class="bg-white rounded-md w-2/3 p-6 my-4 mx-auto border border-b" id="update_profile_form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="divide-y mb-5">
                            <p class="font-bold text-md mb-6 w-full text-left">
                                Edit Account Details
                            </p>
                            <div>
                                <div class="flex pt-6 space-x-4">
                                    <div class="space-y-1">
                                        <input type="text" name="first_name" id="first_name"
                                            placeholder="First name" required value="{{ $user->first_name }}"
                                            class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('first_name')) border-red-600 @else border-gray-300 @endif ">
                                        @if ($errors->has('first_name'))
                                            <p class="text-xs font-light text-red-600">Required</p>
                                        @endif
                                    </div>
                                    <div class="space-y-1">
                                        <input type="text" name="last_name" id="last_name"
                                            placeholder="Last name" required value="{{ $user->last_name }}"
                                            class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('last_name')) border-red-600 @else border-gray-300 @endif ">
                                        @if ($errors->has('last_name'))
                                            <p class="text-xs font-light text-red-600">Required</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex pt-6 space-x-4">
                                    <div class="space-y-1">
                                        <input type="text" value="{{ $user->username }}" disabled
                                            class="w-full rounded-md p-3 text-gray-400 border-gray-300">
                                    </div>
                                    <div class="space-y-1">
                                        <input type="text" name="email" id="email" placeholder="Email"
                                            required value="{{ $user->email }}"
                                            class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('email')) border-red-600 @else border-gray-300 @endif ">
                                        @if ($errors->has('email'))
                                            <p class="text-xs font-light text-red-600">Required</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex justify-end">
                            <button
                                class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </x-slot>

            <x-slot name="footer" class="justify-center">
                {{-- <button
                    onclick="saveSchedule({{ isset($plan) ? $plan : 0 }},'schedule.check',{{ Auth::user()->roles->pluck('id')[0] }});toggleCellBlock()"
                    class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                    @click=" showUserInfo = false ">
                    Save
                </button>
                <button
                    class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                    @click=" showUserInfo = false ">
                    Cancel
                </button> --}}
            </x-slot>
        </x-modal>

        <div wire:loading>
            @include('components.loading-state')
        </div>
    </div>

    <script type="text/javascript">
        var windowObjectReference = null; // global variable

        function openClassroomPopupWindow() {
            if (windowObjectReference == null || windowObjectReference.closed)
            /* if the pointer to the window object in memory does not exist
               or if such pointer exists but the window was closed */

            {
                windowObjectReference = window.open("{{ route('classroom', $user->id) }}",
                    "{{ $user->first_name }} {{ $user->last_name }} - Lesson Room", "popup");
                /* then create it. The new window will be created and
                   will be brought on top of any other window. */
            } else {
                windowObjectReference.focus();
                /* else the window reference must exist and the window
                   is not closed; therefore, we can bring it back on top of any other
                   window with the focus() method. There would be no need to re-create
                   the window or to reload the referenced resource. */
            };
        }
    </script>


    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div> --}}
    {{-- <script type="text/javascript" src="{{ asset('js/autosize.js') }}"></script>
    <script>autosize(document.querySelector('textarea'));</script> --}}
</div>
