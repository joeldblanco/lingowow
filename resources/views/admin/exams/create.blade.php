<x-app-layout>
    <div class="bg-white font-sans" x-data="{ import_create: true }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                {{-- <div class="flex w-full space-x-12 justify-evenly" x-show="import_create">
                    <a href="{{ route('questions.create', ['method' => 'import']) }}"
                        class="w-52 text-center border rounded-md p-4">Import</a>
                    <a href="{{ route('questions.create', ['method' => 'create']) }}"
                        class="w-52 text-center border rounded-md p-4">Create</a>
                </div>
                @php
                    $questions = [];
                @endphp
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                ID</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Unit</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Status</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Created at</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($questions))
                            @foreach ($questions as $question)
                                <tr class="hover:bg-gray-200">

                                    <td class="py-4 px-6 border-b border-gray-400">{{ $question->id }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        {{ $question->unit_id }}
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        @if ($question->deleted_at != null)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        {{ $exam->created_at->isoFormat('L') }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        <a href="{{ route('exam.show', $exam->id) }}"
                                            class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">View</a>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        <a href="{{ route('exam.edit', $exam->id) }}"
                                            class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">Edit</a>
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
                </table> --}}

                <form action="{{ route('exam.store') }}" enctype="multipart/form-data" method="POST" id="exam-form">
                    @csrf
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="create-questions-form"
                                class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-1">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">New Exam</h1>
                                    <i class="fas fa-times cursor-pointer text-xl"></i>
                                </div>
                                <div class="flex flex-col">
                                    <label for="min_score" class="text-sm">Min Score</label>
                                    <input type="number" name="min_score" id="min_score" value="min_score"
                                        class="w-1/2 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                        min="0" max="100" required>
                                </div>
                                <select id="unit_id" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                    name="unit_id">
                                    <option selected disabled hidden required>Unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description" style="resize: none"
                                    rows="4" name="question-description" required></textarea>
                                <div id="options"> --}}

                                <div class="flex pt-4 justify-end">
                                    <button
                                        class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Create</button>
                                </div>

                            </div>

                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
    </div>
</x-app-layout>
