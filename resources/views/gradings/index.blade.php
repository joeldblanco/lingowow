<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="bg-white w-full border border-gray-300 rounded-lg p-6 divide-y divide-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <p class="font-bold text-2xl">
                            Gradings
                        </p>
                        {{-- <p>
                            <a href="{{ route('meetings.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Meeting
                            </a>
                        </p> --}}
                    </div>
                    <div class="pt-6 w-full">
                        {{ $attempts->links() }}
                        <table class="table-auto text-left w-full border-collapse">
                            <thead>
                                <tr class="text-center">
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        Topic</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        User</th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    </th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    </th>
                                    <th
                                        class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($attempts) <= 0)
                                    <tr class="text-3xl font-bold">
                                        <td colspan="4" class="text-center">
                                            <div class="py-20 text-red-500">No gradings found</div>
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($attempts as $attempts_user)
                                    @foreach ($attempts_user as $attempt)
                                        <tr class="text-center">
                                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                {{ $attempt->exam->unit->name }}
                                            </td>
                                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                <a href="{{ route('profile.show', $attempt->user->id) }}"
                                                    class="hover:text-blue-500 hover:underline">{{ $attempt->user->first_name }}
                                                    {{ $attempt->user->last_name }}</a>
                                            </td>
                                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                <a href="{{ route('attempt.show', $attempt->id) }}"
                                                    class="hover:text-blue-600 hover:underline" target="_blank">
                                                    Review
                                                    <span class="text-xs">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                <a href="#">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                {{-- <form action="#"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        {{ $attempts->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
