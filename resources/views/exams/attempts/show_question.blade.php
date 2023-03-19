<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 sm:px-20 bg-gray-50 border border-gray-200 mt-10 rounded-md">

                <p class="text-xl mb-2">{!! $question->description !!}</p>

                <form method="POST" action="{{ route('attempt.manualCorrection') }}">
                    @csrf

                    @if ($question->type == 'essay')
                        <textarea id="essay_content" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description"
                            style="resize: none" rows="4" name="answer">{{ $answer->answer }}</textarea>
                        <div class="flex w-full justify-end">
                            <div class="flex flex-col space-y-4 pt-5">
                                <div>
                                    <input type="hidden" value="{{ $attempt_id }}" name="attempt_id" id="attempt_id"
                                        required>
                                    <input type="hidden" value="{{ $question->id }}" name="question_id"
                                        id="question_id" required>
                                    <input type="number" name="score" id="score" min="0"
                                        max="{{ $question->marks }}" value="{{ $answer->score }}" required>
                                    <p class="italic text-gray-400 text-right">Max: {{ $question->marks }}</p>
                                </div>
                                <input
                                    class="py-2 px-4 rounded-md bg-lw-blue text-white font-bold cursor-pointer hover:bg-blue-800"
                                    type="submit" value="Save" class="p-2">
                            </div>
                        </div>
                    @elseif($question->type == 'speaking')
                        <div class="flex w-full justify-end">
                            <div class="flex flex-col space-y-4 pt-5">
                                <div>
                                    <input type="hidden" value="{{ $attempt_id }}" name="attempt_id" id="attempt_id"
                                        required>
                                    <input type="hidden" value="{{ $question->id }}" name="question_id"
                                        id="question_id" required>
                                    <input type="number" name="score" id="score" min="0"
                                        max="{{ $question->marks }}" value="{{ $answer->score }}" required>
                                    <p class="italic text-gray-400 text-right">Max: {{ $question->marks }}</p>
                                </div>
                                <input
                                    class="py-2 px-4 rounded-md bg-lw-blue text-white font-bold cursor-pointer hover:bg-blue-800"
                                    type="submit" value="Save" class="p-2">
                            </div>
                        </div>
                    @endif
                </form>


            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#essay_content',
            plugins: ['wordcount', 'code'],
        });
    </script>
</x-app-layout>
