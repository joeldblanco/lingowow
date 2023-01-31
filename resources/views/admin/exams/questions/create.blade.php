<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
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
                    <form action="{{ route('exam.store') }}" enctype="multipart/form-data" method="POST" id="exam-form">
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
