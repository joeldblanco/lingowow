<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('enrolments.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Enrolment
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
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
                                <p class="text-gray-500 text-sm font-light">Please select a teacher</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Course</p>
                                <select name="course_id" id="course_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('course_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-gray-500 text-sm font-light">Please select a course</p>
                            </div>
                            {{-- NEED TO BE ABLE TO SELECT MODULE & UNIT FOR STUDENTS --}}

                            {{-- <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Student</p>
                                <select name="student_id" id="student_id" {{-- required --}}
                            {{-- class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('student_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->first_name . ' ' . $student->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-gray-500 text-sm font-light">Please select a student</p>
                            </div> --}}
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
