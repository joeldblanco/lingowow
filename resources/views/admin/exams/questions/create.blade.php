<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                {{-- <form method="POST" action="{{ route('meetings.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Meeting
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Topic</p>
                                <input type="text" name="topic" id="topic" placeholder="Enter meeting topic"
                                    required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('topic')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('topic'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter meeting topic</p>
                            </div>
                            <div class="py-2 space-y-1">
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
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a host for the meeting</p>
                            </div>
                            <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Atendee</p>
                                <select name="atendee_id" id="atendee_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('atendee_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select an atendee</option>
                                    @foreach ($atendees as $atendee)
                                        <option value="{{ $atendee->id }}">
                                            {{ $atendee->first_name . ' ' . $atendee->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('atendee_id'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a atendee for the meeting</p>
                            </div>
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Date & Time (UTC)</p>
                                <input type="datetime-local" name="date" id="date" placeholder="Enter meeting date" step="3600" min="{{$now}}" value="0000-00-00T00:00" required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('date')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('atendee_id'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a meeting date and time <a>(UTC)</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <button class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                            Save
                        </button>
                    </div>
                </form> --}}
                @if ($method == 'create')
                    <form action="{{ route('exam.store') }}" enctype="multipart/form-data" method="POST" id="exam-form">
                        @csrf
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="leading-loose">
                                <div id="create-questions-form"
                                    class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1">
                                    <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                        <h1 class="">Create Question</h1>
                                        <i class="fas fa-times cursor-pointer text-xl"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="question-value" class="text-sm">Question Value</label>
                                        <input type="number" name="question-value" id="question-value"
                                            value="question-value"
                                            class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                            min="0" max="100" required>
                                    </div>
                                    <select id="question-type"
                                        class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="question-type">
                                        <option selected disabled hidden required>Type</option>
                                        <option value="info">Info</option>
                                        <option value="multiple-choice">Multiple choice</option>
                                        <option value="essay">Essay</option>
                                    </select>
                                    <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description" style="resize: none"
                                        rows="4" name="question-description" required></textarea>
                                    <div id="options">

                                    </div>
                                    <div class="flex pt-4 justify-end">
                                        <button
                                            class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Create</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ route('exam.store') }}" enctype="multipart/form-data" method="POST"
                        id="exam-form">
                        @csrf
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="leading-loose">
                                <div id="create-questions-form"
                                    class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1">
                                    <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                        <h1 class="">Import Questions</h1>
                                        <i class="fas fa-times cursor-pointer text-xl"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="question-value" class="text-sm">Upload File</label>
                                        <input type="file" name="import_file" id="import_file" accept=".txt"
                                            class="px-2 py-2 text-gray-700 bg-gray-200 rounded" required>
                                    </div>
                                    <div class="flex pt-4 justify-end">
                                        <button
                                            class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Create</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                @endif

            </div>
        </div>
        @if ($method == 'create')
            <script>
                $("#question-type").change(function() {
                    var option = $("#question-type").find(":selected").text();
                    $('#options').empty();

                    if (option == "Multiple choice") {
                        for (let i = 1; i <= 3; i++) {
                            var option = $('<div>');
                            option.addClass('flex flex-row space-x-4 my-3 items-center');

                            radio = $('<input>').attr({
                                type: 'radio',
                                id: 'option',
                                value: i,
                                name: 'selected-option'
                            }).appendTo(option);

                            $('<input>').attr({
                                type: 'text',
                                id: 'option-text',
                                placeholder: 'Option ' + i,
                                name: 'option-text-' + i,
                                class: 'w-full px-2 py-2 text-gray-700 bg-gray-200 rounded'
                            }).appendTo(option);

                            option.appendTo('#options')
                        }

                    } else {
                        $('<input>').attr({
                            type: 'file',
                            class: 'w-full px-2 py-2 text-gray-700 bg-gray-200 rounded',
                            name: 'question-file'
                        }).appendTo('#options');
                    }

                });
            </script>
        @endif
    </div>

</x-app-layout>
