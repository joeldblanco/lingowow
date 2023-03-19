<x-app-layout>
    @php
        if ($question->marks == null) {
            $question->marks = 0;
        }
    @endphp
    <div class="bg-white font-sans" x-data="{ create_question: false, import_create: true, questionList: true, error: @if (session('error')) true @else false @endif }" x-cloak>
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

                <form action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data"
                    method="POST" id="exam-form">
                    @csrf
                    @method('PATCH')

                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="create-questions-form"
                                class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1"
                                @click.outside="create_question=false">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">Edit Question</h1>
                                    <i class="fas fa-times cursor-pointer text-xl" @click="create_question=false"></i>
                                </div>
                                <div class="flex flex-col">
                                    <label for="marks" class="text-sm">Question Value</label>
                                    <input type="number" name="marks" id="marks"
                                        class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                        placeholder="{{ $question->marks }}" min="0" max="100"
                                        value="{{ $question->marks }}" required>
                                </div>
                                <select id="type" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                    name="type" disabled>
                                    <option disabled hidden required>Type</option>
                                    <option value="info" @if ($question->type == 'info') selected @endif>Info
                                    </option>
                                    <option value="multiple-choice" @if ($question->type == 'multiple-choice') selected @endif>
                                        Multiple choice</option>
                                    <option value="essay" @if ($question->type == 'essay') selected @endif>Essay
                                    </option>
                                </select>
                                <select id="type" class="hidden" name="type">
                                    <option value="info" @if ($question->type == 'info') selected @endif>Info
                                    </option>
                                    <option value="multiple-choice" @if ($question->type == 'multiple-choice') selected @endif>
                                        Multiple choice</option>
                                    <option value="essay" @if ($question->type == 'essay') selected @endif>Essay
                                    </option>
                                </select>
                                <textarea id="description" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description"
                                    style="resize: none" rows="4" name="description" required>{{ $question->description }}</textarea>
                                @if ($question->type == 'multiple-choice')
                                    @php
                                        $options = json_decode($question->options, 1);
                                    @endphp
                                    <div id="options">
                                        @for ($i = 1; $i <= 3; $i++)
                                            <div class="flex flex-row space-x-4 my-3 items-center">
                                                <input type="radio" id="option-{{ $i }}" name="answer"
                                                    required value="{{ $i }}"
                                                    @if (!empty($question->answer) && $question->answer == $i) checked @endif>
                                                <input type="text" id="option-text-{{ $i }}"
                                                    value="{{ $options['option-text-' . $i] }}"
                                                    placeholder="Option {{ $i }}"
                                                    name="option-text-{{ $i }}"
                                                    class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" required>
                                            </div>
                                        @endfor
                                    </div>
                                @else
                                    <div id="options">
                                    </div>
                                @endif
                                <div class="flex pt-4 justify-end space-x-2">
                                    <a href="{{ url()->previous() }}"
                                        class="px-4 py-1 text-white font-light tracking-wider bg-red-600 hover:bg-red-700 rounded">Cancel</a>
                                    <button
                                        class="px-4 py-1 text-white font-light tracking-wider bg-green-700 hover:bg-green-800 rounded">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'wordcount',
        });
    </script>
    {{-- <script>
        $("#type").change(function() {
            var option = $("#type").find(":selected").text();
            $('#options').empty();

            if (option == "Multiple choice") {
                for (let i = 1; i <= 3; i++) {
                    var option = $('<div>');
                    option.addClass('flex flex-row space-x-4 my-3 items-center');

                    radio = $('<input>').attr({
                        type: 'radio',
                        id: 'option-text-' + i,
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

                    $("#option").prop('required', true);

                    option.appendTo('#options')
                }

            } else {
                $('<input>').attr({
                    type: 'file',
                    class: 'w-full px-2 py-2 text-gray-700 bg-gray-200 rounded',
                    name: 'file'
                }).appendTo('#options');
            }

        });

        // $("#type").val('{{ $question->type }}').trigger('change');
    </script> --}}
</x-app-layout>
