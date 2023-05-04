<x-app-layout>
    <div class="bg-purple-100 mx-5 rounded-lg py-7 space-y-7 px-20">
        <div class="bg-white rounded-lg py-6 w-full max-w-full overflow-x-auto">
            <table class="w-full">
                <header class="flex flex-col px-6 pb-4 text-left">
                    <p class="text-xl font-bold">Classes (By Student)</p>
                </header>
                <thead>
                    <tr class="border whitespace-nowrap">
                        <th class="pl-6 py-4 text-left">Students</th>
                        <th class="pl-6 py-4 text-left">Course</th>
                        <th class="py-4 text-right px-6">Classes</th>
                        <th class="py-4 text-right px-6">Payment (per class)</th>
                        <th class="py-4 text-right px-6">Payment (total)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPayment = 0;
                    @endphp
                    @foreach ($groupedClasses as $classes)
                        @php
                            $student = $classes[0]->student();
                            $course = $classes[0]->enrolment->course;
                            if ($course->categories->pluck('name')->contains('Special')) {
                                $pricePerClass = 6.99;
                            } else {
                                $pricePerClass = 4.99;
                            }
                            $totalPaymentPerStudent = $pricePerClass * count($classes);
                            $totalPayment += $totalPaymentPerStudent;
                        @endphp
                        <tr class="border">
                            <td class="px-6 py-4 text-sm">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $course->name }}</td>
                            <td class="px-6 py-4 text-sm text-right">{{ count($classes) }}</td>
                            <td class="px-6 py-4 text-sm text-right">$ {{ $pricePerClass }}</td>
                            <td class="px-6 py-4 text-sm text-right">$ {{ $totalPaymentPerStudent }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border">
                        <td class="px-6 py-4 text-sm font-bold">Total</td>
                        <td class="px-6 py-4 text-sm font-bold"></td>
                        <td class="px-6 py-4 text-sm font-bold text-right">
                            {{ $groupedClasses->flatten()->count() }}
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-right"></td>
                        <td class="px-6 py-4 text-sm font-bold text-right">$ {{ $totalPayment }}</td>
                    </tr>
                </tfoot>
            </table>

            <form class="py-4 px-6" action="{{ route('teacherAgreement') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="flex justify-between py-4 px-6 items-end">
                    <div class="flex flex-col">
                        <input type="text" value="{{$teacher->id}}" name="teacher_id" id="teacher_id"  class="hidden">
                        <label class="pb-0 flex flex-col justify-center" for="supporting_document">
                            <input type="file" accept=".pdf" name="supporting_document" id="supporting_document"
                                class="hidden">
                            <p type="button"
                                class="bg-lw-blue px-4 py-2 text-white font-bold mt-4 text-center rounded-md hover:bg-blue-800 cursor-pointer">
                                <i class="fas fa-file-upload"></i></p>
                            <p class="text-sm text-gray-600 mt-2 italic">Upload your Supporting Document</p>
                        </label>
                    </div>

                    <div class="flex flex-col justify-end">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="agreement_checkbox" id="agreement_checkbox" required>
                            <p>I agree with the total ammount <span
                                    class="text-sm font-bold italic text-gray-500">(${{ $totalPayment }}).</span></p>
                        </div>
                        <button type="submit"
                            class="bg-lw-blue px-4 py-2 text-white font-bold my-4 rounded-md hover:bg-blue-800 cursor-pointer">Confirm</button>
                    </div>

                </div>
            </form>



        </div>
    </div>

</x-app-layout>
