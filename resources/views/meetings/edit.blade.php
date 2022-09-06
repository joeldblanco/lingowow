<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('meetings.update', $meeting->id) }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    @method('PATCH')
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            Edit Meeting
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Topic</p>
                                <input type="text" name="topic" id="topic" placeholder="Enter meeting topic"
                                    value="{{ $meeting->topic }}" disabled
                                    class="w-full rounded-md p-3 text-gray-400 @if ($errors->has('topic')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('topic'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                {{-- <p class="text-gray-500 text-sm font-light">Please enter meeting topic</p> --}}
                            </div>
                            <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Host</p>
                                <select name="host_id" id="host_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('host_id')) border-red-600 @else border-gray-300 @endif">
                                    @foreach ($hosts as $host)
                                        @if ($host->id == $meeting->host->id)
                                            <option value="{{ $host->id }}" selected>
                                                {{ $host->first_name }} {{ $host->last_name }}
                                            </option>
                                        @else
                                            <option value="{{ $host->id }}">
                                                {{ $host->first_name . ' ' . $host->last_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('host_id'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a host for the meeting</p>
                            </div>
                            <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Atendee</p>
                                <select name="atendee_id" id="atendee_id" disabled
                                    class="w-full rounded-md p-3 text-gray-400 @if ($errors->has('atendee_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="{{ $meeting->atendee->id }}" selected disabled hidden>
                                        {{ $meeting->atendee->first_name . ' ' . $meeting->atendee->last_name }}
                                    </option>
                                </select>
                                @if ($errors->has('atendee_id'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                {{-- <p class="text-gray-500 text-sm font-light">Please select a atendee for the meeting</p> --}}
                            </div>
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
