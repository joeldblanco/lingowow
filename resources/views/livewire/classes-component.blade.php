<div class="bg-white rounded-lg" x-data="{ showCommentsModal: false, classDetails: @entangle('classDetails') }" id="classes_main">

    <div class="flex flex-col justify-center w-full items-left border-b border-gray-300 space-y-4 p-6">
        <p class="text-xl font-bold w-full text-left">Classes</p>
        <div class="flex justify-between w-full">
            <div class="flex space-x-4 range-date-tour text-sm w-full">
                <input autocomplete="off" wire:model.lazy="start_date" type="text" id="start_date" name="start_date"
                    class="w-1/6 text-gray-500 border-gray-300 rounded-lg hover:border-gray-400 text-sm w-auto">
                <input autocomplete="off" wire:model.lazy="end_date" type="text" id="end_date" name="end_date"
                    class="w-1/6 text-gray-500 border-gray-300 rounded-lg hover:border-gray-400 text-sm w-auto">
                @role('admin')
                    <input wire:model="search" placeholder="Search by user..." type="text"
                        class="w-1/6 input-search-name text-gray-500 border-gray-300 rounded-lg hover:border-gray-400 text-sm">
                    @if ($search)
                        <button class="reset-btn" wire:click="$set('search', '')">
                            <i class="fas fa-times"></i>
                        </button>
                    @endif
                    <input wire:model="searchCourse" placeholder="Search by course..." type="text"
                        class="w-1/6 input-search-name text-gray-500 border-gray-300 rounded-lg hover:border-gray-400 text-sm">
                    @if ($search)
                        <button class="reset-btn" wire:click="$set('searchCourse', '')">
                            <i class="fas fa-times"></i>
                        </button>
                    @endif
                @endrole
            </div>
            @role('admin')
                <div class="flex items-end">
                    <a class="bg-blue-800 rounded-md text-white py-2 px-4 hover:bg-blue-900 cursor-pointer"
                        href="{{ route('classes.create') }}">Create</a>
                </div>
            @endrole

        </div>
    </div>
    <table class="flex flex-col w-full">
        <thead>
            <tr class="text-md py-3 px-6 flex justify-between">
                @hasanyrole('student|admin')
                    <th class="text-left w-full">Teacher</th>
                @endhasanyrole
                @hasanyrole('teacher|admin')
                    <th class="text-left w-full">Student</th>
                @endhasanyrole
                <th class="text-left w-full">Course</th>
                <th class="text-left w-full">Class Datetime (Local)</th>
                @hasanyrole('teacher|admin')
                    <th class="text-right w-1/3 justify-center">Comments</th>
                @endhasanyrole
            </tr>
        </thead>
        <tbody>
            @forelse ($classes as $key => $value)
                <tr
                    class="flex justify-between py-3 border-t @if ($loop->last) border-b @endif border-gray-200 py-3 px-6">
                    @hasanyrole('student|admin')
                        <td class="flex w-full text-left">

                            @if ($value->teacher() == null)
                                {{ dd($value) }}
                            @endif

                            <a href="{{ route('profile.show', $value->teacher()->id) }}"
                                class="hover:underline hover:text-blue-500 teacher-tour capitalize">{{ $value->teacher()->first_name }}
                                {{ $value->teacher()->last_name }}</a>
                        </td>
                    @endhasanyrole
                    @hasanyrole('teacher|admin')
                        <td class="flex w-full text-left">
                            <a href="{{ route('profile.show', $value->student()->id) }}"
                                class="hover:underline hover:text-blue-500 capitalize">{{ $value->student()->first_name }}
                                {{ $value->student()->last_name }}</a>
                        </td>
                    @endhasanyrole
                    <td class="flex w-full text-left">
                        <a href="{{ route('courses.show', $value->enrolment->course->id) }}"
                            class="hover:underline hover:text-blue-500 capitalize">
                            {{ $value->enrolment->course->name }}</a>
                    </td>
                    @php
                        $lesson_date = (new Carbon\Carbon($value->start_date))->setTimezone(auth()->user()->timezone);
                    @endphp
                    @if ($lesson_date->lt(Carbon\Carbon::now(auth()->user()->timezone)))
                        <td class="flex w-full text-left text-red-500 cursor-pointer hover:underline class-tour"
                            wire:click="showClass({{ $value->id }})">
                            {{ $lesson_date->format('d/m/Y - h:00 a') }}
                        </td>
                    @else
                        <td class="flex w-full text-left text-green-500 cursor-pointer hover:underline class-tour"
                            wire:click="showClass({{ $value->id }})">
                            {{ $lesson_date->format('d/m/Y - h:00 a') }}
                        </td>
                    @endif
                    @hasanyrole('teacher|admin')
                        <td class="flex w-1/3 justify-center">
                            <button type="button" wire:click="loadComment({{ $value->id }})"
                                @click="showCommentsModal = true">
                                <i class="fas fa-edit text-gray-600"></i>
                            </button>
                        </td>
                    @endhasanyrole
                </tr>
            @empty
                <tr class="flex justify-center p-6 border-t border-gray-200 w-full text-gray-600">
                    <td colspan="5">
                        <p class="text-3xl font-bold w-full text-center">There are no classes</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-4 py-8">
        {{ $classes->links('vendor.pagination.berrydashboard-livewire') }}
    </div>

    <div wire:loading wire:target="clearComment,saveComment,showClass,loadComment,nextPage,previousPage,setPage">
        @include('components.loading-state')
    </div>


    <x-modal type="info" name="classDetails" class="w-1/4 mx-auto">
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
            @endif
        </x-slot>

        <x-slot name="footer" class="justify-center">
            <div class="flex justify-center p-2">
                @role('student')
                    @if (
                        !empty($current_class) &&
                            App\Http\Controllers\ApportionmentController::getPeriod($current_class->start_date) ==
                                (new Carbon\Carbon(App\Http\Controllers\ApportionmentController::currentPeriod()[0]))->format('F Y'))
                        @if ($current_class->start_date > Carbon\Carbon::now()->addHours(1) && $current_class->status != 1)
                            <a href="{{ route('classes.edit', $current_class->id) }}"
                                class="bg-green-600 font-semibold text-white p-4 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 rescheduling-button"
                                @click=" classDetails = false">
                                Request rescheduling
                            </a>
                        @endif
                        @if ($current_class->end_date < now())
                            @if (empty($current_class->complaints->first()))
                                <p class="text-sm text-center mx-auto inline-block text-gray-600">Any complaints about this
                                    class?<br> Fill out the form <a
                                        href="{{ route('classes.complaints', $current_class->id) }}"
                                        class="hover:text-blue-600 underline" @click="classDetails = false">here.</a></p>
                            @else
                                <p class="text-sm text-center mx-auto inline-block text-gray-600">Edit your complaint <a
                                        href="{{ route('classes.complaints.edit', $current_class->id) }}"
                                        class="hover:text-blue-600 underline" @click="classDetails = false">here.</a></p>
                            @endif
                        @endif
                    @endif
                @endrole
                @role('admin')
                    @if (!empty($current_class))
                        <a href="{{ route('classes.edit', $current_class->id) }}"
                            class="bg-green-600 font-semibold text-white p-4 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 rescheduling-button"
                            @click=" classDetails = false">
                            Request rescheduling
                        </a>
                    @endif
                @endrole
            </div>
        </x-slot>
    </x-modal>

    <x-modal type="info" name="showCommentsModal" class="w-1/2 mx-auto p-4">
        <x-slot name="title">
            Comment
        </x-slot>

        <x-slot name="content">
            <textarea name="class_comments" id="class_comments" class="rounded-lg w-full h-60" wire:model="comment"></textarea>
        </x-slot>

        <x-slot name="footer" class="flex flex-col justify-center p-2">
            <div class="mb-10">
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
            </div>
            <div>
                @foreach ($comments as $comment)
                    <div class="flex space-x-3 p-4">
                        <img class="rounded-full w-10 h-10 object-cover"
                            src="{{ Storage::url($comment->author->profile_photo_path) }}" alt="profile_picture">
                        <div class="flex flex-col items-start w-full">
                            <p class="font-bold text-sm mb-2">{{ $comment->author->first_name }}
                                {{ $comment->author->last_name }}</p>
                            <div class="border rounded-md px-3 py-2 w-full bg-gray-200">
                                <p>{{ $comment->content }}</p>
                                <p class="text-xs mt-2 w-full text-right">{{ $comment->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-slot>
    </x-modal>

    @role('student')
        <x-shepherd-tour tourName="students/classes-tour" role="student" />
    @endrole

</div>
