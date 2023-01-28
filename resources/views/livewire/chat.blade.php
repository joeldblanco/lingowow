@php
    $last_conn = new Carbon\Carbon('first day of this month');
    $last_conn = $last_conn->diffForHumans();
    
    // $now = new DateTime('now');
    // dd($now);
    
    // $now = Carbon\Carbon::now();
    
    // $utc = Carbon\Carbon::now(new DateTimeZone('UTC'));
    
    // dd($now,$utc);
    
    // dd(timezone_name_from_abbr("",-300*60,false));
    // var_dump($now);
    
    // dd($show_id,$this->conversation_id);
    
@endphp

<div class="bg-gray-300 font-sans p-5 mx-5 rounded-xl flex" x-data="data()">
    @if (count($conversations) > 0)
        <div class="bg-white overflow-hidden rounded-xl p-3 w-1/3 flex flex-col space-y-5 mr-5" x-show="conversations">
            <div class="flex space-x-3 items-center">
                <img src="{{ Storage::url(auth()->user()->profile_photo_path) }}" alt="profile_pic"
                    class="w-1/6 rounded-full">
                <p class="w-5/6 font-bold text-lg">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
            </div>
            <div class="relative">
                <input type="search"
                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium mr-3 hover:border-gray-700"
                    placeholder="Search...">
                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div>
            </div>
            <div class="flex flex-col overflow-y-auto" style="max-height: calc(100vh - 245px)">
                @foreach ($conversations as $key => $value)
                    @if ($value->users->count() >= 2)
                        {{-- <a href="{{ route('chat.show', $value) }}"> --}}
                        <button class="flex items-center space-x-3 cursor-pointer hover:bg-gray-200 py-3 pl-2 pr-1"
                            wire:click="showConversation({{ $value->id }})">

                            @if (!$value->group_conversation)
                                @php
                                    $participant = $value->users->where('id', '!=', auth()->user()->id)->first();
                                @endphp

                                <img src="{{ Storage::url($participant->profile_photo_path) }}" alt="profile_pic"
                                    class="w-1/6 rounded-full">
                            @else
                                <img src="{{ Storage::url($value->group_image) }}" alt="profile_pic"
                                    class="w-1/6 rounded-full">
                            @endif

                            {{-- <img src="https://picsum.photos/200?random={{auth()->id()}}" alt="profile_pic" class="w-1/6 rounded-full"> --}}
                            <div class="w-3/4 items-start flex flex-col">
                                @if (!$value->group_conversation)
                                    <p>{{ $participant->first_name }} {{ $participant->last_name }}
                                    </p>
                                @else
                                    <p>{{ $value->name }}
                                    </p>
                                @endif
                                <p class="text-sm text-gray-400">
                                    {{ Str::limit($value->messages->last()->message_content, 20, '...') }}</p>
                            </div>
                            <div class="flex flex-col items-end space-y-3 w-1/4">
                                <p class="text-xs text-gray-400 text-right">
                                    {{ (new Carbon\Carbon($value->messages->last()->created_at))->diffForHumans(['options' => Carbon\Carbon::JUST_NOW | Carbon\Carbon::ONE_DAY_WORDS | Carbon\Carbon::TWO_DAY_WORDS]) }}
                                </p>
                                @if ($value->unread_messages)
                                    <div class="rounded-full bg-green-700 w-5 h-5 flex justify-center items-center">
                                        <span
                                            class="w-full text-white font-bold text-xs">{{ $value->unread_messages }}</span>
                                    </div>
                                @endif
                            </div>
                        </button>
                        {{-- </a> --}}
                    @endif
                @endforeach
            </div>
        </div>
        @if ($conversation)
            <div class="bg-white overflow-hidden rounded-xl p-5 w-full flex flex-col" x-show="currentConversation">
                <div class="flex h-20 items-center border-b mb-3">
                    <div class="w-10 flex justify-center cursor-pointer p-3 rounded-full mr-2"
                        @click="conversations = ! conversations">
                        <i class="fas fa-bars mx-auto"></i>
                    </div>
                    <div class="flex w-full my-7 items-center space-x-3">
                        <div class="w-12">
                            <img src="{{ Storage::url($participant->profile_photo_path) }}" alt="profile_pic"
                                class="rounded-full">
                        </div>
                        <div class="flex flex-col">
                            <div class="flex space-x-1 items-center">
                                <p class="font-bold">{{ $participant->first_name }} {{ $participant->last_name }}
                                </p>
                                {{-- <span class="bg-green-400 w-2 h-2 rounded-full"></span> --}}
                            </div>
                            <p class="text-sm text-gray-600" x-show="conversation_id == typingConversationId">Typing...
                            </p>
                            {{-- <p class="text-sm text-green-500" x-show="conversation_id != typingConversationId">Online
                            </p> --}}
                            {{-- <p class="text-sm text-gray-400">Last seen {{ $last_conn }}</p> --}}
                        </div>
                    </div>
                    <div class="flex">
                        {{-- <div class="w-10 flex justify-center cursor-pointer p-3 rounded-full" @click="conversations = ! conversations">
                            <i class="fas fa-bars w-1/12"></i>
                        </div>
                        <div class="w-10 flex justify-center cursor-pointer p-3 rounded-full" @click="conversations = ! conversations">
                            <i class="fas fa-bars w-1/12"></i>
                        </div>
                        <div class="w-10 flex justify-center cursor-pointer p-3 rounded-full" @click="conversations = ! conversations">
                            <i class="fas fa-bars w-1/12"></i>
                        </div> --}}
                        <div class="w-10 flex justify-center cursor-pointer p-3 rounded-full"
                            @click="profileDetail = ! profileDetail">
                            <i class="fas fa-info-circle w-1/12 mx-auto"></i>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col overflow-y-auto" style="height: calc(100vh - 245px)">
                    @foreach ($this->messages as $message)
                        <div class="w-full mb-1">
                            <div class="@if ($message->user_id == auth()->id()) bg-blue-100 float-right @else bg-gray-200 float-left @endif p-4 rounded-lg text-gray-700"
                                style="max-width: 75%">
                                <p class="mr-16 mb-2">{{ $message->message_content }}</p>
                                @php
                                    // $message->created_at = new Carbon\Carbon($message->created_at);
                                    // $message->created_at = $message->created_at->diffForHumans();
                                @endphp
                                <p class="float-right text-xs text-gray-500 message-created-at-{{ $message->id }}">
                                    {{ $message->created_at }}
                                    @if ($message->user_id == auth()->id())
                                        <i
                                            class="fas fa-check-double ml-2 {{ $message->read ? 'text-blue-500' : 'text-gray-600' }}"></i>
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if ($loop->last)
                            <span id="page_bottom"></span>
                        @endif
                    @endforeach
                </div>
                <div class="flex h-20 items-center space-x-3">
                    <div
                        class="flex px-3 h-10 cursor-pointer hover:bg-gray-200 items-center hover:text-yellow-500 rounded-lg">
                        <i class="far fa-laugh"></i>
                    </div>
                    <div class="flex w-full">
                        <input type="text"
                            class="w-full pr-4 py-3 rounded-xl shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium mr-3 border-gray-400 hover:border-gray-700"
                            placeholder="Type a Message" wire:model="text_message" wire:keydown.enter="send_message">
                    </div>
                    <div
                        class="flex px-3 h-10 cursor-pointer hover:bg-gray-200 items-center hover:text-purple-500 rounded-lg">
                        <i class="fas fa-paperclip mx-auto"></i>
                    </div>
                    <div class="flex px-3 h-10 cursor-pointer hover:bg-gray-200 items-center hover:text-blue-500 rounded-lg"
                        wire:click="send_message">
                        <i class="fas fa-paper-plane mx-auto"></i>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden rounded-xl p-2 pb-0 w-1/3 flex flex-col space-y-5 ml-5" x-show="profileDetail"
                x-cloak>
                <div class="h-3/6 w-full">
                    <div class="w-full flex">
                        <img src="{{ Storage::url($participant->profile_photo_path) }}" alt="profile_pic"
                            class="w-2/3 rounded-full mx-auto">
                    </div>
                    <p class="mx-auto text-center mt-4 font-bold text-lg">{{ $participant->first_name }}
                        {{ $participant->last_name }}</p>
                </div>
                <div class="bg-white rounded-lg p-4 flex-col flex space-y-3 text-gray-600 h-3/6">
                    <p class="font-bold text-black">Information</p>
                    <div class="flex space-x-3 font-bold items-center">
                        <i class="fas fa-envelope"></i>
                        <p class="text-sm">{{ $participant->email }}</p>
                    </div>
                    <div class="flex space-x-3 font-bold items-center">
                        <i class="fas fa-map-marker-alt"></i>
                        <p class="text-sm">Address</p>
                    </div>
                    <div class="flex space-x-3 font-bold items-center">
                        <i class="fas fa-phone-alt"></i>
                        <p class="text-sm">Phone</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white overflow-hidden rounded-xl p-5 w-full flex flex-col">
                <p>Select a conversation o create a new one</p>
            </div>
        @endif
    @else
        <div class="bg-white w-full rounded-lg p-5 text-center">
            <button class="space-y-5 text-gray-500 text-3xl font-bold"
                @click="newConversation = true, userList = true">
                <p>There are no conversations</p>
                <i class="fas fa-inbox"></i>
                <p>Click here to start a new one</p>
            </button>
        </div>
        <div class="bg-black bg-opacity-50 z-10 fixed top-0 left-0 w-full h-full flex items-center justify-center p-5"
            x-show="newConversation">
            {{-- <input type="search"
                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium mr-3 hover:border-gray-700"
                    placeholder="To..."
                    wire:model="search"> --}}
            <div class="bg-white w-1/3 rounded-lg p-5" @click.outside="newConversation = false">
                <div x-show="userList">
                    @if (isset($friends))
                        <div class="flex">
                            <div class="text-gray-500 mb-5 w-3/4">
                                <p class="font-bold text-xl">Friends</p>
                                <p>Select one to start a new conversation.</p>
                            </div>
                            <button class="w-1/4 text-center justify-center">
                                <i class="fas fa-search text-gray-500 text-3xl"></i>
                            </button>
                        </div>
                        @foreach ($friends as $friend)
                            <div class="hover:bg-gray-300 flex space-x-3 w-full p-3 items-center rounded-lg cursor-pointer"
                                @click="userList = false, newMessage = true"
                                wire:click="selectParticipant({{ $friend->id }})">
                                <img src="{{ Storage::url($friend->profile_photo_path) }}" alt="profile_pic"
                                    class="w-1/6 rounded-full">
                                <p class="w-3/4 font-bold text-xl">{{ $friend->first_name }}
                                    {{ $friend->last_name }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="text-gray-500 mb-5">
                            <p class="font-bold text-xl">You don't have any friend</p>
                            <p>Send a friend request to one of your peers, or accept one from them.</p>
                        </div>
                    @endif
                </div>
                <div x-show="newMessage">
                    @if ($participant != null)
                        <div class="flex space-x-3 w-full p-3 items-center">
                            <img src="{{ Storage::url($participant['profile_photo_path']) }}" alt="profile_pic"
                                class="w-1/6 rounded-full">
                            <p class="w-3/4 font-bold text-xl">{{ $participant['first_name'] }}
                                {{ $participant['last_name'] }}</p>
                        </div>
                        <div class="w-full">
                            <textarea class="w-full rounded-lg border-gray-300" name="message" id="message" cols="30" rows="10"
                                placeholder="Write a message" wire:model="text_message" wire:keydown.enter="send_message"></textarea>
                            <div class="flex px-3 h-10 cursor-pointer hover:bg-gray-200 border border-gray-300 hover:border-white hover:text-blue-500 rounded-lg"
                                wire:click="send_message" @click="newMessage = false, newConversation = false">
                                <div class="mx-auto flex space-x-3 items-center font-bold">
                                    <p>Send</p>
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    {{-- @livewireScripts --}}
    <script>
        function data() {
            return {

                conversation_id: @entangle('conversation_id'),
                typingConversationId: null,

                init() {
                    // alert("init");
                    Echo.private('App.Models.User.' + {{ auth()->id() }})
                        .notification((notification) => {

                            if (notification.type == "App\\Notifications\\UserTyping") {
                                // console.log(notification.conversation_id);
                                this.typingConversationId = notification.conversation_id;

                                setTimeout(() => {
                                    this.typingConversationId = null;
                                }, 3000);
                            }

                        });
                },
                conversations: true,
                currentConversation: true,
                profileDetail: false,
                newConversation: false,
                userList: false,
                newMessage: false,
            }
        }

        Livewire.on('scrollIntoView', function() {
            document.getElementById('page_bottom').scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'start'
            });
        });

        // var timezone_offset_minutes = new Date().getTimezoneOffset();
        // timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
        // timezone_offset_hours = timezone_offset_minutes / 60;

        // // Timezone difference in minutes such as 330 or -360 or 0
        // // current_tz = Intl.DateTimeFormat().resolvedOptions().timeZone;

        // // let messagesCreatedAt = document.getElementsByClassName("message-created-at");
        // // for (let i = 0; i < messagesCreatedAt.length; i++) {
        // //     // console.log(messagesCreatedAt[i]);
        // // }

        // // console.log(messagesCreatedAtHour+(timezone_offset_minutes/60));
        // console.log(messagesCreatedAtDay + "-" + messagesCreatedAtMonth + "-" + messagesCreatedAtYear + " " +
        //     messagesCreatedAtHour + ":" + messagesCreatedAtMinute);
    </script>
</div>
