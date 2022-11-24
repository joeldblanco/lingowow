<x-app-layout>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    {{-- <livewire:classes-component :classes="$classes" :students="$students" :teachers="$teachers"/> --}}
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-5">
                <div class="flex justify-start w-full my-4 space-x-4">
                    <form action="{{ route('classes.index') }}">
                        <input autocomplete="off" value="{{ app('request')->start_date }}" type="text" id="start_date"
                            name="start_date" class="text-gray-500 border-gray-300 rounded-lg hover:border-gray-400">
                        <input autocomplete="off" value="{{ app('request')->end_date }}" type="text" id="end_date"
                            name="end_date" class="text-gray-500 border-gray-300 rounded-lg hover:border-gray-400">
                        <button class="bg-blue-700 rounded-md text-white py-2 px-4 hover:bg-blue-800">Search</button>
                    </form>
                </div>
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
        </div>
    </div>
    <script>
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
</x-app-layout>
