<x-app-layout>
    {{-- @php
        $now = Carbon\Carbon::now();
        $now->second = 0;
        $now->minute = 0;
        $now->isoFormat('YYYY-MM-DDTHH:mm');
        // dump($now);
    @endphp --}}
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('categories.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Category
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Name</p>
                                <input type="text" name="name" id="name" placeholder="Enter category name"
                                    required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('name')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('name'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('name')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter category name</p>
                            </div>
                            {{-- <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Host</p>
                                <select name="host_id" id="host_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('host_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a host</option>
                                    @foreach ($hosts as $host)
                                        <option value="{{ $host->id }}">
                                            {{ $host->first_name . ' ' . $host->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('host_id'))
                                    <p class="text-xs font-light text-red-600">{{$errors->get('host_id')[0]}}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a host for the meeting</p>
                            </div> --}}
                            {{-- <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Attendee</p>
                                <select name="attendee_id" id="attendee_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('attendee_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select an attendee</option>
                                    @foreach ($attendees as $attendee)
                                        <option value="{{ $attendee->id }}">
                                            {{ $attendee->first_name . ' ' . $attendee->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('attendee_id'))
                                    <p class="text-xs font-light text-red-600">{{$errors->get('attendee_id')[0]}}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select an attendee for the meeting</p>
                            </div> --}}
                            {{-- <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Date & Time (UTC)</p>
                                <input type="datetime-local" name="date" id="date"
                                    placeholder="Enter meeting date" step="3600" min="{{ $now }}"
                                    value="0000-00-00T00:00" required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('date')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('attendee_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('attendee_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a meeting date and time
                                    <a>(UTC)</a></p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <button class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
