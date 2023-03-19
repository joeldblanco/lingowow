<x-app-layout>
    <div class="bg-white font-sans" x-data="{ edit_exam: false, import_question: false, create_question: false, import_create: true, questionList: true, error: @if (session('error')) true @else false @endif }" x-cloak>
        @if (session('error'))
            <div x-show="error; setTimeout(() => error = false, 3000)" x-transition.duration.100ms
                @click.outside="error=false" class="flex justify-center fixed bottom-5 left-5 z-20">
                <div
                    class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-red-600 border-red-600 text-white">
                    <div>
                        {{ session('error') }}
                    </div>
                    <div class="flex mt-2 sm:mt-0 sm:ml-4" @click="error = false">
                        <a
                            class="px-3 py-2 hover:bg-red-700 transition ease-in-out duration-300 cursor-pointer">Dismiss</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                    x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="edit_exam">

                    <form action="{{ route('exams.update', $exam) }}" method="POST" id="exam-form">
                        @csrf
                        @method('PATCH')

                        <div class="w-full h-full flex items-center justify-center">
                            <div class="leading-loose">
                                <div class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-4"
                                    @click.outside="edit_exam=false">
                                    <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                        <h1 class="">Edit Exam</h1>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="passing_marks" class="text-sm">Min Score</label>
                                        <input type="number" name="passing_marks" id="passing_marks"
                                            value="{{ $exam->passing_marks }}"
                                            class="w-1/4 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                            min="0" max="100" required>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="total_marks" class="text-sm">Max Score</label>
                                        <input type="number" name="total_marks" id="total_marks"
                                            value="{{ $exam->total_marks }}"
                                            class="w-1/4 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                            min="0" max="100" required>
                                    </div>
                                    <input type="text" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                        value="{{ $exam->title }}" name="title" placeholder="Title">
                                    <textarea name="description" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="" cols="30"
                                        rows="10" placeholder="Description">{{ $exam->description }}</textarea>
                                    <select id="unit_id" class="w-3/4 px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                        name="unit_id">
                                        <option selected disabled hidden required>Unit</option>
                                        @foreach ($courses as $course)
                                            <option class="font-bold text-gray-400" disabled>{{ $course->name }}
                                            </option>
                                            @foreach ($course->modules as $module)
                                                <option class="font-bold text-gray-400" disabled>-{{ $module->name }}
                                                </option>
                                                @foreach ($module->units->nth(2, 1) as $unit)
                                                    <option value="{{ $unit->id }}"
                                                        @if ($unit->id == $exam->unit_id) selected @endif>
                                                        --{{ $unit->name }}

                                                    </option>
                                                @endforeach
                                            @endforeach
                                            <option disabled></option>
                                        @endforeach
                                    </select>
                                    <div class="flex flex-col">
                                        <label for="duration" class="text-sm">Duration (min)</label>
                                        <input type="number" name="duration" id="duration"
                                            value="{{ $exam->duration }}"
                                            class="w-1/4 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                            min="0" max="100" required>
                                    </div>
                                    <select id="status" class="w-3/4 px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                        name="status">
                                        <option selected disabled hidden required>Status</option>
                                        <option value="0" @if ($exam->status == 0) selected @endif>
                                            Inactive</option>
                                        <option value="1" @if ($exam->status == 1) selected @endif>Active
                                        </option>
                                    </select>
                                    <div class="flex pt-4 justify-end space-x-3">
                                        <button @click="edit_exam=false" type="button"
                                            class="px-4 py-1 text-white font-light tracking-wider bg-red-600 hover:bg-red-700 rounded cursor-pointer">Cancel</button>
                                        <button
                                            class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded">Save</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                    x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="create_question">
                    <form action="{{ route('questions.store', ['exam_id' => $exam->id]) }}"
                        enctype="multipart/form-data" method="POST" id="exam-form">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="leading-loose">
                                <div id="create-questions-form"
                                    class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                                    @click.outside="create_question=false">
                                    <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                        <h1 class="">Create Question</h1>
                                        <i class="fas fa-times cursor-pointer text-xl"
                                            @click="create_question=false"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="marks" class="text-sm">Question Value</label>
                                        <input type="number" name="marks" id="marks" value="marks"
                                            class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                            min="0" max="100" required>
                                    </div>
                                    <select id="type" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                        name="type">
                                        <option selected disabled hidden required>Type</option>
                                        <option value="info">Info</option>
                                        <option value="multiple-choice">Multiple choice</option>
                                        <option value="essay">Essay</option>
                                        <option value="speaking">Speaking</option>
                                    </select>
                                    <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description" style="resize: none"
                                        rows="4" name="description" required></textarea>
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
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    x-show="import_question">
                    <form action="{{ route('questions.import') }}" enctype="multipart/form-data" method="POST"
                        id="exam-form">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="leading-loose">
                                <div id="import-questions-form"
                                    class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                                    @click.outside="import_question=false">
                                    <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                        <h1 class="">Import Questions</h1>
                                        <i class="fas fa-times cursor-pointer text-xl"
                                            @click="import_question=false"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="import-file" class="text-sm">File to import</label>
                                        <input type="file" name="import-file" id="import-file"
                                            class="px-2 py-2 text-gray-700 bg-gray-200 rounded" required
                                            accept=".txt">
                                    </div>
                                    <input type="text" name="exam_id" id="exam_id" class="hidden"
                                        value="{{ $exam->id }}">
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
                <div class="flex justify-between items-center mb-4" x-show="import_create">
                    <div class="space-x-2">
                        <button class="text-center border rounded-md p-2 hover:bg-green-300"
                            @click="edit_exam = true"><i class="fas fa-edit text-gray-600"></i></button>
                        <button class="text-center border rounded-md p-2 hover:bg-green-300"
                            @click="create_question = true"><i class="fas fa-plus-square text-green-600"></i></button>
                        <button for="input-file" class="text-center border rounded-md p-2 hover:bg-blue-300"
                            @click="import_question = true"><i class="fas fa-file-import text-blue-600"></i></button>
                    </div>
                    <div>
                        <button
                            class="mt-4 px-4 py-2 bg-lw-blue hover:bg-blue-800 rounded-lg text-white font-bold reorder-unit-save"
                            onclick="reorder()">Reorder</button>
                    </div>
                </div>
                <table class="text-left w-full border-collapse" x-show="questionList">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                Order</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Marks</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Description</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Type</th>
                            {{-- <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center mx-auto">
                                Created at</th> --}}
                            {{-- <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Status</th> --}}
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                        </tr>
                    <tbody>
                        @forelse ($exam->questions->sortBy('order') as $question)
                            <tr class="hover:bg-gray-200 question" id="{{ $question->id }}-{{ $question->order }}">

                                <td class="py-4 px-6 border-b border-gray-400 text-center">{{ $question->order }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center font-bold">
                                    {{ $question->marks }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">{!! $question->description !!}
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center uppercase text-xs">
                                    <span
                                        class="flex font-bold py-1 px-3 rounded text-xs text-white no-wrap justify-center select-none cursor-default @if ($question->type == 'essay') bg-green-500 @endif @if ($question->type == 'multiple-choice') bg-purple-500 @endif @if ($question->type == 'info') bg-blue-500 @endif @if ($question->type == 'speaking') bg-red-500 @endif">
                                        {{ $question->type }}
                                    </span>
                                </td>
                                {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ (new Carbon\Carbon($question->created_at))->isoFormat('L') }}
                                </td> --}}
                                {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    @if ($question->deleted_at == null)
                                        Active
                                    @else
                                        Inactive
                                    @endif
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
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <button title="Reorder" class="ml-8 cursor-move">
                                        <i class="fas fa-grip-lines"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 px-6 border-b border-gray-400 text-center">There are no
                                    questions</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/sortable.js"></script>
    <script>
        ////////////////////////////////

        $("#input-file").change(function() {
            if ($("#input-file")[0].files.length > 0) {
                //
            }
        });

        ///////////////////////////////

        $("#type").change(function() {
            var option = $("#type").find(":selected").text();
            $('#options').empty();

            if (option == "Multiple choice") {
                for (let i = 1; i <= 3; i++) {
                    var option = $('<div>');
                    option.addClass('flex flex-row space-x-4 my-3 items-center option-div');

                    radio = $('<input>').attr({
                        type: 'radio',
                        id: 'option-' + i,
                        value: i,
                        name: 'answer'
                    }).appendTo(option);

                    $('<input>').attr({
                        type: 'text',
                        id: 'option-text',
                        placeholder: 'Option ' + i,
                        name: 'option-text-' + i,
                        class: 'w-full px-2 py-2 text-gray-700 bg-gray-200 rounded'
                    }).appendTo(option);

                    $("input[name=answer]:radio").prop('required', true);

                    option.appendTo('#options')
                }

            } else if(option == "Info") {
                $('<input>').attr({
                    type: 'file',
                    class: 'w-full px-2 py-2 text-gray-700 bg-gray-200 rounded',
                    name: 'file'
                }).appendTo('#options');
            }

        });




        const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
            draggable: 'tr',
            handle: '.cursor-move',
        });

        let oldQuestionsPosition = [];
        let newQuestionsPosition = [];

        document.querySelectorAll('.question').forEach((question, index) => {
            let q = question.id.split('-');
            oldQuestionsPosition.push(q[1]);
            newQuestionsPosition[q[0]] = q[1];
        });

        sortable.on('sortable:stop', () => {
            setTimeout(function() {
                questions = [];
                document.querySelectorAll('.question').forEach((question, index) => {
                    let q = question.id.split('-');
                    questions.push(q[0]);
                });

                newQuestionsPosition = [];
                for (let i = 0; i < questions.length; i++) {
                    newQuestionsPosition[questions[i]] = oldQuestionsPosition[i];
                }

                // console.log(questions, oldQuestionsPosition, newQuestionsPosition);

            }, 10);
        });

        function reorder() {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = route('questions.sort');
            params = {
                '_token': '{{ csrf_token() }}',
                'data': JSON.stringify(newQuestionsPosition),
                'exam_id': @json($exam->id)
            };

            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>

</x-app-layout>
