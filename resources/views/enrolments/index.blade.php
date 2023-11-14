<x-app-layout>
    <div class="bg-white rounded-lg">
        <div class="flex flex-col justify-center w-full items-left border-b border-gray-300 space-y-4 p-6">
            <div class="flex justify-between w-full">
                <p class="text-xl font-bold w-full text-left">Enrolments</p>

                <a href="{{ route('enrolments.create') }}"
                    class="bg-lw-blue text-white py-2 px-4 rounded-md font-semibold hover:bg-blue-800">New</a>
            </div>
        </div>
        {{-- @forelse($enrolments) --}}
        <table class="flex flex-col w-full">
            <thead>
                <tr class="text-md py-3 px-6 flex justify-between">
                    <th class="text-left w-full">Teacher</th>
                    <th class="text-left w-full">Student</th>
                    <th class="text-left w-full">Course</th>
                    <th class="text-left w-full">Enrolment Date (Local)</th>
                    <th class="text-right w-1/3 justify-center"></th>
                </tr>
            </thead>
            <tbody>

                @forelse ($enrolments as $key => $enrolment)
                    <tr
                        class="flex justify-between py-3 border-t @if ($loop->last) border-b @endif border-gray-200 py-3 px-6">
                        @if ($enrolment->teacher)
                            <td class="flex w-full text-left">
                                <a href="{{ route('profile.show', $enrolment->teacher->id) }}"
                                    class="hover:underline hover:text-blue-500">{{ $enrolment->teacher->first_name }}
                                    {{ $enrolment->teacher->last_name }}</a>
                            </td>
                        @else
                            <td class="flex w-full text-left">
                                -
                            </td>
                        @endif
                        @if ($enrolment->student)
                            <td class="flex w-full text-left">
                                <a href="{{ route('profile.show', $enrolment->student->id) }}"
                                    class="hover:underline hover:text-blue-500">{{ $enrolment->student->first_name }}
                                    {{ $enrolment->student->last_name }}</a>
                            </td>
                        @else
                            <td class="flex w-full text-left">
                                -
                            </td>
                        @endif
                        <td class="flex w-full text-left">
                            <a href="{{ route('courses.show', $enrolment->course->id) }}"
                                class="hover:underline hover:text-blue-500">
                                {{ $enrolment->course->name }}</a>
                        </td>
                        <td class="flex w-full text-left cursor-pointer hover:underline">
                            {{ $enrolment->updated_at->setTimezone(auth()->user()->timezone)->format('d/m/Y - h:00 a') }}
                        </td>
                        <td class="flex w-1/3 text-left space-x-5" x-data="{ trash: true, deleteConfirmation: false }" x-cloak>
                            <a href="{{ route('enrolments.edit', $enrolment->id) }}">
                                <i class="fas fa-edit text-gray-600"></i>
                            </a>
                            <button @click="trash = false, deleteConfirmation = true" x-show="trash">
                                <i class="fas fa-trash text-gray-600"></i></button>
                            <form action="{{ route('enrolments.destroy', $enrolment->id) }}" method="POST"
                                x-show="deleteConfirmation" @click.outside="deleteConfirmation=false, trash = true">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-check m-1 text-red-500"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="my-20">
                        <p class="text-2xl font-bold w-full text-center text-gray-600">There are no enrolments</p>
                    </div>
                @endforelse

                {{-- {{ $enrolments->links() }} --}}
            </tbody>
        </table>
        {{-- @empty --}}
        {{-- <div class="my-20">
                <p class="text-2xl font-bold w-full text-center text-gray-600">There are no enrolments</p>
            </div> --}}
        {{-- @endforlese --}}
        {{-- </div> --}}
        <div class="px-4 py-8">
            {{ $enrolments->links('vendor.pagination.berrydashboard') }}
        </div>
    </div>
</x-app-layout>
