<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
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
                                Student's answer</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Correct answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($questions) > 0)
                            @foreach ($questions as $question)
                                <tr>
                                    {{-- {{dd($answers[$loop->index][0],$answers[$loop->index][1])}} --}}
                                    <td class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400">
                                        {{ $question->value }}</td>
                                    <td
                                        class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        {{ $question->description }}</td>
                                    <td
                                        class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        {{ $question->type }}</td>
                                    @if (array_key_exists($loop->index, $answers) && $question->type == 'multiple-choice')
                                        {{-- {{dd(json_decode($question->data,1)["options"])}} --}}
                                        @if ($answers[$loop->index][0] == $answers[$loop->index][1])
                                            <td
                                                class="py-4 px-6 uppercase text-sm bg-green-100 text-gray-600 border-b border-gray-400 text-center">
                                                @if ($answers[$loop->index][1] != -1)
                                                    {{ json_decode($question->data, 1)['options']['option-text-' . strval($answers[$loop->index][1])] }}
                                                @else
                                                    n/a
                                                @endif
                                            </td>
                                            <td
                                                class="py-4 px-6 uppercase text-sm bg-green-100 text-gray-600 border-b border-gray-400 text-center">
                                                {{ json_decode($question->data, 1)['options']['option-text-' . strval($answers[$loop->index][0])] }}
                                            </td>
                                        @else
                                            <td
                                                class="py-4 px-6 uppercase text-sm bg-red-100 text-gray-600 border-b border-gray-400 text-center">
                                                @if ($answers[$loop->index][1] != -1)
                                                    {{ json_decode($question->data, 1)['options']['option-text-' . strval($answers[$loop->index][1])] }}
                                                @else
                                                    n/a
                                                @endif
                                            </td>
                                            <td
                                                class="py-4 px-6 uppercase text-sm bg-red-100 text-gray-600 border-b border-gray-400 text-center">
                                                {{ json_decode($question->data, 1)['options']['option-text-' . strval($answers[$loop->index][0])] }}
                                            </td>
                                        @endif
                                    @else
                                        <td
                                            class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            @hasanyrole('teacher|admin')
                                                @if ($question->type == 'essay')
                                                    <a href="{{route('attempt.show_question',[$attempt->id,$question->id])}}" class="font-bold text-xl"><i class="fas fa-edit"></i></a>
                                                @endif
                                            @endhasanyrole
                                        </td>
                                        <td
                                            class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center py-5">This exam has no questions</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                <p class="pt-4 text-gray-600 uppercase font-bold">Score: {{ $result }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
