<x-app-layout>
    <div class="flex space-x-4">
        <div class="flex flex-col w-2/3 space-y-5">
            <div class="bg-white rounded-xl p-5">
                <div class="flex flex-col justify-start space-y-2">
                    <p class="text-2xl font-bold">Sales</p>
                    <p class="text-gray-700">Monthly income calculations based on paid invoices.</p>
                </div>
                <div id="chart" class="w-full"></div>
            </div>
            <div class="flex space-x-5 h-44">
                <div onclick="location.href='{{ route('admin.earnings') }}';"
                    class="w-1/2 bg-purple-800 rounded-xl p-4 relative overflow-hidden cursor-pointer earnings-div">
                    <div class="w-52 h-52 bg-purple-900 rounded-full absolute opacity-50 -right-4 -top-32"></div>
                    <div class="flex flex-col">
                        <div class="flex justify-between mb-4">
                            <div class="bg-purple-900 p-2 rounded-lg text-purple-300">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <button
                                class="bg-purple-800 p-2 rounded-lg w-10 h-10 items-center justify-center text-purple-400 z-10">
                                <i class="fas fa-ellipsis-h m-1"></i>
                            </button>
                        </div>
                        <div class="flex space-x-1 text-white text-3xl font-bold mb-3">
                            <p><span class="mr-1 text-purple-300">$</span>{{ $data['this_month_earnings'] }}</p>
                            <i class="fas fa-arrow-circle-up transform rotate-45 text-2xl text-purple-400"></i>
                        </div>
                        <p class="text-purple-400 text-lg font-bold mb-4">Total Earnings ({{ now()->format('M') }})
                        </p>
                    </div>
                </div>
                <div onclick="location.href='{{ route('admin.invoices') }}';"
                    class="w-1/2 bg-blue-500 rounded-xl p-4 relative overflow-hidden cursor-pointer invoices-div">
                    <div class="w-52 h-52 bg-blue-900 rounded-full absolute opacity-50 -right-4 -top-32"></div>
                    <div class="flex flex-col">
                        <div class="flex justify-between mb-4">
                            <div class="bg-blue-700 p-2 rounded-lg text-blue-100 w-10 h-10">
                                <i class="fas fa-file-alt m-1"></i>
                            </div>
                            <button
                                class="bg-blue-600 p-2 rounded-lg w-10 h-10 items-center justify-center text-blue-300 z-10">
                                <i class="fas fa-ellipsis-h m-1"></i>
                            </button>
                        </div>
                        <div class="flex space-x-1 text-white text-3xl font-bold mb-3">
                            <p>{{ $data['total_invoices'] }}</p>
                            {{-- <i class="fas fa-arrow-circle-up transform rotate-45 text-2xl text-blue-300"></i> --}}
                        </div>
                        <p class="text-blue-200 text-lg font-bold mb-4">Total Invoices ({{ now()->format('M') }})
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex space-x-5 h-44">
                <div onclick="location.href='{{ route('exams.index') }}';"
                    class="w-1/2 bg-yellow-600 rounded-xl p-4 relative overflow-hidden cursor-pointer">
                    <div class="w-52 h-52 bg-yellow-900 rounded-full absolute opacity-50 -right-4 -top-32"></div>
                    <div class="flex flex-col">
                        <div class="flex justify-between mb-4">
                            <div class="bg-yellow-700 p-2 rounded-lg text-yellow-100 w-10 h-10">
                                <i class="fas fa-file-alt m-1"></i>
                            </div>
                            <button
                                class="bg-yellow-600 p-2 rounded-lg w-10 h-10 items-center justify-center text-yellow-300 z-10">
                                <i class="fas fa-ellipsis-h m-1"></i>
                            </button>
                        </div>
                        <div class="flex space-x-1 text-white text-3xl font-bold mb-3">
                            <p>{{ $data['total_exams'] }}</p>
                        </div>
                        <p class="text-yellow-200 text-lg font-bold mb-4">Total Exams</p>
                    </div>
                </div>
            </div>
            <table class="flex flex-col w-full my-4 rounded-lg bg-white">
                <thead>
                    <tr class="flex justify-start border-b p-5">
                        <th class="text-xl font-bold">Teachers</th>
                    </tr>
                    <tr class="flex border-b p-5 w-full justify-between">
                        <th class="w-full text-left">Name</th>
                        <th class="w-full text-center">Payment</th>
                        <th class="w-full text-center">Commission</th>
                        <th class="w-full text-center">Total</th>
                        <th class="w-full text-center">Profit</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto max-h-96">
                    @forelse ($data['teachers'] as $key => $value)
                        <tr class="flex border-b p-4 w-full justify-between hover:bg-gray-100">
                            <td class="flex w-full items-center justify-start">
                                <a href="{{ route('profile.show', $value->id) }}"
                                    class="text-sm hover:text-blue-500 cursor-pointer hover:underline">{{ $value->first_name }}
                                    {{ $value->last_name }}</a>
                            </td>
                            <td class="flex w-full justify-center items-center">
                                <p>$
                                    @if (isset($data['payment'][$value->id]) && isset($data['paypal_commissions'][$value->id]))
                                        {{ $data['payment'][$value->id] - $data['paypal_commissions'][$value->id] }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </td>
                            <td class="flex w-full justify-center items-center">
                                <p>$
                                    @if (isset($data['paypal_commissions'][$value->id]))
                                        {{ $data['paypal_commissions'][$value->id] }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </td>
                            <td class="flex w-full justify-center items-center">
                                <p>$
                                    @if (isset($data['payment'][$value->id]))
                                        {{ $data['payment'][$value->id] }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </td>
                            <td class="flex w-full justify-center items-center">
                                <p>$
                                    @if (isset($data['aux_profit'][$value->id]))
                                        {{ $data['aux_profit'][$value->id] }}
                                    @else
                                        0
                                    @endif
                                </p>
                            </td>
                        </tr>
                    @empty
                        <tr class="flex w-full py-5">
                            <td class="flex w-full justify-center text-gray-600 text-2xl font-bold" colspan="5">
                                <p>There are no teachers</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="flex p-5 border-t w-full justify-between items-center">
                        <td class="w-full text-sm font-bold">Total</td>
                        <td class="flex w-full justify-center font-bold">
                            $ {{ $data['total_payment'] - $data['total_paypal_commissions'] }}
                        </td>
                        <td class="flex w-full justify-center font-bold">
                            $ {{ $data['total_paypal_commissions'] }}
                        </td>
                        <td class="flex w-full justify-center font-bold">
                            $ {{ $data['total_payment'] }}
                        </td>
                        <td class="flex w-full justify-center font-bold">
                            $ {{ $data['total_profit'] }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="flex flex-col w-1/3 space-y-4">
            {{-- <div
                class="flex w-full border-2 border-green-500 bg-white text-gray-700 hover:bg-green-500 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">

                <div class="w-24 h-24 bg-green-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                <div class="w-24 h-24 bg-green-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                <div class="flex flex-col">
                    <p class="font-bold text-lg">{{ $data['total_admins'] }}</p>
                    <p class="text-sm">Admins</p>
                </div>
            </div>
            <div
                class="flex w-full border-2 border-blue-500 bg-white text-gray-700 hover:bg-blue-500 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                <div class="w-24 h-24 bg-blue-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                <div class="w-24 h-24 bg-blue-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                <div class="flex flex-col">
                    <p class="font-bold text-lg">{{ $data['total_teachers'] }}</p>
                    <p class="text-sm">Teachers</p>
                </div>
            </div>
            <div
                class="flex w-full border-2 border-red-500 bg-white text-gray-700 hover:bg-red-500 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                <div class="w-24 h-24 bg-red-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                <div class="w-24 h-24 bg-red-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                <div class="flex flex-col">
                    <p class="font-bold text-lg">{{ $data['total_students'] }}</p>
                    <p class="text-sm">Students</p>
                </div>
            </div>
            <div
                class="flex w-full border-2 border-purple-700 bg-white text-gray-700 hover:bg-purple-700 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                <div class="w-24 h-24 bg-purple-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                <div class="w-24 h-24 bg-purple-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                <div class="flex flex-col">
                    <p class="font-bold text-lg">{{ $data['total_guests'] }}</p>
                    <p class="text-sm">Guests</p>
                </div>
            </div> --}}
            <div class="flex bg-white rounded-xl text-sm">
                <div class="w-full">
                    <div class="p-6 flex items-center justify-between border-b border-r border-gray-100">
                        <div
                            class="flex items-center justify-center w-20 bg-purple-100 rounded-lg p-3 text-purple-800 font-bold text-xl">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="text-center w-full">
                            <p class="font-bold">{{ $data['total_admins'] }}</p>
                            <p>Admins</p>
                        </div>
                    </div>
                    <div class="p-6 flex items-center justify-between border-r border-t border-gray-100">
                        <div
                            class="flex items-center justify-center w-20 bg-purple-100 rounded-lg p-3 text-purple-800 font-bold text-xl">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="text-center w-full">
                            <p class="font-bold">{{ $data['total_students'] }}</p>
                            <p>Students</p>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="p-6 flex items-center justify-between border-l border-b border-gray-100">
                        <div
                            class="flex items-center justify-center w-20 bg-purple-100 rounded-lg p-3 text-purple-800 font-bold text-xl">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="text-center w-full">
                            <p class="font-bold">{{ $data['total_teachers'] }}</p>
                            <p>Teachers</p>
                        </div>
                    </div>
                    <div class="p-6 flex items-center justify-between border-t border-l border-gray-100">
                        <div
                            class="flex items-center justify-center w-20 bg-purple-100 rounded-lg p-3 text-purple-800 font-bold text-xl">
                            <i class="fas fa-user-secret"></i>
                        </div>
                        <div class="text-center w-full">
                            <p class="font-bold">{{ $data['total_guests'] }}</p>
                            <p>Guests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('header-scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts" async></script>
    @endpush


    {{-- SCRIPTS --}}

    <script defer>
        var options = {
            chart: {
                type: "area",
                zoom: {
                    enabled: false
                },
                height: '130%',
            },
            grid: {
                show: false,
            },
            series: [{
                name: 'Sales',
                data: [{{ implode(',', $data['months_total']) }}]
            }],
            xaxis: {
                show: false,
                categories: {!! json_encode(array_values($data['months'])) !!}
            },
            yaxis: {
                show: false,
            },
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    // stops: [0, 50, 100]
                }
            },
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</x-app-layout>
