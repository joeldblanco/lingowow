<x-app-layout>
    <div class="w-full flex justify-center mt-4">
        @if (session()->exists('success'))
            <div class="rounded-md bg-green-500 font-semibold text-white w-1/2 px-3 py-3 flex items-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
                <p class="px-3">{{ session('success') }}</p>
            </div>
        @endif
        @if (session()->exists('error'))
            <div class="rounded-md bg-red-500 font-semibold text-white w-1/2 px-3 py-3 flex items-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
                <p class="px-3">Error creating meeting! - {{ session('error')['message'] }}</p>
            </div>
        @endif
        @php
            session()->forget('success');
            session()->forget('error');
        @endphp
    </div>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="bg-white w-full border border-gray-300 rounded-lg p-6 divide-y divide-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <p class="font-bold text-2xl">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </p>
                        {{-- @role('admin')
                            <p>
                                <a href="{{ route('gradings.edit') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit Grades
                                </a>
                            </p>
                        @endrole --}}
                    </div>
                    @foreach ($courses as $course)
                        <div class="pt-6 w-full">
                            <p class="font-bold text-2xl mb-2 text-gray-500">
                                {{ $course->name }}
                            </p>
                            <table class="table-auto text-left w-3/4 border-collapse">
                                <thead>
                                    <tr class="text-center">
                                        {{-- @foreach ($course->modules as $module) --}}
                                        <th
                                            class="w-1/4 py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            Module</th>
                                        <th
                                            class="w-3/4 py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            Grades</th>
                                        {{-- @php
                                                $exams = $module->units->pluck('exams');
                                                $aux = [];
                                                $exams->each(function ($exam, $key) use (&$exams, &$aux) {
                                                    if (count($exam)) {
                                                        $aux[] = $exams[$key]->first();
                                                    }
                                                });
                                                $exams = $aux;
                                                
                                                foreach ($exams as $exam) {
                                                    $units[] = $exam->unit;
                                                }
                                            @endphp --}}
                                        {{-- @endforeach --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($attempts) <= 0)
                                        <tr class="text-3xl font-bold">
                                            <td colspan="4" class="text-center">
                                                <div class="py-20 text-red-500">No grades found</div>
                                            </td>
                                        </tr>
                                    @else
                                        {{-- @foreach ($attempts as $attempt) --}}
                                        @php
                                            if ($course->categories->pluck('name')->contains('Conversational')) {
                                                $modules = $course->modules->intersect($user->modules);
                                            } else {
                                                $modules = $course->modules;
                                            }
                                        @endphp
                                        @foreach ($modules as $module)
                                            <tr class="text-center">
                                                <td
                                                    class="border-b border-gray-400 text-center py-4 text-xl font-bold text-gray-600">
                                                    {{ $module->name }}
                                                </td>
                                                <td class="border-b border-gray-400 text-center py-4 bg-gray-200">
                                                    <div class="flex justify-between items-center px-14">
                                                        @php
                                                            $average = 0;
                                                            $exams_count = 0;
                                                        @endphp
                                                        @foreach ($units as $unit)
                                                            @if ($module->units->pluck('id')->contains($unit->id))
                                                                @foreach ($attempts as $key => $attempt)
                                                                    @if ($unit->id == $key)
                                                                        <a href="{{ route('attempt.show', $attempt->id) }}"
                                                                            class="flex flex-col items-center hover:underline mr-24">
                                                                            <div
                                                                                class="text-lg font-bold text-gray-700">
                                                                                {{ $unit->exams->first()->unit->name }}
                                                                            </div>
                                                                            <div class="text-2xl font-bold">
                                                                                {{ $attempt->score }}
                                                                            </div>
                                                                            <div class="text-sm">
                                                                                {{ $attempt->created_at->format('d/m/Y') }}
                                                                            </div>
                                                                        </a>
                                                                        @php
                                                                            $average += $attempt->score;
                                                                            $exams_count++;
                                                                        @endphp
                                                                    @else
                                                                        <div class="flex flex-col items-center">
                                                                            <div
                                                                                class="text-lg font-bold text-gray-700">
                                                                                {{ $unit->name }}
                                                                            </div>
                                                                            <div class="text-2xl font-bold">
                                                                                -
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        <div class="flex flex-col items-center ml-auto">
                                                            <div class="text-lg font-bold text-gray-700">
                                                                AVG.
                                                            </div>
                                                            <div class="text-2xl font-bold">
                                                                @if ($exams_count > 0)
                                                                    {{ $average / $exams_count }}
                                                                @else
                                                                    {{ $average }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    second
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">

                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <a href="{{ $attempt->join_url }}"
                                                        class="hover:text-blue-600 hover:underline" target="_blank">
                                                        {{ $attempt->join_url }}<span class="text-xs">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <a href="{{ route('meetings.edit', $attempt->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <form action="{{ route('meetings.destroy', $attempt->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td> --}}
                                        {{-- @endforeach --}}
                                    @endif
                                </tbody>
                            </table>
                            {{-- <table class="table-auto text-left w-full border-collapse"> 
                                <thead>
                                    <tr class="text-center">
                                        <th
                                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            Topic</th>
                                        <th
                                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            Host</th>
                                        <th
                                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            Atendee</th>
                                        <th
                                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                            Join Url</th>
                                        <th
                                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        </th>
                                        <th
                                            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($attempts) <= 0)
                                        <tr class="text-3xl font-bold">
                                            <td colspan="4" class="text-center">
                                                <div class="py-20 text-red-500">No grades found</div>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($attempts as $attempt)
                                            <tr class="text-center">
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    {{ $attempt->topic }}
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">

                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <a href="{{ $attempt->join_url }}"
                                                        class="hover:text-blue-600 hover:underline" target="_blank">
                                                        {{ $attempt->join_url }}<span class="text-xs">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <a href="{{ route('meetings.edit', $attempt->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="py-4 px-6 border-b border-gray-400 text-center">
                                                    <form action="{{ route('meetings.destroy', $attempt->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table> --}}
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
