<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">

                <div class="flex">
                    <p class="text-2xl font-bold w-full text-center">Enrolments</p>
                    <a href="{{ route('enrolments.create') }}"
                        class="bg-lw-blue text-white py-2 px-4 rounded-md font-semibold hover:bg-blue-800">New</a>
                </div>
                @if (count($enrolments) > 0)
                    <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                        <thead>
                            <tr class="flex text-md justify-around">
                                <th class="flex justify-center w-full">Teacher</th>
                                <th class="flex justify-center w-full">Student</th>
                                <th class="flex justify-center w-full">Course</th>
                                <th class="flex justify-center w-full">Enrolment Date</th>
                                <th class="flex justify-center w-full"></th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">

                            @foreach ($enrolments as $key => $enrolment)
                                <tr class="flex justify-around">
                                    @if ($enrolment->teacher)
                                        <td class="flex w-full justify-center">
                                            <a href="{{ route('profile.show', $enrolment->teacher->id) }}"
                                                class="hover:underline hover:text-blue-500">{{ $enrolment->teacher->first_name }}
                                                {{ $enrolment->teacher->last_name }}</a>
                                        </td>
                                    @else
                                        <td class="flex w-full justify-center">
                                            -
                                        </td>
                                    @endif
                                    @if ($enrolment->student)
                                        <td class="flex w-full justify-center">
                                            <a href="{{ route('profile.show', $enrolment->student->id) }}"
                                                class="hover:underline hover:text-blue-500">{{ $enrolment->student->first_name }}
                                                {{ $enrolment->student->last_name }}</a>
                                        </td>
                                    @else
                                        <td class="flex w-full justify-center">
                                            -
                                        </td>
                                    @endif
                                    <td class="flex w-full justify-center">
                                        <a href="{{ route('courses.show', $enrolment->course->id) }}"
                                            class="hover:underline hover:text-blue-500">
                                            {{ $enrolment->course->name }}</a>
                                    </td>
                                    <td class="flex w-full justify-center cursor-pointer hover:underline">
                                        {{ $enrolment->updated_at->format('d/m/Y - h:00 a') }}
                                    </td>
                                    <td class="flex w-full justify-center space-x-5">
                                        <a href="{{ route('enrolments.edit', $enrolment->id) }}">
                                            <i class="fas fa-edit text-gray-600"></i>
                                        </a>
                                        <form action="{{ route('enrolments.destroy', $enrolment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fas fa-trash text-gray-600"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            {{ $enrolments->links() }}
                        </tbody>
                    </table>
                @else
                    <div class="my-20">
                        <p class="text-2xl font-bold w-full text-center text-gray-600">There are no enrolments</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
