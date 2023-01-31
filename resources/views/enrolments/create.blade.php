<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('enrolments.checkSchedule') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Enrolment
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Guest</p>
                                <select name="student_id" id="student_id"
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('student_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a guest</option>
                                    @foreach ($guests as $guest)
                                        <option value="{{ $guest->id }}">
                                            {{ $guest->first_name . ' ' . $guest->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-gray-500 text-sm font-light">Please select a student</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Teacher</p>
                                <select name="teacher_id" id="teacher_id"
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
                            <div class="pb-6 space-y-1 hidden" id="plan">
                                <p class="font-bold text-gray-600 mb-1">Plan (classes per week)</p>
                                <input type="number" name="plan" id="plan" value="0"
                                    class="w-3/12 px-2 py-2 text-gray-700 bg-gray-200 rounded" placeholder="0"
                                    min="0" max="99">
                                <p class="text-gray-500 text-sm font-light">Please select a plan</p>
                            </div>

                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <div class="bg-red-200 border border-red-400 w-full rounded-md p-5 text-red-500 space-y-4 hidden"
                            id="needsBillingAddress">
                            <p>
                                In order to make the payment, the student must complete their profile with their
                                billing
                                address.
                            </p>
                        </div>
                        <button
                            class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg"
                            id="saveButton">
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        $('#student_id').change(function() {
            $.ajax({
                type: 'POST',
                url: route('getUser'),
                data: {
                    id: this.value,
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(user) {
                    if (user.street == null || user.city == null || user.country == null || user
                        .zip_code == null) {
                        $('#needsBillingAddress').show();
                        $('#saveButton').hide();
                    } else {
                        $('#needsBillingAddress').hide();
                        $('#saveButton').show();
                    }
                },
                error: function(data) {
                    // console.log(data["responseText"]);
                }
            });

            $('#plan').show();

        });

        // $(document).ready(function() {
        //     $('#saveButton').click(function() {
        //         $('#saveButton').show();
        //     });
        // });
    </script>

</x-app-layout>
