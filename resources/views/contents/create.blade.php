<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data"
                    class="bg-white rounded-md p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Content
                        </p>
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="unit_id" value="{{ $unit_id }}">
                        <div>
                            @if ($type == 'embeddable')
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Embeddable data</p>
                                    <textarea name="embeddable_data" id="embeddable_data" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('embeddable_data')) border-red-600 @else border-gray-300 @endif"></textarea>
                                    @if ($errors->has('embeddable_data'))
                                        <p class="text-xs font-light text-red-600">Required</p>
                                    @endif
                                    <div id="embeddable_preview" class="hidden w-full overflow-auto">

                                    </div>
                                    <div class="w-full flex justify-between">
                                        <p class="text-gray-500 text-sm font-light">Enter
                                            embeddable data</p>
                                        <button type="button"
                                            class="text-blue-500 text-sm font-light cursor-pointer hover:underline"
                                            onclick="preview_embeddable()">Preview embeddable</button>
                                    </div>
                                </div>
                            @endif

                            @if ($type == 'url')
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Link title</p>
                                    <input type="text" name="link_title" id="link_title" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('link_title')) border-red-600 @else border-gray-300 @endif">
                                    @if ($errors->has('link_title'))
                                        <p class="text-xs font-light text-red-600">Required</p>
                                    @endif
                                    <p class="text-gray-500 text-sm font-light">Enter link title</p>
                                </div>
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">URL</p>
                                    <input type="text" name="link_url" id="link_url" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('link_url')) border-red-600 @else border-gray-300 @endif">
                                    @if ($errors->has('link_url'))
                                        <p class="text-xs font-light text-red-600">Required</p>
                                    @endif
                                    <p class="text-gray-500 text-sm font-light">Enter url</p>
                                </div>
                            @endif

                            @if ($type == 'media')
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Media file</p>
                                    <input type="file" name="media_file" id="media_file" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('media_file')) border-red-600 @else border-gray-300 @endif">
                                    @if ($errors->has('media_file'))
                                        <p class="text-xs font-light text-red-600">Required</p>
                                    @endif
                                    <p class="text-gray-500 text-sm font-light">Upload media file</p>
                            @endif

                            {{-- @if ($type == 'video')
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Video file</p>
                                    <input type="file" name="media_file" id="media_file" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('media_file')) border-red-600 @else border-gray-300 @endif">
                                    @if ($errors->has('media_file'))
                                        <p class="text-xs font-light text-red-600">Required</p>
                                    @endif
                                    <p class="text-gray-500 text-sm font-light">Upload video file</p>
                            @endif

                            @if ($type == 'image')
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Video file</p>
                                    <input type="file" name="media_file" id="media_file" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('media_file')) border-red-600 @else border-gray-300 @endif">
                                    @if ($errors->has('media_file'))
                                        <p class="text-xs font-light text-red-600">Required</p>
                                    @endif
                                    <p class="text-gray-500 text-sm font-light">Upload video file</p>
                            @endif --}}

                        </div>
                        <div class="w-full flex justify-end">
                            <button class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                Save
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>

    @if ($type == 'embeddable')
        <script>
            function preview_embeddable() {
                let embeddable_data = document.getElementById('embeddable_data');
                let embeddable_preview = document.getElementById('embeddable_preview');
                embeddable_preview.innerHTML = embeddable_data.value;
                embeddable_data.classList.toggle('hidden');
                embeddable_preview.classList.toggle('hidden');
            }
        </script>
    @endif

</x-app-layout>
