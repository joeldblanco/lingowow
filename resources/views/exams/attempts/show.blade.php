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
                        @forelse ($questions->sortBy('order') as $question)
                            <tr>
                                <td class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400">
                                    {{ $question->marks }}</td>
                                <td
                                    class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    {!! $question->description !!}</td>
                                <td
                                    class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    {{ $question->type }}</td>
                                @if ($question->type == 'multiple-choice')
                                    @if (empty($answers->where('question_id', $question->id)->first()->answer))
                                        <td
                                            class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center bg-red-100">
                                            —
                                        </td>
                                    @else
                                        @if ($answers->where('question_id', $question->id)->first()->answer == $question->answer)
                                            <td
                                                class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center bg-green-100">
                                                {{ json_decode($question->options, true)['option-text-' . $answers->where('question_id', $question->id)->first()->answer] }}
                                            </td>
                                        @else
                                            <td
                                                class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center bg-red-100">
                                                {{-- @if (!array_key_exists('option-text-' . $answers->where('question_id', $question->id)->first()->answer, json_decode($question->options, true)))
                                                    {{ dd($answers->where('question_id', $question->id)->first(), $question) }}
                                                @endif --}}
                                                {{ json_decode($question->options, true)['option-text-' . $answers->where('question_id', $question->id)->first()->answer] }}
                                            </td>
                                        @endif
                                    @endif
                                @endif
                                @if ($question->type == 'essay')
                                    <td class="py-4 px-6 uppercase text-gray-600 border-b border-gray-400 text-center">
                                        @php
                                            if (empty($answers->where('question_id', $question->id)->first())) {
                                                $answers->push(
                                                    new App\Models\Answer([
                                                        'question_id' => $question->id,
                                                        'answer' => '—',
                                                    ]),
                                                );
                                            } elseif (empty($answers->where('question_id', $question->id)->first()->answer)) {
                                                $answers->where('question_id', $question->id)->first()->answer = '—';
                                            }
                                        @endphp
                                        @if (!empty($answers->where('question_id', $question->id)->first()))
                                            {{ Str::limit(strip_tags($answers->where('question_id', $question->id)->first()->answer), 10, '...') }}
                                        @endif
                                    </td>
                                @endif
                                @if ($question->type == 'info' || $question->type == 'speaking')
                                    <td class="py-4 px-6 uppercase text-gray-600 border-b border-gray-400 text-center">
                                    </td>
                                @endif
                                <td
                                    class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    @if ($question->type == 'multiple-choice')
                                        @if (!empty($question->answer))
                                            {{ json_decode($question->options, true)['option-text-' . strval($question->answer)] }}
                                        @endif
                                    @endif
                                    @if (($question->type == 'essay' || $question->type == 'speaking') && !empty($answers->where('question_id', $question->id)->first()))
                                        {{ $answers->where('question_id', $question->id)->first()->score }}
                                        @hasanyrole('teacher|admin')
                                            <a
                                                href="{{ route('attempt.show_question', ['attempt_id' => $attempt->id, 'question_id' => $question->id]) }}">
                                                <i class="fas fa-edit text-lg"></i>
                                            </a>
                                        @endhasanyrole
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">This exam has no questions</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <p class="pt-4 text-gray-600 uppercase font-bold">Score: {{ $result }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
