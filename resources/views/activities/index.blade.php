<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="w-full flex justify-end p-4">
                    <a href="{{ route('activities.create') }}"
                        class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded hover:bg-white hover:text-black border hover:border-black transition-all">Create</a>
                </div>

                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                ID</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                UNIT ID</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                COURSE</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                TYPE</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                STATUS</th>
                            {{-- <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                CREATED AT</th> --}}
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr class="hover:bg-gray-200">
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->id }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->unit_id }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->unit->module->course->name }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->type }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->status }}</td>
                                {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->created_at }}</td> --}}
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{ route('activities.show', $activity->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400">
                                    <a href="{{ route('activities.edit', $activity->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400">
                                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
