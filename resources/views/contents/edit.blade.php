<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200" x-data="{ fileExplorer: false }" x-cloak>
                <div>
                    @if ($content->content->type == 'embeddable')

                        <form method="POST" action="{{ route('contents.update', $content->id) }}"
                            class="bg-white rounded-md p-6 my-4 mx-auto border border-gray-400">
                            @csrf
                            @method('PATCH')

                            <div class="divide-y">
                                <p class="font-bold text-2xl mb-6">
                                    Edit Content
                                </p>
                                <input type="hidden" name="type" value="{{ $content->content->type }}">
                                <input type="hidden" name="unit_id" value="{{ $content->unit->id }}">


                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Embeddable data</p>
                                    <textarea name="embeddable_data" id="embeddable_data" required
                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('embeddable_data')) border-red-600 @else border-gray-300 @endif">{{ $content->content->embeddable }}</textarea>
                                    @if ($errors->has('embeddable_data'))
                                        <p class="text-xs font-light text-red-600">
                                            {{ $errors->get('embeddable_data')[0] }}</p>
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


                            </div>
                            <div class="w-full flex justify-end">
                                <button id="saveButton"
                                    class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                    Save
                                </button>
                            </div>
                        </form>

                    @endif

                    @if ($content->content->type == 'url')
                        <form method="POST" action="{{ route('contents.update', $content->id) }}" {{-- enctype="multipart/form-data" --}}
                            class="bg-white rounded-md p-6 my-4 mx-auto border border-gray-400">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="type" value="{{ $content->content->type }}">
                            <input type="hidden" name="unit_id" value="{{ $content->unit->id }}">

                            <div class="divide-y">
                                <p class="font-bold text-2xl mb-6">
                                    New Content
                                </p>
                                <div>
                                    @if ($content->content->type == 'url')
                                        <div class="py-6 space-y-1">
                                            <p class="font-bold text-gray-600 mb-1">Link title</p>
                                            <input type="text" name="link_title" id="link_title"
                                                value="{{ $content->content->link_title }}" required
                                                class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('link_title')) border-red-600 @else border-gray-300 @endif">
                                            @if ($errors->has('link_title'))
                                                <p class="text-xs font-light text-red-600">
                                                    {{ $errors->get('link_title')[0] }}</p>
                                            @endif
                                            <p class="text-gray-500 text-sm font-light">Enter link title</p>
                                        </div>
                                        <div class="py-6 space-y-1">
                                            <p class="font-bold text-gray-600 mb-1">URL</p>
                                            <input type="text" name="link_url" id="link_url"
                                                value="{{ $content->content->link_url }}" required
                                                class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('link_url')) border-red-600 @else border-gray-300 @endif">
                                            @if ($errors->has('link_url'))
                                                <p class="text-xs font-light text-red-600">
                                                    {{ $errors->get('link_url')[0] }}
                                                </p>
                                            @endif
                                            <p class="text-gray-500 text-sm font-light">Enter url</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="w-full flex justify-end">
                                    <button
                                        class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                        Save
                                    </button>
                                </div>
                        </form>
                    @endif

                    @if ($content->content->type == 'media')
                        <div class="py-6 space-y-1 w-full">
                            {{-- <p class="font-bold text-gray-600 mb-1">Media file</p> --}}
                            {{-- <input type="file" name="media_file" id="media_file" required class="hidden">
                                    <div class="flex flex-col justify-center items-center">
                                        <img id="image" src="" alt="preview image"
                                            class="object-none w-full max-h-56 hidden">

                                        <audio class="max-h-72 hidden" id="audio" controls="controls"
                                            controlslist="nodownload">
                                            <source src="">
                                        </audio>

                                        <video class="max-h-72 hidden" id="video" controls="controls"
                                            controlslist="nodownload">
                                            <source src="">
                                        </video>

                                        <button type="button" id="cancelButton"
                                            class="mt-4 hidden px-4 py-2 bg-red-600 text-white font-bold rounded-md hover:bg-red-800">Cancel</button>
                                    </div>

                                    <div class="p-10 flex justify-center w-full space-x-28" id="findOrUpload">
                                        <label for="media_file"
                                            class="text-6xl cursor-pointer rounded-md p-3 text-gray-400 @if ($errors->has('media_file')) border-red-600 @else border-gray-300 @endif"><i
                                                class="fas fa-upload"></i></label>
                                        <button type="button" @click="fileExplorer = true"
                                            class="text-6xl cursor-pointer rounded-md p-3 text-gray-400 @if ($errors->has('media_file')) border-red-600 @else border-gray-300 @endif"><i
                                                class="far fa-folder-open"></i></button>
                                        @if ($errors->has('media_file'))
                                            <p class="text-xs font-light text-red-600">
                                                {{ $errors->get('media_file')[0] }}</p>
                                        @endif
                                    </div> --}}













                            <form method="POST" action="{{ route('contents.update', $content->id) }}"
                                enctype="multipart/form-data" class="bg-white rounded-md mx-auto">
                                @csrf
                                @method('PATCH')
                                <div class="divide-y">
                                    {{-- <p class="font-bold text-2xl mb-6">
                                                New Content
                                            </p> --}}
                                    <input type="hidden" name="type" value="{{ $content->content->type }}">
                                    <div>

                                        <div class="py-6 space-y-1">
                                            <p class="font-bold text-gray-600 mb-1">Media file</p>
                                            <input type="file" name="new_media_file" id="new_media_file"
                                                class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('new_media_file')) border-red-600 @else border-gray-300 @endif">
                                            @if ($errors->has('new_media_file'))
                                                <p class="text-xs font-light text-red-600">
                                                    {{ $errors->get('new_media_file')[0] }}</p>
                                            @endif
                                            <p class="text-gray-500 text-sm font-light">Upload media file</p>

                                        </div>
                                        <div class="w-full flex justify-end">
                                            <button
                                                class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                            </form>





                            {{-- <p class="text-gray-500 text-sm font-light">Upload media file</p> --}}
                        </div>
                    @endif

                    <x-modal type="info" name="fileExplorer">
                        <x-slot name="title">
                            <p class="text-2xl font-bold">File explorer</p>
                        </x-slot>

                        <x-slot name="content">
                            <div class="border">
                                @php
                                    $files = File::allFiles(storage_path() . '/app/public');
                                    $relativePaths = [];
                                    foreach ($files as $file) {
                                        if (!str_contains($file->getRelativePath(), 'photos/users')) {
                                            $relativePaths[] = $file->getRelativePath();
                                        }
                                    }
                                    $relativePaths = array_unique($relativePaths);
                                @endphp

                                @foreach ($relativePaths as $relativePath)
                                    <p class="text-3xl text-gray-600 font-bold uppercase my-10">{{ $relativePath }}</p>
                                    <div class="grid grid-cols-4 gap-4 p-4">
                                        @foreach ($files as $file)
                                            {{-- {{dd(get_class_methods($file), $file->getPathname())}} --}}
                                            @if ($file->getRelativePath() == $relativePath)
                                                @if (str_contains(explode('/', File::mimeType($file->getPathname()))[0], 'image'))
                                                    <div @click="fileExplorer = false"
                                                        class="flex flex-col hover:bg-lw-yellow p-2 cursor-pointer justify-center media">
                                                        <img class="max-h-72"
                                                            src="{{ Storage::url($file->getRelativePathname()) }}"
                                                            name="{{ $file->getRelativePathname() }}">
                                                        <p>{{ $file->getBasename() }}</p>
                                                    </div>
                                                @elseif (str_contains(explode('/', File::mimeType($file->getPathname()))[0], 'audio'))
                                                    <div @click="fileExplorer = false"
                                                        class="flex flex-col hover:bg-lw-yellow p-2 cursor-pointer justify-center media">
                                                        <audio class="max-h-72" controls="controls"
                                                            controlslist="nodownload">
                                                            <source id="audioSrc"
                                                                src="{{ Storage::url($file->getRelativePathname()) }}"
                                                                name="{{ $file->getRelativePathname() }}">
                                                        </audio>
                                                        <p>{{ $file->getBasename() }}</p>
                                                    </div>
                                                @elseif (str_contains(explode('/', File::mimeType($file->getPathname()))[0], 'video'))
                                                    <div @click="fileExplorer = false"
                                                        class="flex flex-col hover:bg-lw-yellow p-2 cursor-pointer justify-center media">
                                                        <video class="max-h-72" controls="controls"
                                                            controlslist="nodownload">
                                                            <source id="videoSrc"
                                                                src="{{ Storage::url($file->getRelativePathname()) }}"
                                                                name="{{ $file->getRelativePathname() }}">
                                                        </video>
                                                        <p>{{ $file->getBasename() }}</p>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </x-slot>

                        <x-slot name="footer" class="justify-center">

                        </x-slot>
                    </x-modal>

                </div>
            </div>
        </div>

        @if ($content->content->type == 'embeddable')
            <script>
                function preview_embeddable() {
                    let embeddable_data = document.getElementById('embeddable_data');
                    let embeddable_preview = document.getElementById('embeddable_preview');
                    embeddable_preview.innerHTML = embeddable_data.value;
                    embeddable_data.classList.toggle('hidden');
                    embeddable_preview.classList.toggle('hidden');
                }

                preview_embeddable();
            </script>
        @elseif($content->content->type == 'media')
            <script type="text/javascript">
                $(document).ready(function(e) {
                    var data = [];
                    $('.media').click(function() {
                        let childNode = $(this).children('img')[0];

                        if (childNode == undefined) {
                            childNode = $(this).find('#audioSrc')[0];
                            if (childNode == undefined) {
                                childNode = $(this).find('#videoSrc')[0];
                                $('#video source').attr("src", childNode.src);
                                $('#findOrUpload').addClass('hidden');
                                $('#video').removeClass('hidden');
                                $('#cancelButton').removeClass('hidden');
                                $("#image").addClass('hidden');
                                $("#audio").addClass('hidden');
                                $('#video').load();
                                data = $(childNode).attr('name');
                            } else {
                                $('#audio source').attr("src", childNode.src);
                                $('#findOrUpload').addClass('hidden');
                                $('#audio').removeClass('hidden');
                                $('#cancelButton').removeClass('hidden');
                                $("#image").addClass('hidden');
                                $("#video").addClass('hidden');
                                $('#audio').load();
                                data = $(childNode).attr('name');
                            }
                        } else {
                            $('#image').attr('src', childNode.src);
                            $('#findOrUpload').addClass('hidden');
                            $('#audio').addClass('hidden');
                            $('#cancelButton').removeClass('hidden');
                            $("#image").removeClass('hidden');
                            $("#video").addClass('hidden');
                            data = $(childNode).attr('name');
                        }

                    });

                    $('#media_file').change(function() {

                        if (e.target.result.split(";")[0].includes("audio")) {
                            $('#audio').attr('src', e.target.result);
                            $('#audio').removeClass('hidden');

                            $('#findOrUpload').addClass('hidden');
                            $('#image').addClass('hidden');
                            $("#video").addClass('hidden');
                            $('#cancelButton').removeClass('hidden');

                        } else if (e.target.result.split(";")[0].includes("image")) {
                            $('#image').attr('src', e.target.result);
                            $('#image').removeClass('hidden');

                            $('#findOrUpload').addClass('hidden');
                            $('#audio').addClass('hidden');
                            $("#video").addClass('hidden');
                            $('#cancelButton').removeClass('hidden');

                        } else if (e.target.result.split(";")[0].includes("video")) {
                            $('#video').attr('src', e.target.result);
                            $('#video').removeClass('hidden');

                            $('#findOrUpload').addClass('hidden');
                            $('#audio').addClass('hidden');
                            $("#image").addClass('hidden');
                            $('#cancelButton').removeClass('hidden');
                        }

                        $("#post_content").attr('required', false);

                    });

                    $('#cancelButton').click(function() {
                        $('#findOrUpload').removeClass('hidden');
                        $('#audio').addClass('hidden');
                        $('#cancelButton').addClass('hidden');
                        $("#image").addClass('hidden');
                        $("#video").addClass('hidden');
                    });

                });
            </script>
        @endif


</x-app-layout>
