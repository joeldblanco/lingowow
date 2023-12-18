<x-app-layout>
    <div x-data="{ showCommentsModal: false, classDetails: false }" class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">

                <form method="POST" action="{{ route('classes.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Class
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Enrolment</p>
                                <select name="enrolment_id" id="enrolment_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('enrolment_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select an enrolment</option>
                                    @foreach ($enrolments as $enrolment)
                                        <option value="{{ $enrolment->id }}">
                                            {{-- {{ $enrolment->id }} --}}
                                            @if (!empty($enrolment->teacher))
                                                {{ $enrolment->teacher->first_name . ' ' . $enrolment->teacher->last_name }}
                                            @endif
                                            @if (!empty($enrolment->teacher) && !empty($enrolment->student))
                                                -
                                            @endif
                                            @if (!empty($enrolment->student))
                                                {{ $enrolment->student->first_name . ' ' . $enrolment->student->last_name }}
                                            @endif
                                            ({{ $enrolment->course->name }})
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('teacher_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('teacher_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a teacher for the class</p>
                            </div>
                            {{-- <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Teacher</p>
                                <select name="teacher_id" id="teacher_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('teacher_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->first_name . ' ' . $teacher->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('teacher_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('teacher_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a teacher for the class</p>
                            </div>
                            <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Student</p>
                                <select name="student_id" id="student_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('student_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select an student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->first_name . ' ' . $student->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('student_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('student_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select an student for the meeting</p>
                            </div> --}}
                            <div class="pt-6 pb-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Date & Time ({{auth()->user()->timezone}})</p>
                                <input type="datetime-local" name="date_time" id="date_time"
                                    placeholder="Enter meeting date" step="60" {{-- min="{{ now() }}" --}}
                                    {{-- value="0000-00-00T00:00" --}} required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('date_time')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('student_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('student_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a meeting date and time ({{auth()->user()->timezone}})</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <button class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
