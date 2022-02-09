<x-app-layout>
    <div class="bg-white font-sans" x-data="{create_question: false, import_create: true}" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form action="{{route('exam.store')}}" enctype="multipart/form-data" method="POST" id="exam-form" x-show="create_question">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="create-questions-form" class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">Create Question</h1>
                                    <i class="fas fa-times cursor-pointer text-xl"></i>
                                </div>
                                <div class="flex flex-col">
                                    <label for="question-value" class="text-sm">Question Value</label>
                                    <input type="number" name="question-value" id="question-value" value="question-value" class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0" min="0" max="100" required>
                                </div>
                                <select id="question-type" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="question-type">
                                    <option selected disabled hidden required>Type</option>
                                    <option value="info">Info</option>
                                    <option value="multiple-choice">Multiple choice</option>
                                    <option value="essay">Essay</option>
                                </select>
                                <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description" style="resize: none" rows="4" name="question-description" required></textarea>
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
                <div class="flex w-full space-x-12 justify-evenly" x-show="import_create">
                    <button class="w-52 text-center border rounded-md p-4">Import</button>
                    <button class="w-52 text-center border rounded-md p-4" >Create</button>
                </div>
                @php
                    $questions = [];
                    // dd($last_exam);
                @endphp
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">ID</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Unit</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Status</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Created at</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($questions))
                        @foreach ($questions as $question)
                            <tr class="hover:bg-gray-200">

                                <td class="py-4 px-6 border-b border-gray-400">{{$question->id}}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">{{$question->unit_id}}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">@if($question->deleted_at != NULL) Active @else Inactive @endif</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">{{$exam->created_at->isoFormat('L')}}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{route('exam.show',$exam->id)}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">View</a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{route('exam.edit',$exam->id)}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="py-4 px-6 border-b border-gray-400"></td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center">There are no questions</td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
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
    </script>
</x-app-layout>