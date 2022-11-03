<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-10 mb-20">
                    <h1 class="text-3xl font-bold text-center text-gray-500 mb-12">Units
                        ({{ $module->units->count() }})
                    </h1>

                    @role('admin')
                        <div class="w-full flex justify-end mb-6">
                            <a href="{{ route('units.create') }}"
                                class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-48 hover:bg-lw-light_blue">+</a>
                        </div>
                    @endrole

                    <table class="text-left w-2/3 border-collapse mx-auto">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 w-1/12">
                                    Unit Cover</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 w-5/12">
                                    Unit Name</th>
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
                            @foreach ($module->units->sortBy('order') as $unit)
                                <tr class="hover:bg-gray-200 unit" id="{{ $unit->id }}-{{ $unit->order }}">
                                    <td class="py-4 px-6 border-b border-gray-400">
                                        <div class="w-full text-gray-600">
                                            <img src="{{ Storage::url($unit->unit_image) }}" alt="Unit Image">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500">
                                        <div class="flex space-x-8 w-full items-center justify-evenly">
                                            <div class="w-full text-gray-600">
                                                <p class="text-xl font-bold">{{ $unit->unit_name }}</p>
                                            </div>
                                            <div class="flex justify-end items-center">
                                                <a href="{{ route('units.details', $unit->id) }}" title="Edit"><i
                                                        class="fas fa-cog m-1"></i></a>

                                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end my-2">
                        <button class="mt-4 px-4 py-2 bg-lw-blue rounded-lg text-white font-bold mr-48"
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

        let oldUnitsPosition = [];
        let newUnitsPosition = [];

        document.querySelectorAll('.unit').forEach((unit, index) => {
            let m = unit.id.split('-');
            oldUnitsPosition.push(m[1]);
            newUnitsPosition[m[0]] = m[1];
        });

        sortable.on('sortable:stop', () => {
            setTimeout(function() {
                units = [];
                document.querySelectorAll('.unit').forEach((unit, index) => {
                    let m = unit.id.split('-');
                    units.push(m[0]);
                });

                newUnitsPosition = [];
                for (let i = 0; i < units.length; i++) {
                    newUnitsPosition[units[i]] = oldUnitsPosition[i];
                }

                // console.log(units, oldUnitsPosition, newUnitsPosition);

            }, 10);
        });

        function sendRequest() {
            // console.log(newUnitsPosition);
            const form = document.createElement('form');
            form.method = 'post';
            form.action = route('units.sort');
            params = {
                '_token': '{{ csrf_token() }}',
                'data': JSON.stringify(newUnitsPosition),
                'module_id': @json($module->id)
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
