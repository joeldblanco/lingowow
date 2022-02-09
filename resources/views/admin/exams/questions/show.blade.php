<x-app-layout>
    <div class="bg-white font-sans" x-data="{create_question: false, import_create: true, questionList: true, error: @if(session('error')) true @else false @endif}" x-cloak>
        @if (session('error'))
            <div x-show="error; setTimeout(() => error = false, 3000)" x-transition.duration.100ms @click.outside="error=false" class="flex justify-center fixed bottom-5 left-5 z-20">
                <div class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-red-600 border-red-600 text-white">
                    <div>
                        {{session('error')}}
                    </div>
                    <div class="flex mt-2 sm:mt-0 sm:ml-4" @click="error = false">
                        <a class="px-3 py-2 hover:bg-red-700 transition ease-in-out duration-300 cursor-pointer">Dismiss</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form action="{{route('question.update',[$exam_id,$question->id])}}" enctype="multipart/form-data" method="POST" id="exam-form">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="create-questions-form" class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1" @click.outside="create_question=false">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">Edit Question</h1>
                                    <i class="fas fa-times cursor-pointer text-xl" @click="create_question=false"></i>
                                </div>
                                <div class="flex flex-col">
                                    <label for="question-value" class="text-sm">Question Value</label>
                                    <input type="number" name="question-value" id="question-value" value="question-value" class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="{{$question->value}}" min="0" max="100" required>
                                </div>
                                <select id="question-type" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="question-type">
                                    <option selected disabled hidden required>Type</option>
                                    <option value="info">Info</option>
                                    <option value="multiple-choice">Multiple choice</option>
                                    <option value="essay">Essay</option>
                                </select>
                                <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="{{$question->description}}" style="resize: none" rows="4" name="question-description" required></textarea>
                                <div id="options">

                                </div>
                                <div class="flex pt-4 justify-end">
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Create</button>
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
        $("#question-type").change(function(){
            var option = $("#question-type").find(":selected").text();
            $('#options').empty();

            if(option == "Multiple choice")
            {
                for (let i = 1; i <= 3; i++)
                {
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

                    $("#option").prop('required',true);

                    option.appendTo('#options')
                }

            }else{
                $('<input>').attr({
                    type: 'file',
                    class: 'w-full px-2 py-2 text-gray-700 bg-gray-200 rounded',
                    name: 'question-file'
                }).appendTo('#options');
            }

        });

        $("#question-type").val('{{$question->type}}').trigger('change');
    </script>
</x-app-layout>