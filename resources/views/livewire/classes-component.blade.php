<div x-data="{showCommentsModal: false, classDetails: false}" id="classes_main" >
    <div >
        @if (count($classes) > 0)
                    <div class="flex justify-center w-full items-center my-8">
                        {{-- <button wire:click="previousPeriod"><i class="fas fa-angle-left text-4xl"></i></button> --}}
                        <div class="flex flex-col">
                            <p class="text-2xl font-bold w-full text-center">Classes</p>
                            {{-- @role('admin')
                                <p class="text-xl w-full text-center text-gray-600">Classes pending review:
                                    {{ count($to_review_classes) }}</p>
                            @endrole --}}
                        </div>
                        {{-- <button wire:click="nextPeriod"><i class="fas fa-angle-right text-4xl"></i></button> --}}
                    </div>
                    {{-- @foreach ($periods as $month_year) --}}
                    <form action="{{ route('classes.check') }}" method="POST">
                        @csrf
                        @method('POST')
                        <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                            <thead>
                                {{-- <tr class="flex justify-around mb-5">
                                    <th class="text-xl font-bold">{{ $month_year }}</th>
                                </tr> --}}
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
                                    @hasanyrole('teacher|admin')
                                        <th class="flex justify-center w-full">Teacher Check</th>
                                    @endhasanyrole
                                    @hasanyrole('student|admin')
                                        <th class="flex justify-center w-full">Student Check</th>
                                    @endhasanyrole
                                </tr>
                            </thead>
                            <tbody class="space-y-4">

                                @foreach ($classes as $key => $value)
                                    {{-- @if (App\Http\Controllers\ApportionmentController::getPeriod($value->start_date) == $month_year) --}}
                                    <tr
                                        class="flex justify-around @if (!$value->student_check || !$value->teacher_check) bg-yellow-100 @endif">
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
                                                <button wire:click="loadComment({{ $value->id }})"
                                                    @click="showCommentsModal = true">
                                                    <i class="fas fa-edit text-gray-600"></i>
                                                </button>
                                            </td>
                                        @endhasanyrole
                                        @hasanyrole('teacher|admin')
                                            <td class="flex w-full justify-center">
                                                <input type='hidden' value='0' name='teacher_{{ $value->id }}'>
                                                <input type="checkbox" name="teacher_{{ $value->id }}"
                                                    @if ($value->teacher_check) checked @endif />
                                            </td>
                                        @endhasanyrole
                                        @hasanyrole('student|admin')
                                            <td class="flex w-full justify-center">
                                                <input type='hidden' value='0' name='student_{{ $value->id }}'>
                                                <input type="checkbox" name="student_{{ $value->id }}"
                                                    @if ($value->student_check) checked @endif />
                                            </td>
                                        @endhasanyrole
                                    </tr>
                                    {{-- @endif --}}
                                @endforeach
                                {{ $classes->links() }}
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-lw-blue py-2 px-4 text-white rounded-md hover:bg-blue-800">
                                Check/Uncheck
                            </button>
                        </div>
                    </form>
                    {{-- @endforeach --}}
                @else
                    <p class="text-2xl font-bold w-full text-center">There are no classes</p>
                @endif
    </div>
    <div wire:loading wire:target="clearComment,saveComment,showClass,loadComment">
        @include('components.loading-state')
    </div>
    <div
        class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="classDetails"
        x-transition:enter="transition duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak>
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div
                class="relative bg-white shadow-lg rounded-md text-gray-900 z-20 p-2"
                @click.outside="classDetails = false"
                x-show="classDetails"
                x-transition:enter="transition transform duration-300"
                x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100"
                x-transition:leave="transition transform duration-300"
                x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0"
            >
                <header class="flex items-center justify-between p-2">
                    <h2 class="font-semibold">Details</h2>
                    <button wire:click="clearComment" class="focus:outline-none p-2" @click="classDetails = false">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                        ></path>
                        </svg>
                    </button>
                </header>
                <main class="p-6 text-left">
                    @if($current_class != null)
                        @php
                            $current_class_teacher = $current_class->teacher();
                            $current_class_student = $current_class->student();
                        @endphp
                        <p><span class="font-bold">Course:</span> {{$enrolment->course->name}}</p>
                        <p><span class="font-bold">Teacher:</span> {{$current_class_teacher->first_name}} {{$current_class_teacher->last_name}}</p>
                        <p><span class="font-bold">Student:</span> {{$current_class_student->first_name}} {{$current_class_student->last_name}}</p>
                        <p><span class="font-bold">Class Date:</span> {{$current_class->start_date}}</p>
                        <p><span class="font-bold">Did the professor teach the class?</span> @if($current_class->teacher_check == 0) No @else Yes @endif</p>
                        <p><span class="font-bold">Did the student receive the class?</span> @if($current_class->student_check == 0) No @else Yes @endif</p>
                        <p><span class="font-bold">Recording:</span> {{App\Http\Controllers\ClassController::getRecordingUrl($current_class)}}</p>
                    @endif
                </main>
                <footer class="flex justify-center p-2">
                    {{-- @php
                        if($current_class != null) $lesson_date = (new Carbon\Carbon($current_class->start_date));
                    @endphp
                    @if($current_class != null && $lesson_date->gt(Carbon\Carbon::now())) --}}
                    {{-- {{ dd(App\Http\Controllers\ApportionmentController::getPeriod($current_class->start_date), (new Carbon\Carbon (App\Http\Controllers\ApportionmentController::currentPeriod()[0]))->format('F Y')) }} --}}
                    {{-- @if(($current_class != null && ((!$current_class->teacher_check && !$current_class->student_check) && (App\Http\Controllers\ApportionmentController::getPeriod($current_class->start_date) < (new Carbon\Carbon (App\Http\Controllers\ApportionmentController::currentPeriod()[1]))) || auth()->user()->roles[0]->name == "admin"))) --}}
                    @if($current_class != null && (!$current_class->teacher_check && !$current_class->student_check) && ((App\Http\Controllers\ApportionmentController::getPeriod($current_class->start_date) == (new Carbon\Carbon (App\Http\Controllers\ApportionmentController::currentPeriod()[0]))->format('F Y')) || auth()->user()->roles[0]->name == "admin"))
                        <a
                            href="{{route('classes.edit',$current_class->id)}}"
                            class="bg-green-600 font-semibold text-white p-4 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                            @click=" classDetails = false">
                            Request rescheduling
                        </a>
                    @endif
                </footer>
                <div>
                    @foreach ($comments as $comment)
                        <div class="flex space-x-3 p-4">
                            <img class="rounded-full w-10 h-10" src="{{Storage::url($comment->author->profile_photo_path)}}" alt="profile_picture">
                            <div class="flex flex-col items-start w-full">
                                <p class="font-bold text-sm mb-2">{{$comment->author->first_name}} {{$comment->author->last_name}}</p>
                                <div class="border rounded-md px-3 py-2 w-full bg-gray-200">
                                    <p>{{$comment->content}}</p>
                                    <p class="text-xs mt-2 w-full text-right">{{$comment->updated_at}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div
        class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showCommentsModal"
        x-transition:enter="transition duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak>
        <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
            <div
                class="relative bg-white shadow-lg rounded-md text-gray-900 z-20"
                {{-- @click.outside="showCommentsModal = false" --}}
                x-show="showCommentsModal"
                x-transition:enter="transition transform duration-300"
                x-transition:enter-start="scale-0"
                x-transition:enter-end="scale-100"
                x-transition:leave="transition transform duration-300"
                x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0"
            >
                <header class="flex items-center justify-between p-2">
                    <h2 class="font-semibold">Comment</h2>
                    <button wire:click="clearComment" class="focus:outline-none p-2" @click="showCommentsModal = false">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                        ></path>
                        </svg>
                    </button>
                </header>
                <main class="p-2 text-center">
                    <textarea name="class_comments" id="class_comments" class="rounded-lg w-full h-60" wire:model="comment"></textarea>
                </main>
                <footer class="flex justify-center p-2">
                    <button
                        wire:click="saveComment"
                        class="bg-green-600 font-semibold text-white p-2 w-32 mr-1 rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showCommentsModal = false"
                    >
                        Save
                    </button>
                    <button
                        wire:click="clearComment"
                        class="bg-red-600 font-semibold text-white p-2 ml-1 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
                        @click=" showCommentsModal = false "
                    >
                        Cancel
                    </button>
                </footer>
                <div>
                    @foreach ($comments as $comment)
                        <div class="flex space-x-3 p-4">
                            <img class="rounded-full w-10 h-10" src="{{Storage::url($comment->author->profile_photo_path)}}" alt="profile_picture">
                            <div class="flex flex-col items-start w-full">
                                <p class="font-bold text-sm mb-2">{{$comment->author->first_name}} {{$comment->author->last_name}}</p>
                                <div class="border rounded-md px-3 py-2 w-full bg-gray-200">
                                    <p>{{$comment->content}}</p>
                                    <p class="text-xs mt-2 w-full text-right">{{$comment->updated_at}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    
    {{-- <script type="text/javascript">

        var checkboxes = [];
        
        $("input[type='checkbox']").click(function(e) {
            if (e.shiftKey) {
                checkboxes.push(this);

                if(checkboxes.length > 0){

                    if(checkboxes[0].name == this.name){
                        checkboxes.forEach(element => {
                            $(element).prop('checked', checkboxes[0].checked);
                        });
                        console.log(1);
                    }
                }

            } else{
                checkboxes = [];
            }
        });
        
    </script> --}}
</div>
