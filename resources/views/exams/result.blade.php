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
                        @forelse ($questions as $question)
                            <tr>
                                <td class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400">
                                    {{ $question->marks }}</td>
                                <td
                                    class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    {{ $question->description }}</td>
                                <td
                                    class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    {{ $question->type }}</td>
                                @if ($question->type == 'multiple-choice')
                                    @if (!isset($answers[$question->id]))
                                        <td
                                            class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center bg-red-100">
                                            —
                                        </td>
                                    @else
                                        <td
                                            class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center @if ($answers[$question->id] == $question->answer) bg-green-100 @else bg-red-100 @endif">
                                            {{ $answers[$question->id] }}
                                        </td>
                                    @endif
                                @endif
                                @if ($question->type == 'essay')
                                    <td class="py-4 px-6 uppercase text-gray-600 border-b border-gray-400 text-center">
                                        @php
                                            if (empty($answers[$question->id])) {
                                                $answers[$question->id] = '—';
                                            }
                                        @endphp
                                        {{ Str::limit($answers[$question->id], 10, '...') }}
                                    </td>
                                @endif
                                @if ($question->type == 'info')
                                    <td class="py-4 px-6 uppercase text-gray-600 border-b border-gray-400 text-center">
                                    </td>
                                @endif
                                <td
                                    class="py-4 px-6 uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    @if ($question->type == 'multiple-choice')
                                        {{ json_decode($question->options, true)['option-text-' . strval($question->answer)] }}
                                    @endif
                                    @if ($question->type == 'essay' || $question->type == 'speaking')
                                        <a href="#">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>
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
