<x-app-layout>
    <div class="bg-gray-50 font-sans" x-data="{ showTypes: false }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-gray-50 border-b border-gray-200">

                <div class="mt-10 mb-20">
                    <h2 class="text-3xl font-bold text-center text-gray-500 mb-3">{{ $unit->name }}</h2>
                    @if ($unit->course()->categories->pluck('name')->contains('Conversational'))
                        @hasanyrole('admin|teacher')
                            <div class="w-full flex justify-end relative mb-20">
                                <button @click="showTypes = true"
                                    class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700">
                                    Add
                                </button>
                                <button onclick="sendRequest()"
                                    class="bg-blue-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-blue-700">
                                    Reorder
                                </button>
                                <div class="absolute right-4 top-8" x-show="showTypes" @click.outside="showTypes = false">
                                    <div
                                        class="flex flex-col border border-gray-400 rounded-xl divide-y divide-opacity-100 divide-gray-300 bg-white">
                                        <a href="{{ route('contents.create', ['type' => 'embeddable', 'unit_id' => $unit->id]) }}"
                                            class="hover:bg-gray-200 p-2 rounded-xl"
                                            @click="showTypes = false">Embeddable</a>
                                        <a href="{{ route('contents.create', ['type' => 'url', 'unit_id' => $unit->id]) }}"
                                            class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Url</a>
                                        <a href="{{ route('contents.create', ['type' => 'media', 'unit_id' => $unit->id]) }}"
                                            class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Media</a>
                                        {{-- <a href="{{ route('contents.create', ['type' => 'image', 'unit_id' => $unit->id]) }}"
                                    class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Image</a>
                                <a href="{{ route('contents.create', ['type' => 'video', 'unit_id' => $unit->id]) }}"
                                    class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Video</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endhasanyrole
                    @else
                        @role('admin')
                            <div class="w-full flex justify-end relative mb-20">
                                <button @click="showTypes = true"
                                    class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700">
                                    Add
                                </button>
                                <button onclick="sendRequest()"
                                    class="bg-blue-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-blue-700">
                                    Reorder
                                </button>
                                <div class="absolute right-4 top-8" x-show="showTypes" @click.outside="showTypes = false">
                                    <div
                                        class="flex flex-col border border-gray-400 rounded-xl divide-y divide-opacity-100 divide-gray-300 bg-white">
                                        <a href="{{ route('contents.create', ['type' => 'embeddable', 'unit_id' => $unit->id]) }}"
                                            class="hover:bg-gray-200 p-2 rounded-xl"
                                            @click="showTypes = false">Embeddable</a>
                                        <a href="{{ route('contents.create', ['type' => 'url', 'unit_id' => $unit->id]) }}"
                                            class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Url</a>
                                        <a href="{{ route('contents.create', ['type' => 'media', 'unit_id' => $unit->id]) }}"
                                            class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Media</a>
                                        {{-- <a href="{{ route('contents.create', ['type' => 'image', 'unit_id' => $unit->id]) }}"
                            class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Image</a>
                        <a href="{{ route('contents.create', ['type' => 'video', 'unit_id' => $unit->id]) }}"
                            class="hover:bg-gray-200 p-2 rounded-xl" @click="showTypes = false">Video</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endrole
                    @endif
                    <table class="w-2/3 mx-auto">
                        <tbody>
                            @foreach ($unit->contents->sortBy('order') as $content)
                                <tr class="w-full flex justify-around my-10 shadow-2xl p-4 rounded-lg bg-white content"
                                    x-data="{ trash: true, deleteConfirmation: false }" x-cloak id="{{ $content->id }}-{{ $content->order }}">
                                    <td class="flex w-full justify-around items-center">
                                        <div class="w-10/12">
                                            @php
                                                $unit_content = json_decode($content->content);
                                                $mimeType = '';
                                                if ($unit_content->type == 'media') {
                                                    $mimeType = explode('/', Storage::mimeType($unit_content->media_url))[0];
                                                }
                                            @endphp

                                            @if ($unit_content->type == 'embeddable')
                                                <div class="flex justify-center">
                                                    @php
                                                        echo $unit_content->embeddable;
                                                    @endphp
                                                </div>
                                            @endif

                                            @if ($unit_content->type == 'url')
                                                <div class="flex justify-center">
                                                    <a class="flex flex-row items-center text-blue-300 font-bold hover:text-blue-600 hover:underline"
                                                        target="_blank" href="{{ $unit_content->link_url }}">
                                                        <i class="fas fa-link mr-2 text-gray-600"></i>
                                                        {{ $unit_content->link_title }}
                                                        <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                                    </a>
                                                </div>
                                            @endif

                                            @if ($mimeType == 'audio')
                                                <div class="flex justify-center">
                                                    <audio controls="controls" controlslist="nodownload">
                                                        <source src="{{ Storage::url($unit_content->media_url) }}">
                                                    </audio>
                                                </div>
                                            @endif

                                            @if ($mimeType == 'image')
                                                <div class="flex justify-center">
                                                    <img src="{{ Storage::url($unit_content->media_url) }}">
                                                </div>
                                            @endif

                                            @if ($mimeType == 'video')
                                                <video class="w-full" style="max-height: calc(100vh - 10rem)" controls
                                                    controlslist="nodownload">
                                                    <source src="{{ Storage::url($unit_content->media_url) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>
                                        @if ($unit->course()->categories->pluck('name')->contains('Conversational'))
                                            @hasanyrole('admin|teacher')
                                                <div class="flex space-x-4">
                                                    <a href="{{ route('contents.edit', $content->id) }}" title="Edit"><i
                                                            class="fas fa-pen m-1"></i></a>
                                                    <button @click="trash = false, deleteConfirmation = true" title="Delete"
                                                        x-show="trash"><i class="fas fa-trash m-1"></i></button>
                                                    <form action="{{ route('contents.destroy', $content->id) }}"
                                                        x-show="deleteConfirmation" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-500 hover:text-red-600 font-bold">
                                                            <i class="fas fa-check m-1"></i>
                                                        </button>
                                                    </form>
                                                    <button title="Reorder" class="ml-8 cursor-move">
                                                        <i class="fas fa-grip-lines"></i>
                                                    </button>
                                                </div>
                                            @endhasanyrole
                                        @endif
                                        @role('admin')
                                            <div class="flex space-x-4">
                                                <a href="{{ route('contents.edit', $content->id) }}" title="Edit"><i
                                                        class="fas fa-pen m-1"></i></a>
                                                <button @click="trash = false, deleteConfirmation = true" title="Delete"
                                                    x-show="trash"><i class="fas fa-trash m-1"></i></button>
                                                <form action="{{ route('contents.destroy', $content->id) }}"
                                                    x-show="deleteConfirmation" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-gray-500 hover:text-red-600 font-bold">
                                                        <i class="fas fa-check m-1"></i>
                                                    </button>
                                                </form>
                                                <button title="Reorder" class="ml-8 cursor-move">
                                                    <i class="fas fa-grip-lines"></i>
                                                </button>
                                            </div>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <h2 style="text-align: center;">Forum</h2>
                    <div class="flex justify-center">
                        <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick=""
                            href="{{ $unit->forum_url }}">
                            <img src="https://campus.theuttererscorner.com/theme/image.php/moove/forum/1627123195/icon"
                                class="iconlarge activityicon mr-2" width="24" height="24" alt=""
                                role="presentation" aria-hidden="true">
                            <span class="instancename">{{ $unit->forum_name }} - {{ $unit->unit_name }}<span
                                    class="accesshide "></span></span>
                        </a>
                    </div> --}}


                </div>
                <hr />
                {{-- @php
                    dd($activities->count());
                    
                @endphp --}}
                @if ($activities->count() > 0)
                    <div class="mt-10 mb-20">
                        <div class="text-3xl font-bold text-left text-gray-400 flex space-x-6 items-center">
                            <i class="fas fa-tasks"></i>
                            <h2>Activities</h2>
                        </div>
                        <br>
                        <ul class="ul-list-activities">
                            @foreach ($activities as $key => $activity)
                                <li class="li-list-activities">
                                    <a class="list-activity" href="{{ $unit->id }}/activity/{{ $activity->id }}"
                                        style="color: blueviolet;">{{ $activity->name }}</a>
                                    <div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/sortable.js"></script>
    <script>
        const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
            draggable: 'tr',
            handle: '.cursor-move',
        });

        let oldContentsPosition = [];
        let newContentsPosition = [];

        document.querySelectorAll('.content').forEach((content, index) => {
            let m = content.id.split('-');
            oldContentsPosition.push(m[1]);
            newContentsPosition[m[0]] = m[1];
        });

        sortable.on('sortable:stop', () => {
            setTimeout(function() {
                contents = [];
                document.querySelectorAll('.content').forEach((content, index) => {
                    let m = content.id.split('-');
                    contents.push(m[0]);
                });

                newContentsPosition = [];
                for (let i = 0; i < contents.length; i++) {
                    newContentsPosition[contents[i]] = oldContentsPosition[i];
                }

            }, 10);
        });

        function sendRequest() {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = route('contents.sort');
            params = {
                '_token': '{{ csrf_token() }}',
                'data': JSON.stringify(newContentsPosition),
                'unit_id': @json($unit->id)
            };

            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>

    @role('guest')
        <x-shepherd-tour tourName="guests/contents_preview" role="guest" />
    @endrole

    @role('teacher')
        <x-shepherd-tour tourName="teachers/contents_preview" role="teacher" />
    @endrole

</x-app-layout>
