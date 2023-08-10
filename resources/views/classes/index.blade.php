<x-app-layout>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
    {{-- <livewire:classes-component :classes="$classes" :students="$students" :teachers="$teachers"/> --}}
    <div x-data="{ showCommentsModal: false, classDetails: false }" class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">
                {{-- @livewire('classes-component', ['page' => $page]) --}}
                <div x-data="{ showCommentsModal: false, classDetails: false }" id="classes_main">
                    <div class="flex justify-start w-full my-4 space-x-4">
                        <form action="{{ route('classes.index') }}">
                            <input autocomplete="off" value="{{ $start_date }}" type="text" id="start_date"
                                name="start_date"
                                class="text-gray-500 border-gray-300 rounded-lg hover:border-gray-400">
                            <input autocomplete="off" value="{{ $end_date }}" type="text" id="end_date"
                                name="end_date" class="text-gray-500 border-gray-300 rounded-lg hover:border-gray-400">
                            <button
                                class="bg-blue-700 rounded-md text-white py-2 px-4 hover:bg-blue-800">Search</button>
                        </form>
                    </div>
                    @if (count($classes) > 0)
                        <div class="flex justify-center w-full items-center my-8">
                            <div class="flex flex-col">
                                <p class="text-2xl font-bold w-full text-center">Classes</p>
                                {{-- @role('admin')
                                    <p class="text-xl w-full text-center text-gray-600">Classes pending review:
                                        {{ count($to_review_classes) }}</p>
                                @endrole --}}
                            </div>
                        </div>
                        {{-- <form action="{{ route('classes.check') }}" method="POST">
                            @csrf
                            @method('POST') --}}
                        <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                            <thead>
                                <tr class="flex text-md justify-around">
                                    @hasanyrole('student|admin')
                                        <th class="flex justify-center w-full">Teacher</th>
                                    @endhasanyrole
                                    @hasanyrole('teacher|admin')
                                        <th class="flex justify-center w-full">Student</th>
                                    @endhasanyrole
                                    <th class="flex justify-center w-full">Class Date</th>
                                    @hasanyrole('teacher|admin')
                                        <th class="flex justify-center w-full">Comments</th>
                                    @endhasanyrole
                                    {{-- @hasanyrole('teacher|admin')
                                            <th class="flex justify-center w-full">
                                                <input type="checkbox" onchange="selectAllTeacherCheckboxes(this)" />
                                            </th>
                                        @endhasanyrole
                                        @hasanyrole('student|admin')
                                            <th class="flex justify-center w-full">
                                                <input type="checkbox" onchange="selectAllStudentCheckboxes(this)" />
                                            </th>
                                        @endhasanyrole --}}
                                </tr>
                            </thead>
                            <tbody class="space-y-4">
                                {{ $classes->links() }}
                                @foreach ($classes as $key => $value)
                                    <tr
                                        class="flex justify-around @if (auth()->user()->getRoleNames()[0] == 'student' && empty($value->rating)) bg-yellow-100 @endif">
                                        @hasanyrole('student|admin')
                                            <td class="flex w-full justify-center">
                                                <a href="{{ route('profile.show', $value->teacher()->id) }}"
                                                    class="hover:underline hover:text-blue-500">{{ $value->teacher()->first_name }}
                                                    {{ $value->teacher()->last_name }}</a>
                                            </td>
                                        @endhasanyrole
                                        @hasanyrole('teacher|admin')
                                            <td class="flex w-full justify-center">
                                                <a href="{{ route('profile.show', $value->student()->id) }}"
                                                    class="hover:underline hover:text-blue-500">{{ $value->student()->first_name }}
                                                    {{ $value->student()->last_name }}</a>
                                            </td>
                                        @endhasanyrole
                                        @php
                                            $lesson_date = new Carbon\Carbon($value->start_date);
                                        @endphp
                                        @if ($lesson_date->lt(Carbon\Carbon::now()))
                                            <td class="flex w-full justify-center text-red-500 cursor-pointer hover:underline"
                                                @click="classDetails = true"
                                                wire:click="showClass({{ $value->id }})">
                                                {{ $lesson_date->format('d/m/Y - h:00 a') }}
                                            </td>
                                        @else
                                            <td class="flex w-full justify-center text-green-500 cursor-pointer hover:underline"
                                                @click="classDetails = true"
                                                wire:click="showClass({{ $value->id }})">
                                                {{ $lesson_date->format('d/m/Y - h:00 a') }}
                                            </td>
                                        @endif
                                        @hasanyrole('teacher|admin')
                                            <td class="flex w-full justify-center">
                                                <a href="{{ route('classes.details', $value->id) }}">
                                                    <i class="fas fa-edit text-gray-600"></i>
                                                </a>
                                            </td>
                                        @endhasanyrole
                                        {{-- @hasanyrole('teacher|admin')
                                                <td class="flex w-full justify-center">
                                                    <input type='hidden' value='0'
                                                        name='teacher_{{ $value->id }}'>
                                                    <input type="checkbox" class="teacher_checkbox"
                                                        name="teacher_{{ $value->id }}"
                                                        @if ($value->teacher_check) checked @endif />
                                                </td>
                                            @endhasanyrole
                                            @hasanyrole('student|admin')
                                                <td class="flex w-full justify-center">
                                                    <input type='hidden' value='0'
                                                        name='student_{{ $value->id }}'>
                                                    <input type="checkbox" class="student_checkbox"
                                                        name="student_{{ $value->id }}"
                                                        @if ($value->student_check) checked @endif />
                                                </td>
                                            @endhasanyrole --}}
                                    </tr>
                                @endforeach
                                {{-- {{ $classes->links() }} --}}
                            </tbody>
                        </table>
                        {{-- <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-lw-blue py-2 px-4 text-white rounded-md hover:bg-blue-800">
                                    Check/Uncheck
                                </button>
                            </div> --}}
                        {{-- </form> --}}
                    @else
                        <p class="text-2xl font-bold w-full text-center">There are no classes</p>
                    @endif
                    {{-- <div wire:loading wire:target="clearComment,saveComment,showClass,loadComment">
                        @include('components.loading-state')
                    </div> --}}


                    <x-modal type="info" name="classDetails">
                        <x-slot name="title">
                            Details
                        </x-slot>

                        <x-slot name="content">
                            @if ($current_class != null)
                                @php
                                    $current_class_teacher = $current_class->teacher();
                                    $current_class_student = $current_class->student();
                                @endphp
                                <p><span class="font-bold">Course:</span> {{ $enrolment->course->name }}</p>
                                <p><span class="font-bold">Teacher:</span> {{ $current_class_teacher->first_name }}
                                    {{ $current_class_teacher->last_name }}</p>
                                <p><span class="font-bold">Student:</span> {{ $current_class_student->first_name }}
                                    {{ $current_class_student->last_name }}</p>
                                <p><span class="font-bold">Class Date:</span> {{ $current_class->start_date }}</p>
                                {{-- <p><span class="font-bold">Did the professor teach the class?</span>
                                    @if ($current_class->teacher_check == 0)
                                        No
                                    @else
                                        Yes
                                    @endif
                                </p> --}}
                                <p><span class="font-bold">Did the student receive the class?</span>
                                    @if (empty($current_class->rating))
                                        No
                                    @else
                                        Yes
                                    @endif
                                </p>
                                {{-- <p><span class="font-bold">Recording:</span> {{App\Http\Controllers\ClassController::getRecordingUrl($current_class)}}</p> --}}
                            @endif
                        </x-slot>

                        <x-slot name="footer" class="justify-center">
                            @role('student')
                                @if (
                                    !empty($current_class) &&
                                        empty($current_class->rating) &&
                                        App\Http\Controllers\ApportionmentController::getPeriod($current_class->start_date) ==
                                            (new Carbon\Carbon(App\Http\Controllers\ApportionmentController::currentPeriod()[0]))->format('F Y'))
                                    <a href="{{ route('classes.edit', $current_class->id) }}"
                                        class="bg-green-600 font-semibold text-white p-4 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                                        @click=" classDetails = false">
                                        Request rescheduling
                                    </a>
                                @endif
                            @endrole
                            @role('admin')
                                @if (!empty($current_class))
                                    <a href="{{ route('classes.edit', $current_class->id) }}"
                                        class="bg-green-600 font-semibold text-white p-4 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                                        @click=" classDetails = false">
                                        Request rescheduling
                                    </a>
                                @endif
                            @endrole
                            <div>
                                @foreach ($comments as $comment)
                                    <div class="flex space-x-3 p-4">
                                        <img class="rounded-full w-10 h-10 object-cover"
                                            src="{{ Storage::url($comment->author->profile_photo_path) }}"
                                            alt="profile_picture">
                                        <div class="flex flex-col items-start w-full">
                                            <p class="font-bold text-sm mb-2">{{ $comment->author->first_name }}
                                                {{ $comment->author->last_name }}</p>
                                            <div class="border rounded-md px-3 py-2 w-full bg-gray-200">
                                                <p>{{ $comment->content }}</p>
                                                <p class="text-xs mt-2 w-full text-right">{{ $comment->updated_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </x-slot>
                    </x-modal>

                    <x-modal type="info" name="showCommentsModal">
                        <x-slot name="title">
                            Comment
                        </x-slot>

                        <x-slot name="content">
                            <textarea name="class_comments" id="class_comments" class="rounded-lg w-full h-60" wire:model="comment"></textarea>
                        </x-slot>

                        <x-slot name="footer" class="justify-center">
                            <button wire:click="saveComment"
                                class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                                @click="showCommentsModal = false">
                                Save
                            </button>
                            <button wire:click="clearComment"
                                class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                                @click="showCommentsModal = false ">
                                Cancel
                            </button>
                            <div>
                                @foreach ($comments as $comment)
                                    <div class="flex space-x-3 p-4">
                                        <img class="rounded-full w-10 h-10 object-cover"
                                            src="{{ Storage::url($comment->author->profile_photo_path) }}"
                                            alt="profile_picture">
                                        <div class="flex flex-col items-start w-full">
                                            <p class="font-bold text-sm mb-2">{{ $comment->author->first_name }}
                                                {{ $comment->author->last_name }}</p>
                                            <div class="border rounded-md px-3 py-2 w-full bg-gray-200">
                                                <p>{{ $comment->content }}</p>
                                                <p class="text-xs mt-2 w-full text-right">{{ $comment->updated_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </x-slot>
                    </x-modal>

                    {{-- <script>
                        function selectAllTeacherCheckboxes(source) {
                            checkboxes = document.getElementsByClassName('teacher_checkbox');
                            for (var i in checkboxes)
                                checkboxes[i].checked = source.checked;
                        }

                        function selectAllStudentCheckboxes(source) {
                            checkboxes = document.getElementsByClassName('student_checkbox');
                            for (var i in checkboxes)
                                checkboxes[i].checked = source.checked;
                        }
                    </script> --}}

                    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}">
                        $(function() {
                            $("#start_date").datepicker({
                                altField: "#start_date",
                                altFormat: "yy-mm-dd"
                            });
                            $("#end_date").datepicker({
                                altField: "#end_date",
                                altFormat: "yy-mm-dd"
                            });
                        });
                    </script>

                </div>
            </div>
        </div>


    </div>
</x-app-layout>
