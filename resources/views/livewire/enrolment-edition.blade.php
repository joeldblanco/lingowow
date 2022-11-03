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
                            <p class="font-bold text-gray-600 mb-1">Student</p>
                            <input type="text"
                                value="{{ $enrolment->student->first_name }} {{ $enrolment->student->last_name }}"
                                disabled class="w-full rounded-md p-3 text-gray-400 border-gray-300">
                            {{-- <p class="text-gray-500 text-sm font-light">Please enter meeting topic</p> --}}
                            <input type="text" name="user_id" id="user_id" value="{{ $enrolment->student->id }}"
                                hidden class="hidden">
                        </div>
                        <div class="py-2 space-y-1">
                            <p class="font-bold text-gray-600 mb-1">Teacher</p>
                            <input type="text"
                                value="{{ $enrolment->student->first_name }} {{ $enrolment->student->last_name }}"
                                disabled class="w-full rounded-md p-3 text-gray-400 border-gray-300">
                        </div>
                        <div class="py-2 space-y-1">
                            <p class="font-bold text-gray-600 mb-1">Course</p>
                            <select name="course_id" id="course" required
                                class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('course')) border-red-600 @else border-gray-300 @endif"
                                wire:model="course">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('course_id'))
                                <p class="text-xs font-light text-red-600">Required</p>
                            @endif
                            <p class="text-gray-500 text-sm font-light">Please select a course for the enrolment</p>
                        </div>
                        <div class="py-2 space-y-1">
                            <p class="font-bold text-gray-600 mb-1">Module</p>
                            <select required
                                class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('module')) border-red-600 @else border-gray-300 @endif"
                                wire:model="module">
                                @foreach ($this->modules as $module)
                                    <option value="{{ $module->id }}"
                                        @if ($module->id == $this->default_module->id) selected @endif>
                                        {{ $module->module_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('course_id'))
                                <p class="text-xs font-light text-red-600">Required</p>
                            @endif
                            <p class="text-gray-500 text-sm font-light">Please select a module for the
                                enrolment</p>
                        </div>
                        <div class="py-2 space-y-1">
                            <p class="font-bold text-gray-600 mb-1">Unit</p>
                            <select name="unit_id" id="unit_id" required
                                class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('unit')) border-red-600 @else border-gray-300 @endif"
                                wire:model="unit">
                                @foreach ($this->units as $unit)
                                    <option value="{{ $unit->id }}"
                                        @if ($unit->id == $this->default_unit->id) selected @endif>
                                        {{ $unit->unit_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('unit'))
                                <p class="text-xs font-light text-red-600">Required</p>
                            @endif
                            <p class="text-gray-500 text-sm font-light">Please select a unit for the enrolment</p>
                        </div>
                        {{-- <div class="py-2 space-y-1">
                            <p class="font-bold text-gray-600 mb-1">Atendee</p>
                            <select name="atendee_id" id="atendee_id" disabled
                                class="w-full rounded-md p-3 text-gray-400 @if ($errors->has('atendee_id')) border-red-600 @else border-gray-300 @endif">
                                <option value="{{ $enrolment->atendee->id }}" selected disabled hidden>
                                    {{ $enrolment->atendee->first_name . ' ' . $enrolment->atendee->last_name }}
                                </option>
                            </select>
                            @if ($errors->has('atendee_id'))
                                <p class="text-xs font-light text-red-600">Required</p>
                            @endif
                            <p class="text-gray-500 text-sm font-light">Please select a atendee for the meeting</p>
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
    <div wire:loading>
        @include('components.loading-state')
    </div>
</div>
