<x-app-layout>
    <div class="flex flex-col bg-white">
        <div class="flex space-x-4 p-4 bg-gray-100 my-2 mx-5 rounded-xl">
            <div class="flex flex-col w-2/3 space-y-5">
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
                                <p><span class="mr-1 text-purple-300">$</span>{{ $data['total_earnings'] }}</p>
                                <i class="fas fa-arrow-circle-up transform rotate-45 text-2xl text-purple-400"></i>
                            </div>
                            <p class="text-purple-400 text-lg font-bold mb-4">Total Earning</p>
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
                            <p class="text-blue-200 text-lg font-bold mb-4">Total Invoices</p>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5 h-44">
                    <div onclick="location.href='{{ route('exam.index') }}';"
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
                                {{-- <i class="fas fa-arrow-circle-up transform rotate-45 text-2xl text-yellow-300"></i> --}}
                            </div>
                            <p class="text-yellow-200 text-lg font-bold mb-4">Total Exams</p>
                        </div>
                    </div>
                    {{-- <div onclick="location.href='{{ route('admin.invoices') }}';"
                        class="w-1/2 bg-blue-500 rounded-xl p-4 relative overflow-hidden cursor-pointer">
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
                                <i class="fas fa-arrow-circle-up transform rotate-45 text-2xl text-blue-300"></i>
                            </div>
                            <p class="text-blue-200 text-lg font-bold mb-4">Total Invoices</p>
                        </div>
                    </div> --}}
                </div>
                @if (count($data['teachers']) > 0)
                    <table class="flex flex-col w-full space-y-5 border border-gray-200 p-5 my-4 rounded-lg">
                        <thead>
                            <tr class="flex justify-around">
                                <th class="text-xl font-bold">Teachers</th>
                            </tr>
                            <tr class="flex text-md">
                                <th class="flex w-10/12 items-start">User Profile</th>
                                <th class="flex w-2/12 justify-around">Payment</th>
                                <th class="flex w-2/12 justify-around">PayPal Commission</th>
                                <th class="flex w-2/12 justify-around">Total</th>
                                <th class="flex w-2/12 justify-around">Profit</th>
                                <th class="flex w-2/12 justify-around">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @foreach ($data['teachers'] as $key => $value)
                                {{-- {{$student}} --}}
                                <tr class="flex">
                                    <td class="flex w-10/12 items-start">
                                        <div class="flex space-x-3">
                                            <img class="rounded-full w-10 h-10"
                                                src="{{ Storage::url($value->profile_photo_path) }}"
                                                alt="profile_picture">
                                            <div class="flex flex-col items-start text-sm">
                                                <p>{{ $value->first_name }} {{ $value->last_name }}</p>
                                                <p>{{ $value->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="flex w-2/12 justify-around">
                                        <p>$
                                            @if (isset($data['payment'][$value->id]) && isset($data['paypal_commissions'][$value->id]))
                                                {{ $data['payment'][$value->id] - $data['paypal_commissions'][$value->id] }}
                                            @else
                                                0
                                            @endif
                                        </p>
                                    </td>
                                    <td class="flex w-2/12 justify-around">
                                        <p>$
                                            @if (isset($data['paypal_commissions'][$value->id]))
                                                {{ $data['paypal_commissions'][$value->id] }}
                                            @else
                                                0
                                            @endif
                                        </p>
                                    </td>
                                    <td class="flex w-2/12 justify-around">
                                        <p>$
                                            @if (isset($data['payment'][$value->id]))
                                                {{ $data['payment'][$value->id] }}
                                            @else
                                                0
                                            @endif
                                        </p>
                                    </td>
                                    <td class="flex w-2/12 justify-around">
                                        <p>$
                                            @if (isset($data['aux_profit'][$value->id]))
                                                {{ $data['aux_profit'][$value->id] }}
                                            @else
                                                0
                                            @endif
                                        </p>
                                    </td>
                                    <td class="flex w-2/12 justify-around">
                                        <a href="{{ route('profile.show', $value->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="flex">
                                <td class="flex w-10/12 items-start"></td>
                                <td class="flex w-2/12 justify-around font-bold">$
                                    {{ $data['total_payment'] - $data['total_paypal_commissions'] }}</td>
                                <td class="flex w-2/12 justify-around font-bold">$
                                    {{ $data['total_paypal_commissions'] }}</td>
                                <td class="flex w-2/12 justify-around font-bold">$ {{ $data['total_payment'] }}</td>
                                <td class="flex w-2/12 justify-around font-bold">$ {{ $data['total_profit'] }}</td>
                                <td class="flex w-2/12 justify-around"></td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                <div id="chart" class="w-1/2"></div>
            </div>
            <div class="flex flex-col w-1/3 space-y-4">
                {{-- <div class="flex flex-col justify-between h-44"> --}}
                <a href="{{ route('users', 4) }}"
                    class="flex w-full border-2 border-green-500 bg-white text-gray-700 hover:bg-green-500 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                    {{-- <button class="border-2 border-green-600 p-2 rounded-lg w-10 h-10 items-center justify-center text-blue-300 z-10">
                            <i class="fas fa-ellipsis-h m-1"></i>
                        </button> --}}
                    <div class="w-24 h-24 bg-green-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                    <div class="w-24 h-24 bg-green-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                    <div class="flex flex-col">
                        <p class="font-bold text-lg">{{ $data['total_admins'] }}</p>
                        <p class="text-sm">Admins</p>
                    </div>
                </a>
                <a href="{{ route('users', 3) }}"
                    class="flex w-full border-2 border-blue-500 bg-white text-gray-700 hover:bg-blue-500 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                    {{-- <button class="border-2 border-blue-600 p-2 rounded-lg w-10 h-10 items-center justify-center text-blue-300 z-10">
                            <i class="fas fa-ellipsis-h m-1"></i>
                        </button> --}}
                    <div class="w-24 h-24 bg-blue-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                    <div class="w-24 h-24 bg-blue-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                    <div class="flex flex-col">
                        <p class="font-bold text-lg">{{ $data['total_teachers'] }}</p>
                        <p class="text-sm">Teachers</p>
                    </div>
                </a>
                <a href="{{ route('users', 2) }}"
                    class="flex w-full border-2 border-red-500 bg-white text-gray-700 hover:bg-red-500 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                    {{-- <button class="border-2 border-red-600 p-2 rounded-lg w-10 h-10 items-center justify-center text-blue-300 z-10">
                            <i class="fas fa-ellipsis-h m-1"></i>
                        </button> --}}
                    <div class="w-24 h-24 bg-red-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                    <div class="w-24 h-24 bg-red-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                    <div class="flex flex-col">
                        <p class="font-bold text-lg">{{ $data['total_students'] }}</p>
                        <p class="text-sm">Students</p>
                    </div>
                </a>
                <a href="{{ route('users', 1) }}"
                    class="flex w-full border-2 border-purple-700 bg-white text-gray-700 hover:bg-purple-700 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden">
                    {{-- <button class="border-2 border-purple-800 p-2 rounded-lg w-10 h-10 items-center justify-center text-blue-300 z-10">
                            <i class="fas fa-ellipsis-h m-1"></i>
                        </button> --}}
                    <div class="w-24 h-24 bg-purple-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                    <div class="w-24 h-24 bg-purple-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                    <div class="flex flex-col">
                        <p class="font-bold text-lg">{{ $data['total_guests'] }}</p>
                        <p class="text-sm">Guests</p>
                    </div>
                </a>
                {{-- <a href="{{ route('exam.index') }}"
                    class="flex w-full border-2 border-yellow-700 bg-white text-gray-700 hover:bg-yellow-700 hover:text-white rounded-xl p-4 space-x-3 items-center transition-all duration-300 ease-in-out relative overflow-hidden"> --}}
                {{-- <button class="border-2 border-yellow-800 p-2 rounded-lg w-10 h-10 items-center justify-center text-blue-300 z-10">
                            <i class="fas fa-ellipsis-h m-1"></i>
                        </button> --}}
                {{-- <div class="w-24 h-24 bg-yellow-900 rounded-full absolute opacity-20 right-6 -top-12"></div>
                    <div class="w-24 h-24 bg-yellow-900 rounded-full absolute opacity-40 -right-4 -top-8"></div>
                    <div class="flex flex-col">
                        <p class="font-bold text-lg">{{ $data['total_exams'] }}</p>
                        <p class="text-sm">Exams</p>
                    </div>
                </a> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: "area",
            },
            series: [{
                name: 'sales',
                data: [{{ implode(',', $data['months_total']) }}]
            }],
            xaxis: {
                categories: {!! json_encode(array_values($data['months'])) !!}
            },
            stroke: {
                curve: 'smooth',
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</x-app-layout>
