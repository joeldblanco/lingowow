<x-app-layout>
    {{-- <div class="bg-purple-500 mx-5 rounded-lg py-7 space-y-7 px-20"> --}}
    <div class="bg-white rounded-lg py-6 w-full max-w-full overflow-x-auto">
        <div class="my-5 pl-5">
            <form action="{{ route('analytics.earnings') }}">
                <input class="px-2 py-2 text-gray-500 rounded border-gray-50" type="date" id="period" name="period"
                    value="{{ (new Carbon\Carbon($period["start_date"]))->toDateString() }}">

                <button type="submit"
                    class="bg-lw-blue px-4 py-2 text-white font-bold my-4 rounded-md hover:bg-blue-800 cursor-pointer">
                    Search
                </button>
            </form>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border whitespace-nowrap">
                    <th></th>
                    <th class="pl-6 py-4 text-left">Students</th>
                    <th class="pl-6 py-4 text-left">Course</th>
                    <th class="py-4 text-right px-6">Classes</th>
                    <th class="py-4 text-right px-6">
                        <p>Income</p>
                        <p class="text-sm text-gray-500 italic">(per class)</p>
                    </th>
                    <th class="py-4 text-right px-6">
                        <p>Income</p>
                        <p class="text-sm text-gray-500 italic">(per student)</p>
                    </th>
                    <th class="py-4 text-right px-6">Fee</th>
                    <th class="py-4 text-right px-6">
                        <p>Payment</p>
                        <p class="text-sm text-gray-500 italic">(per student)</p>
                    </th>
                    <th class="py-4 text-right px-6">Earnings</th>
                </tr>
            </thead>
            <tbody class="">
                @php
                    $totalIncome = 0;
                    $totalPayment = 0;
                    $totalFee = 0;
                    // $oldCustomers = json_decode(
                    //     DB::table('metadata')
                    //         ->where('key', 'old_customers')
                    //         ->first()->value,
                    // );
                    $price_groups = json_decode(
                        DB::table('metadata')
                            ->where('key', 'price_groups')
                            ->first()->value,
                        1,
                    )[0];
                    $price_students = json_decode(
                        DB::table('metadata')
                            ->where('key', 'price_students')
                            ->first()->value,
                        1,
                    );
                    $default_group_price = json_decode(
                        DB::table('metadata')
                            ->where('key', 'default_group_price')
                            ->first()->value,
                        1,
                    );
                @endphp
                @foreach ($groupedClasses as $classes)
                    @php
                        $student = $classes[0]->student();
                        $course = $classes[0]->enrolment->course;
                        $groupPrice = false;
                        $product_id = $course->products->first()->id;
                        $numberOfClasses = count($classes);

                        foreach ($price_students as $group => $students_ids) {
                            if (in_array($student->id, $students_ids)) {
                                $groupPrice = $price_groups[$group];
                            }
                        }

                        if (!$groupPrice) {
                            $groupPrice = $default_group_price;
                        }

                        if ($course->categories->pluck('name')->contains('Special')) {
                            // if (in_array($student->id, $oldCustomers)) {
                            //     $incomePerClass = 19.99; //Before 14.99
                            // } else {
                            //     $incomePerClass = 20.39; //Before 19.99
                            // }
                            $paymentPerClass = 6.99;
                        } else {
                            // if (in_array($student->id, $oldCustomers)) {
                            //     $incomePerClass = 14.99; //Before 9.99
                            // } else {
                            //     $incomePerClass = 15.29; //Before 14.99
                            // }
                            $paymentPerClass = 4.99;
                        }

                        // if ($product_id == 15) {
                        //     dd($groupPrice[$product_id]);
                        // }

                        try {
                            if ($numberOfClasses < 8) {
                                $incomePerClass = $groupPrice[$product_id][0]['sale_price'] == null ? $groupPrice[$product_id][0]['regular_price'] : $groupPrice[$product_id][0]['sale_price'];
                            } elseif ($numberOfClasses < 12) {
                                $incomePerClass = $groupPrice[$product_id][1]['sale_price'] == null ? $groupPrice[$product_id][1]['regular_price'] : $groupPrice[$product_id][1]['sale_price'];
                            } elseif ($numberOfClasses < 16) {
                                $incomePerClass = $groupPrice[$product_id][2]['sale_price'] == null ? $groupPrice[$product_id][2]['regular_price'] : $groupPrice[$product_id][2]['sale_price'];
                            } elseif ($numberOfClasses >= 16) {
                                $incomePerClass = $groupPrice[$product_id][3]['sale_price'] == null ? $groupPrice[$product_id][3]['regular_price'] : $groupPrice[$product_id][3]['sale_price'];
                            }
                        } catch (\Throwable $th) {
                            dd($th->getMessage());
                            // dd($groupPrice, $product_id, $numberOfClasses, $student, $course, $default_group_price);
                        }

                        $totalIncomePerStudent = $incomePerClass * $numberOfClasses;
                        $totalIncome += $totalIncomePerStudent;

                        $feePerStudent = round($totalIncomePerStudent * 0.06, 2);
                        $totalFee += $feePerStudent;

                        $totalPaymentPerStudent = $paymentPerClass * $numberOfClasses;
                        $totalPayment += $totalPaymentPerStudent;
                    @endphp
                    <tr class="border">
                        <td class="px-6 py-4 text-sm"><input type="checkbox"></td>
                        <td class="px-6 py-4 text-sm">{{ ucwords($student->first_name) }}
                            {{ ucwords($student->last_name) }}</td>
                        <td class="px-6 py-4 text-sm">{{ $course->name }}</td>
                        <td class="px-6 py-4 text-sm text-right">{{ count($classes) }}</td>
                        <td class="px-6 py-4 text-sm text-right">$ {{ $incomePerClass }}</td>
                        <td class="px-6 py-4 text-sm text-right">$ {{ $totalIncomePerStudent }}</td>
                        <td class="px-6 py-4 text-sm text-right">-$ {{ $feePerStudent }}</td>
                        <td class="px-6 py-4 text-sm text-right">-$ {{ $totalPaymentPerStudent }}</td>
                        <td class="px-6 py-4 text-sm text-right">$
                            {{ $totalIncomePerStudent - $feePerStudent - $totalPaymentPerStudent }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="text-md">
                <tr class="border">
                    <td class="px-6 py-4 font-bold">Total</td>
                    <td class="px-6 py-4 font-bold"></td>
                    <td class="px-6 py-4 font-bold"></td>
                    <td class="px-6 py-4 font-bold text-right">
                        {{ $groupedClasses->flatten()->count() }}
                    </td>
                    <td class="px-6 py-4 font-bold text-right"></td>
                    <td class="px-6 py-4 font-bold text-right">$ {{ $totalIncome }}</td>
                    <td class="px-6 py-4 font-bold text-right">-$ {{ $totalFee }}</td>
                    <td class="px-6 py-4 font-bold text-right">-$ {{ $totalPayment }}</td>
                    <td class="px-6 py-4 font-bold text-right">$ {{ $totalIncome - $totalFee - $totalPayment }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    {{-- </div> --}}

</x-app-layout>
