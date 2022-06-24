<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <textarea id="essay-content" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Description"
                        style="resize: none" rows="4" name="essay-content" required>{{ $answer }}</textarea>
                    <input type="number" name="score" id="score" min="0" max="{{ $question['value'] }}" required>
                    <p>Max: {{ $question['value'] }}</p>
                    <input type="submit" value="Save" class="p-2">
                </form>


            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#essay-content',
            plugins: 'wordcount',
        });
    </script>
</x-app-layout>
