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
                                #</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                UNIT</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                COURSE</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                NAME</th>
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
                            @if (auth()->user()->getRoleNames()->first() == 'admin')
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                </th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                </th>
                            @endif


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $key => $activity)
                            <tr class="hover:bg-gray-200">
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $key + 1 }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->unit->unit_name }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->unit->group->module->course->course_name }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->name }}</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->status }}</td>
                                {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    {{ $activity->created_at }}</td> --}}
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a id="{{ $activity->id }}" href="" class="btn-assign">
                                        <i class="fas fa-hand-point-left"></i>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                    <a href="{{ route('activity.show', ['id_unit' => 1, 'id' => $activity->id]) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                @if (auth()->user()->getRoleNames()->first() == 'admin')
                                    <td class="py-4 px-6 border-b border-gray-400">
                                        <a href="{{ route('activity.edit', $activity->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400">
                                        {{-- <form action="{{ route('activities.destroy', $activity->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fas fa-trash"></i></button>
                                    </form> --}}
                                        <button id="{{ $activity->id }}" class="btn-act-delete"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="grid place-content-center">
                    @livewire('modal-users-menu')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
