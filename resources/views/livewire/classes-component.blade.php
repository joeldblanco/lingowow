<div x-data="{loadingState: @entangle('loadingState'), showCommentsModal: false }" id="classes_main" >
    @php
        $months_years = [];

        foreach($classes as $class)
        {
            $months_years[] = (new Carbon\Carbon($class->start_date))->format('F Y');
        }

        $months_years = array_unique($months_years);

    @endphp
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">
                @if(count($classes) > 0)
                    <p class="text-2xl font-bold w-full text-center">Classes</p>
                    @foreach ($months_years as $month_year)
                        <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-5 rounded-lg">
                            <thead>
                                <tr class="flex justify-around mb-5">
                                    <th class="text-xl font-bold">{{$month_year}}</th>
                                </tr>
                                <tr class="flex text-md justify-around">
                                    {{-- <th class="flex justify-center w-full">ID</th> --}}
                                    @if(auth()->user()->roles[0]->name == "student" || auth()->user()->roles[0]->name == "admin")
                                        <th class="flex justify-center w-full">Teacher</th>
                                    @endif
                                    @if(auth()->user()->roles[0]->name == "teacher" || auth()->user()->roles[0]->name == "admin")
                                        <th class="flex justify-center w-full">Student</th>
                                    @endif
                                    <th class="flex justify-center w-full">Class Date</th>
                                    {{-- <th class="flex justify-center w-full">End Date</th> --}}
                                    {{-- <th class="flex justify-center w-full">Enrolment ID</th> --}}
                                    <th class="flex justify-center w-full">Comments</th>
                                    <th class="flex justify-center w-full">Teacher Check</th>
                                    <th class="flex justify-center w-full">Student Check</th>
                                    {{-- <th class="flex justify-center w-full">Status</th> --}}
                                </tr>
                            </thead>
                            <tbody class="space-y-4">
                                @foreach ($classes as $key => $value)
                                    @if((new Carbon\Carbon($value->start_date))->format('F Y') == $month_year)
                                    <tr class="flex justify-around">
                                        {{-- <td class="flex w-full justify-center">
                                            {{$value->id}}
                                        </td> --}}
                                        @if(auth()->user()->roles[0]->name == "student" || auth()->user()->roles[0]->name == "admin")
                                            <td class="flex w-full justify-center">
                                                <a href="{{route('profile.show',$teachers[$key]->id)}}" class="hover:underline hover:text-blue-500">{{$teachers[$key]->first_name}} {{$teachers[$key]->last_name}}</a>
                                            </td>
                                        @endif
                                        @if(auth()->user()->roles[0]->name == "teacher" || auth()->user()->roles[0]->name == "admin")
                                            <td class="flex w-full justify-center">
                                                <a href="{{route('profile.show',$students[$key]->id)}}" class="hover:underline hover:text-blue-500">{{$students[$key]->first_name}} {{$students[$key]->last_name}}</a>
                                            </td>
                                        @endif
                                        <td class="flex w-full justify-center">
                                            {{(new Carbon\Carbon($value->start_date))->format('d/m/Y - g:00 a')}}
                                        </td>
                                        {{-- <td class="flex w-full justify-center">
                                            {{$value->end_date}}
                                        </td> --}}
                                        {{-- <td class="flex w-full justify-center">
                                            {{$value->enrolment_id}}
                                        </td> --}}
                                        <td class="flex w-full justify-center">
                                            <button wire:click="loadComment({{$value->id}})" @click="showCommentsModal = true">
                                                <i class="fas fa-edit text-gray-600"></i>
                                            </button>
                                        </td>
                                        <td class="flex w-full justify-center">
                                            <input type="checkbox" name="teacher_check" @if(auth()->user()->roles[0]->name == "teacher" || auth()->user()->roles[0]->name == "admin") wire:click="teacherClassCheck({{$value->id}})" @endif @if($value->teacher_check) checked @endif @if(auth()->user()->roles[0]->name == "student") disabled class="opacity-40" @endif />
                                        </td>
                                        <td class="flex w-full justify-center">
                                            <input type="checkbox" name="student_check" @if(auth()->user()->roles[0]->name == "student" || auth()->user()->roles[0]->name == "admin") wire:click="studentClassCheck({{$value->id}})" @endif @if($value->student_check) checked @endif @if(auth()->user()->roles[0]->name == "teacher") disabled class="opacity-40" @endif />
                                        </td>
                                        {{-- <td class="flex w-full justify-center">
                                            {{$value->status}}
                                        </td> --}}
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @else
                    <p class="text-2xl font-bold w-full text-center">There are no classes</p>
                @endif
            </div>
        </div>
    </div>
    @include('components.loading-state')
    <div
        class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
        x-show="showCommentsModal"
        x-transition:enter="transition duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
    >
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
                            <img class="rounded-full w-10 h-10" src="{{Storage::url($comment->author()[0]->profile_photo_path)}}" alt="profile_picture">
                            <div class="flex flex-col items-start w-full">
                                <p class="font-bold text-sm mb-2">{{$comment->author()[0]->first_name}} {{$comment->author()[0]->last_name}}</p>
                                <div class="border rounded-md px-3 py-2 w-full bg-gray-200">
                                    <p>{{$comment->comment}}</p>
                                    <p class="text-xs mt-2 w-full text-right">{{$comment->updated_at}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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
