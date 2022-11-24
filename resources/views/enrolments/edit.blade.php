<x-app-layout>
    {{-- <livewire:enrolment-edition :enrolment="$enrolment" /> --}}
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('enrolments.update', $enrolment->id) }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    @method('PATCH')
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            Edit Enrolment
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Teacher</p>
                                <select name="teacher_id" id="teacher_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('teacher_id')) border-red-600 @else border-gray-300 @endif">
                                    @if ($enrolment->teacher)
                                        <option value="{{ $enrolment->teacher->id }}" selected hidden>
                                            {{ $enrolment->teacher->first_name }} {{ $enrolment->teacher->last_name }}
                                        </option>
                                    @else
                                        <option value="none" selected disabled hidden>Select a teacher</option>
                                    @endif
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->first_name . ' ' . $teacher->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-gray-500 text-sm font-light">Please select a teacher</p>
                            </div>
                            @if ($enrolment->student)
                                <div class="py-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Student</p>
                                    <select name="student_id" id="student_id" required
                                        class="w-full rounded-md p-3 text-gray-600 @if ($errors->has('student_id')) border-red-600 @else border-gray-300 @endif">
                                        <option value="{{ $enrolment->student->id }}" selected hidden>
                                            {{ $enrolment->student->first_name }} {{ $enrolment->student->last_name }}
                                        </option>
                                    </select>
                                    {{-- <p class="text-gray-500 text-sm font-light">Please select a teacher</p> --}}
                                </div>
                            @endif
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Course</p>
                                <select name="course_id" id="course_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('course_id')) border-red-600 @else border-gray-300 @endif">
                                    @if ($enrolment->course)
                                        <option value="{{ $enrolment->course->id }}" selected hidden>
                                            {{ $enrolment->course->name }}
                                        </option>
                                    @else
                                        <option value="none" selected disabled hidden>Select a course</option>
                                    @endif
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-gray-500 text-sm font-light">Please select a course</p>
                            </div>
                            {{-- NEED TO BE ABLE TO SELECT UNIT FOR STUDENTS --}}
                            <div class="py-2 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Unit</p>
                                <select name="unit_id" id="unit_id"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('unit_id')) border-red-600 @else border-gray-300 @endif">
                                    @if ($enrolment->student->units->first())
                                        <option value="{{ $enrolment->student->id }}" selected disabled hidden>
                                            {{ $enrolment->student->units->first()->name }}
                                        </option>
                                    @else
                                        <option value="none" selected disabled hidden>Select a unit</option>
                                    @endif
                                    @foreach ($enrolment->course->modules->pluck('units')->flatten() as $unit)
                                        <option value="{{ $unit->id }}">
                                            {{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('unit_id'))
                                    <p class="text-xs font-light text-red-600">Required</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a unit</p>
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
