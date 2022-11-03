<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">
                @if (count($enrolments) > 0)
                    <div class="flex flex-col">
                        <p class="text-2xl font-bold w-full text-center">Enrolments</p>
                    </div>
                    <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                        <thead>
                            <tr class="flex text-md justify-around">
                                <th class="flex justify-center w-full">Teacher</th>
                                <th class="flex justify-center w-full">Student</th>
                                <th class="flex justify-center w-full">Enrolment Date</th>
                                <th class="flex justify-center w-full"></th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">

                            @foreach ($enrolments as $key => $value)
                                <tr class="flex justify-around">
                                    <td class="flex w-full justify-center">
                                        <a href="{{ route('profile.show', $value->teacher->id) }}"
                                            class="hover:underline hover:text-blue-500">{{ $value->teacher->first_name }}
                                            {{ $value->teacher->last_name }}</a>
                                    </td>
                                    <td class="flex w-full justify-center">
                                        <a href="{{ route('profile.show', $value->student->id) }}"
                                            class="hover:underline hover:text-blue-500">{{ $value->student->first_name }}
                                            {{ $value->student->last_name }}</a>
                                    </td>
                                    <td class="flex w-full justify-center cursor-pointer hover:underline">
                                        {{ $value->updated_at->format('d/m/Y - h:00 a') }}
                                    </td>
                                    <td class="flex w-full justify-center space-x-5">
                                        <a href="{{route('enrolments.edit', $value->id)}}">
                                            <i class="fas fa-edit text-gray-600"></i>
                                        </a>
                                        <a href="{{route('enrolments.destroy', $value->id)}}">
                                            <i class="fas fa-trash text-gray-600"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            {{ $enrolments->links() }}
                        </tbody>
                    </table>
                @else
                    <p class="text-2xl font-bold w-full text-center">There are no enrolments</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
