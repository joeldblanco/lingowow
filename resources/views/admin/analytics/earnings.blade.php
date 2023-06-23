<x-app-layout>
    <div class="bg-purple-100 mx-5 rounded-lg py-7 space-y-7 px-20">

        <form action="{{ route('admin.earnings') }}" class="space-x-2" method="POST">
            @csrf
            <select name="month" id="month">
                @foreach ($allPeriods as $periodName)
                    <option value="{{ $periodName }}">{{ $periodName }}</option>
                @endforeach
            </select>
            <button class="bg-lw-blue text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-800"
                type="submit">Submit</button>
        </form>

        <div class="bg-white rounded-lg py-6 w-full max-w-full overflow-x-auto">
            <table>
                <header class="flex flex-col px-6 pb-4 text-left">
                    <p class="text-xl font-bold">Students (By Teacher)</p>
                    {{-- {{ $teachers->links() }} --}}
                </header>
                <thead>
                    <tr class="border whitespace-nowrap">
                        <th class="pl-6 py-4 text-left">Course</th>
                        @foreach ($teachers as $teacher)
                            <th
                                class="text-sm px-4 text-right capitalize @if ($loop->last) pr-8 @endif">
                                {{ $teacher->first_name }} {{ $teacher->last_name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($synchronousCourses as $course)
                        <tr class="border">
                            <td class="px-6 py-4 text-sm">{{ $course->name }}</td>
                            @foreach ($teachers as $teacher)
                                @php
                                    $students = $teacher->enrolments_teacher
                                        ->where('course_id', $course->id)
                                        ->pluck('student')
                                        ->filter();
                                @endphp
                                <td class="px-6 relative @if ($loop->last) pr-8 @endif"
                                    x-data="{ modalDetails: false }" x-cloak>
                                    @if ($students->count())
                                        <div x-show="modalDetails" @mouseenter="modalDetails = true"
                                            @mouseleave="modalDetails = false"
                                            class="bg-black opacity-90 p-4 rounded-lg absolute z-20 bottom-10 left-10 text-white w-auto space-y-1 cursor-default">
                                            @foreach ($students as $student)
                                                <p class="text-left whitespace-nowrap">
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                </p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <p class="cursor-pointer w-full text-right" @mouseenter="modalDetails = true"
                                        @click.outside="modalDetails = false" @mouseleave="modalDetails = false">
                                        {{ $students->count() }}
                                    </p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border">
                        <td class="px-6 py-4 text-sm font-bold">Total</td>
                        @foreach ($teachers as $teacher)
                            <td
                                class="px-6 py-4 text-sm font-bold text-right @if ($loop->last) pr-8 @endif">
                                {{ $teacher->enrolments_teacher->pluck('student')->filter()->count() }}
                            </td>
                        @endforeach
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="bg-white rounded-lg py-6 w-full max-w-full overflow-x-auto">
            <table class="w-full">
                <header class="flex flex-col px-6 pb-4 text-left">
                    <p class="text-xl font-bold">Students (By Course)</p>
                </header>
                <thead>
                    <tr class="border whitespace-nowrap">
                        <th class="pl-6 py-4 text-left"></th>
                        @foreach ($courses as $course)
                            <th
                                class="text-sm px-4 py-4 text-right capitalize @if ($loop->last) pr-8 @endif">
                                {{ $course->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td class="px-6 py-4 text-sm font-bold">Students</td>
                        @foreach ($courses as $course)
                            <td class="px-6 relative @if ($loop->last) pr-8 @endif"
                                x-data="{ modalDetails: false }" x-cloak>
                                @php
                                    $students = $enrolments
                                        ->where('course_id', $course->id)
                                        ->pluck('student')
                                        ->filter();
                                @endphp
                                @if ($students->count())
                                    <div x-show="modalDetails" @mouseenter="modalDetails = true"
                                        @mouseleave="modalDetails = false"
                                        class="bg-black opacity-90 p-4 rounded-lg absolute z-20 bottom-10 left-10 text-white w-auto space-y-1 cursor-default">
                                        @foreach ($students as $student)
                                            <p class="text-left whitespace-nowrap">
                                                {{ $student->first_name }} {{ $student->last_name }}
                                            </p>
                                        @endforeach
                                    </div>
                                @endif
                                <p class="cursor-pointer w-full text-right" @mouseenter="modalDetails = true"
                                    @click.outside="modalDetails = false" @mouseleave="modalDetails = false">
                                    {{ $students->count() }}
                                </p>
                            </td>
                        @endforeach

                    </tr>
                </tbody>
                {{-- <tfoot>
                    <tr class="border">
                        <td class="px-6 py-4 text-sm font-bold">Total</td>
                        @foreach ($teachers as $teacher)
                            <td
                                class="px-6 py-4 text-sm font-bold text-right @if ($loop->last) pr-8 @endif">
                                {{ $teacher->enrolments_teacher->pluck('student')->filter()->count() }}
                            </td>
                        @endforeach
                    </tr>
                </tfoot> --}}
            </table>
        </div>

        <div class="bg-white rounded-lg py-6 w-full max-w-full overflow-x-auto overflow-y-scroll max-h-96">
            <table>
                <header class="flex flex-col px-6 pb-4 text-left">
                    <p class="text-xl font-bold">Students (By Teacher)</p>
                </header>
                <thead>
                    <tr class="border whitespace-nowrap">
                        <th class="pl-6 py-4 text-left">Student</th>
                        @foreach ($teachers as $teacher)
                            <th
                                class="text-sm px-4 text-right capitalize @if ($loop->last) pr-8 @endif">
                                {{ $teacher->first_name }} {{ $teacher->last_name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $students = collect([]);
                        foreach ($periodClasses as $class) {
                            $students->push($class->student());
                        }
                        $students_unique = $students->unique();
                    @endphp
                    @foreach ($students_unique as $student)
                        <tr class="border">
                            <td class="px-6 py-4 text-sm">{{ $student->first_name }} {{ $student->last_name }}</td>
                            @foreach ($teachers as $teacher)
                                @php
                                    $count = 0;
                                    
                                    if (
                                        $teacher->enrolments_teacher
                                            ->pluck('id')
                                            ->intersect($student->enrolments->pluck('id'))
                                            ->count()
                                    ) {
                                        $enrolments = $teacher->enrolments_teacher->pluck('id')->intersect($student->enrolments->pluck('id'));
                                    
                                        foreach ($enrolments as $enrolment_id) {
                                            $count += App\Models\Enrolment::find($enrolment_id)
                                                ->classes->whereBetween('start_date', $period)
                                                ->count();
                                        }
                                    }
                                @endphp
                                <td class="px-6 relative @if ($loop->last) pr-8 @endif"
                                    x-data="{ modalDetails: false }" x-cloak>
                                    <p class="cursor-pointer w-full text-right @if($count > 0) font-bold @endif" @mouseenter="modalDetails = true"
                                        @click.outside="modalDetails = false" @mouseleave="modalDetails = false">
                                        {{ $count }}
                                    </p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border">
                        <td class="px-6 py-4 text-sm font-bold">Total</td>
                        @foreach ($teachers as $teacher)
                            <td
                                class="px-6 py-4 text-sm font-bold text-right @if ($loop->last) pr-8 @endif">
                                {{ $teacher->teacherClasses->whereBetween('start_date', $period)->count() }}
                            </td>
                        @endforeach
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</x-app-layout>
