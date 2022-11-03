<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-10 mb-20">
                    <h1 class="text-3xl font-bold text-center text-gray-500 mb-12">Modules
                        ({{ $course->modules->count() }})
                    </h1>

                    @role('admin')
                        <div class="w-full flex justify-end mb-6">
                            <a href="{{ route('modules.create') }}"
                                class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-lw-light_blue">+</a>
                        </div>
                    @endrole

                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Id</th> --}}
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 w-5/12">
                                    Module Name</th>
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 w-5/12">
                                    Order</th> --}}
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Role</th> --}}
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 w-2/12">
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->modules->sortBy('order') as $module)
                                <tr class="hover:bg-gray-200 module" id="{{ $module->id }}-{{ $module->order }}">
                                    {{-- <td class="py-4 px-6 border-b border-gray-400"><a
                                            href="{{ route('profile.show', $module->id) }}"
                                            class="hover:text-blue-600 hover:underline">{{ $module->id }}</a></td> --}}
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500">
                                        <div class="flex space-x-8 w-full items-center justify-evenly">
                                            <div class="w-2/12 text-gray-600">
                                                <img src="{{ Storage::url($module->module_image) }}" alt="Module Image">
                                            </div>
                                            <div class="w-full text-gray-600">
                                                <p class="text-lg font-bold">{{ $module->module_name }}</p>
                                                <p class="text-sm">{{ $module->module_description }}</p>
                                            </div>
                                            <div class="flex justify-end items-center">
                                                <a href="{{ route('modules.edit', $module->id) }}" title="Edit"><i
                                                        class="fas fa-cog m-1"></i></a>
                                                {{-- <a href="{{ route('modules.destroy', $module->id) }}" title="Delete"><i
                                                        class="fas fa-trash m-1"></i></a> --}}

                                                <form action="{{ route('modules.destroy', $module->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Delete"><i
                                                            class="fas fa-trash m-1"></i></button>
                                                </form>

                                                <button title="Reorder" class="ml-8 cursor-move">
                                                    <i class="fas fa-grip-lines"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td class="py-4 px-6 border-b border-gray-400">{{ $module->order }}</td> --}}
                                    {{-- <td class="py-4 px-6 border-b border-gray-400 capitalize">
                                        {{ $module->getRoleNames()->first() }}</td> --}}
                                    {{-- <td class="py-4 px-6 border-b border-gray-400 text-gray-500 flex justify-end">
                                        
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end my-2">
                        <button class="mt-4 px-4 py-2 bg-lw-blue rounded-lg text-white font-bold"
                            onclick="sendRequest()">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/sortable.js"></script>
    <script>
        const sortable = new Sortable.default(document.querySelectorAll('tbody'), {
            draggable: 'tr',
            handle: '.cursor-move',
        });

        let oldModulesPosition = [];
        let newModulesPosition = [];

        document.querySelectorAll('.module').forEach((module, index) => {
            let m = module.id.split('-');
            oldModulesPosition.push(m[1]);
            newModulesPosition[m[0]] = m[1];
        });

        sortable.on('sortable:stop', () => {
            setTimeout(function() {
                modules = [];
                document.querySelectorAll('.module').forEach((module, index) => {
                    let m = module.id.split('-');
                    modules.push(m[0]);
                });

                newModulesPosition = [];
                for (let i = 0; i < modules.length; i++) {
                    newModulesPosition[modules[i]] = oldModulesPosition[i];
                }

                // console.log(modules, oldModulesPosition, newModulesPosition);

            }, 10);
        });

        function sendRequest() {
            // console.log(newModulesPosition);
            const form = document.createElement('form');
            form.method = 'post';
            form.action = route('modules.sort');
            params = {
                '_token': '{{ csrf_token() }}',
                'data': JSON.stringify(newModulesPosition),
                'course_id': @json($course->id)
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
</x-app-layout>
