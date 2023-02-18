{{-- <x-app-layout> --}}
<div class="bg-white font-sans" x-data="{ import_question: false, create_question: false, import_create: true, questionList: true, error: @if (session('error')) true @else false @endif }" x-cloak>
    @if (session('error'))
        <div x-show="error; setTimeout(() => error = false, 3000)" x-transition.duration.100ms
            @click.outside="error=false" class="flex justify-center fixed bottom-5 left-5 z-20">
            <div
                class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-red-600 border-red-600 text-white">
                <div>
                    {{ session('error') }}
                </div>
                <div class="flex mt-2 sm:mt-0 sm:ml-4" @click="error = false">
                    <a class="px-3 py-2 hover:bg-red-700 transition ease-in-out duration-300 cursor-pointer">Dismiss</a>
                </div>
            </div>
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            {{-- <a href="{{route('exams.store')}}" class="p-2 m-2 block border w-20 text-center rounded-md bg-gray-200 font-semibold hover:bg-gray-500 hover:text-white">
                    New
                </a> --}}
            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="create_question">
                <form action="{{ route('questions.store', $exam_id) }}" enctype="multipart/form-data" method="POST"
                    id="exam-form">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="create-questions-form"
                                class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                                @click.outside="create_question=false">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">Create Question</h1>
                                    <i class="fas fa-times cursor-pointer text-xl" @click="create_question=false"></i>
                                </div>
                                <div class="flex flex-col">
                                    <label for="question-value" class="text-sm">Question Value</label>
                                    <input type="number" name="question-value" id="question-value"
                                        value="question-value"
                                        class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                        min="0" max="100" required>
                                </div>
                                <select id="question-type" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                    name="question-type">
                                    <option selected disabled hidden required>Type</option>
                                    <option value="info">Info</option>
                                    <option value="multiple-choice">Multiple choice</option>
                                    <option value="essay">Essay</option>
                                    <option value="speaking">Speaking</option>
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
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="import_question">
                <form action="{{ route('questions.import') }}" enctype="multipart/form-data" method="POST"
                    id="exam-form">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="import-questions-form"
                                class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                                @click.outside="import_question=false">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">Import Questions</h1>
                                    <i class="fas fa-times cursor-pointer text-xl" @click="import_question=false"></i>
                                </div>
                                <div class="flex flex-col">
                                    <label for="import-file" class="text-sm">File to import</label>
                                    <input type="file" name="import-file" id="import-file"
                                        class="px-2 py-2 text-gray-700 bg-gray-200 rounded" required accept=".txt">
                                </div>
                                <input type="text" name="exam_id" id="exam_id" class="hidden"
                                    value="{{ $exam_id }}">
                                <div class="flex pt-4 justify-end">
                                    <button
                                        class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="flex space-x-4 mb-4" x-show="import_create">
                <button class="text-center border rounded-md p-2 hover:bg-green-300" @click="create_question = true"><i
                        class="fas fa-plus-square text-green-600"></i></button>
                <button for="input-file" class="text-center border rounded-md p-2 hover:bg-blue-300"
                    @click="import_question = true"><i class="fas fa-file-import text-blue-600"></i></button>
            </div>
            <table class="text-left w-full border-collapse" x-show="questionList">
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                        </th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            Value</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                            Description</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                            Type</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                            Created at</th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                            Status</th>
                        {{-- <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400"></th> --}}
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                        </th>
                        <th
                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                        </th>
                    </tr>
                <tbody>
                    @if (count($questions))
                        @foreach ($questions as $question)
                            <tr class="hover:bg-gray-200">

                                <td class="py-4 px-6 border-b border-gray-400 ">
                                    @if ($loop->index > 0)
                                        <button wire:click="moveQuestionUp({{ $question->id }})"><i
                                                class="fas fa-angle-up"></i></button>
                                    @endif
                                    @if ($loop->remaining > 0)
                                        <button wire:click="moveQuestionDown({{ $question->id }})"><i
                                                class="fas fa-angle-down"></i></button>
                                    @endif
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400">{{ $question->value }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">{!! $question->description !!}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center uppercase">
                                    {{ $question->type }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ (new Carbon\Carbon($question->created_at))->isoFormat('L') }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    @if ($question->deleted_at == null)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{route('questions.show',[$exam_id,$question->id])}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">View</a>
                                </td> --}}
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{ route('questions.edit', $question->id) }}"
                                        class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">Edit</a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-red-100 hover:bg-red-500 hover:text-white">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="py-4 px-6 border-b border-gray-400 text-center">There are no
                                questions</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@livewireScripts
<script>
    ////////////////////////////////

    $("#input-file").change(function() {
        if ($("#input-file")[0].files.length > 0) {
            //
        }
    });

    ///////////////////////////////

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

                $("#option").prop('required', true);

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
{{-- </x-app-layout> --}}
