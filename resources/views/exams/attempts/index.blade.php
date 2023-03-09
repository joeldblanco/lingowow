<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                {{-- <a href="{{ route('exams.store') }}"
                    class="p-2 m-2 block border w-20 text-center rounded-md bg-gray-200 font-semibold hover:bg-gray-500 hover:text-white">
                    New
                </a> --}}
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                Username</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Exam</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Score</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                Date</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                            {{-- <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($attempts))
                            @foreach ($attempts as $attempt)
                                <tr class="hover:bg-gray-200">
                                    <td class="py-4 px-6 border-b border-gray-400">{{ $attempt->user->username }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        {{ $attempt->exam->title }}
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        {{ $attempt->score }}
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        {{ $attempt->created_at->isoFormat('L') }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        <a href="{{ route('attempt.show', $attempt->id) }}"
                                            class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">View</a>
                                    </td>
                                    {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                        <a href="{{ route('exams.show', $attempt->id) }}"
                                            class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">Edit</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="py-4 px-6 border-b border-gray-400"></td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center">There are no attempts</td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                                <td class="py-4 px-6 border-b border-gray-400 text-center"></td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
