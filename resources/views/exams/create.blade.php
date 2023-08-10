<x-app-layout>
    <div class="bg-white font-sans" x-data="{ import_create: true }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form action="{{ route('exams.store') }}" method="POST" id="exam-form">
                    @csrf
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="leading-loose">
                            <div id="create-questions-form"
                                class="max-w-xl m-4 p-10 bg-white rounded shadow-2xl space-y-4">
                                <div class="flex justify-between border-b mb-5 py-4 text-3xl">
                                    <h1 class="">New Exam</h1>
                                    {{-- <i class="fas fa-times cursor-pointer text-xl"></i> --}}
                                </div>
                                <div class="flex flex-col">
                                    <label for="passing_marks" class="text-sm">Min Score</label>
                                    <input type="number" name="passing_marks" id="passing_marks"
                                        class="w-1/4 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                        min="0" max="100" required>
                                </div>
                                <div class="flex flex-col">
                                    <label for="total_marks" class="text-sm">Max Score</label>
                                    <input type="number" name="total_marks" id="total_marks"
                                        class="w-1/4 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                        min="0" max="100" required>
                                </div>
                                <input type="text" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                    name="title" placeholder="Title" required>
                                <textarea name="description" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="" cols="30"
                                    rows="10" placeholder="Description"></textarea>
                                <select id="unit_id" class="w-3/4 px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                    name="unit_id">
                                    <option selected disabled hidden required>Unit</option>
                                    @foreach ($courses as $course)
                                        <option class="font-bold text-gray-400" disabled>{{ $course->name }}</option>
                                        @foreach ($modules->where('course_id', $course->id) as $module)
                                            <option class="font-bold text-gray-400" disabled>-{{ $module->name }}
                                            </option>
                                            @if (str_contains($course->name, 'Test') || $course->modality == 'asynchronous')
                                                @foreach ($module->units as $unit)
                                                    <option value="{{ $unit->id }}">--{{ $unit->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach ($module->units->nth(2, 1) as $unit)
                                                    <option value="{{ $unit->id }}">--{{ $unit->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <option disabled></option>
                                    @endforeach
                                </select>
                                <div class="flex flex-col">
                                    <label for="duration" class="text-sm">Duration (min)</label>
                                    <input type="number" name="duration" id="duration"
                                        class="w-1/4 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                        min="0" max="100" required>
                                </div>
                                <select id="status" class="w-3/4 px-2 py-2 text-gray-700 bg-gray-200 rounded"
                                    name="status">
                                    <option selected disabled hidden required>Status</option>
                                    <option value="0" selected>Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <div class="flex pt-4 justify-end space-x-3">
                                    <a href="{{ url()->previous() }}"
                                        class="px-4 py-1 text-white font-light tracking-wider bg-red-600 hover:bg-red-700 rounded cursor-pointer">Cancel</a>
                                    <button
                                        class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded">Create</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
