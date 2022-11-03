<x-modal type="info" name="addUser">
    <x-slot name="title">
        Add user
    </x-slot>

    <x-slot name="content">

        <div class="w-full flex flex-col items-center h-full mx-auto">
            <style>
                .top-100 {
                    top: 100%
                }

                .bottom-100 {
                    bottom: 100%
                }

                .max-h-select {
                    max-height: 300px;
                }
            </style>
            <div class="w-full px-4">
                <div class="flex flex-col">
                    <div>
                        <input type="search"
                            class="w-full py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium mr-3"
                            placeholder="Search..." wire:model="search">
                        {{-- {{ dump($this->search) }} --}}
                    </div>
                    <div class="w-80 max-w-xl">
                        <div class="my-2 p-1 flex border border-gray-200 bg-white rounded ">
                            <div class="flex flex-auto flex-wrap max-h-20 overflow-y-auto">
                                @foreach ($selected_users as $user)
                                    <div
                                        class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-teal-700 bg-lw-light_blue border border-teal-300 ">
                                        <div class="text-xs font-normal leading-none max-w-full flex-initial">
                                            @php
                                                $user = App\Models\User::find($user);
                                            @endphp
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </div>
                                        <div class="flex flex-auto flex-row-reverse">
                                            <div wire:click="unselectUser({{ $user->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x cursor-pointer hover:text-teal-400 rounded-full w-4 h-4 ml-2">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-teal-700 bg-lw-light_blue border border-teal-300 ">
                                    <div class="text-xs font-normal leading-none max-w-full flex-initial">Ruby</div>
                                    <div class="flex flex-auto flex-row-reverse">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-teal-400 rounded-full w-4 h-4 ml-2">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-teal-700 bg-lw-light_blue border border-teal-300 ">
                                    <div class="text-xs font-normal leading-none max-w-full flex-initial">Javascript</div>
                                    <div class="flex flex-auto flex-row-reverse">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-teal-400 rounded-full w-4 h-4 ml-2">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 ">
                                <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-up w-4 h-4">
                                        <polyline points="18 15 12 9 6 15"></polyline>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="shadow top-100 bg-white w-full rounded h-52 overflow-y-auto svelte-5uyqqj">
                        <div class="flex flex-col w-full">
                            @foreach ($this->suggested_users as $user)
                                <div wire:click="selectUser({{ $user->id }})"
                                    class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-lw-light_blue text-gray-700 hover:text-gray-100">
                                    <div
                                        class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                        <div class="w-full items-center flex">
                                            <div class="mx-2 leading-6 font-bold">{{ $user->first_name }}
                                                {{ $user->last_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-lw-light_blue">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative border-teal-600">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6">Javascript </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-lw-light_blue">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative border-teal-600">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6  ">Ruby </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-lw-light_blue">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6  ">JAVA </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-lw-light_blue">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6  ">ASP.Net </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-lw-light_blue">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6  ">C++ </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cursor-pointer w-full border-gray-100 border-b hover:bg-lw-light_blue">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 leading-6  ">SQL </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="footer" class="justify-center">
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
            wire:click="saveUser">Add User(s)</button>
    </x-slot>
</x-modal>
