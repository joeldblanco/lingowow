<x-app-layout>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 courses-list">

                <div class="w-full flex justify-between my-10">
                    <h2 class="text-4xl font-bold text-gray-800 capitalize">My Courses</h2>
                    @role('admin')
                        <a href="{{ route('courses.create') }}"
                            class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-lw-light_blue">+</a>
                    @endrole
                </div>
                <hr class="mb-10">

                @forelse ($courses as $course)
                    <div
                        class="flex items-center justify-between mb-10 @if ($loop->first) course-div @endif">
                        <div onclick="location.href='{{ route('courses.show', $course->id) }}';"
                            class="group flex flex-col bg-gray-100 rounded-lg w-full justify-between shadow-md hover:shadow-xl cursor-pointer items-center pl-5 pt-5 @hasanyrole('guest|teacher|admin') pb-5 pr-5 @endrole">
                            <div class="flex w-full items-center">
                                <div class="w-3/12 mr-5">
                                    <div class="rounded-lg h-36"
                                        style="background-image: url('{{ url(Storage::url($course->image_url)) }}'); background-size: cover; ">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col justify-start">
                                    <div class="py-2 px-4 mb-5">
                                        <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                            {{-- <a href="blog/detail">{{$course->name}}</a> --}}
                                            {{ $course->name }}
                                        </h1>
                                    </div>

                                    <div class="flex px-4 space-x-2">
                                        @foreach ($course->categories as $category)
                                            <span
                                                class="flex flex-col bg-blue-500 rounded-full font-medium text-gray-100 px-3 pt-0.5">
                                                <p class="my-auto capitalize">{{ $category->name }}</p>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                            
                            @role('student')
                            @if (!$course->categories->pluck('name')->contains('Conversational'))
                                <div class="flex w-full" id="chart"></div>
                                @php
                                    $user_units = auth()->user()->units;
                                    if (count($user_units) <= 0) {
                                        $user_units = 0;
                                    } else {
                                        $user_units = auth()
                                            ->user()
                                            ->units->first()->order;
                                    }
                                @endphp
                                <script>
                                    var options = {
                                        series: [{
                                                name: 'Progress (Units)',
                                                data: [{{ $user_units }}]
                                            },
                                            {
                                                name: 'Remaining (Units)',
                                                data: [{{ count($course->units()) - $user_units }}]
                                            },
                                        ],
                                        grid: {
                                            padding: {
                                                left: -10,
                                                right: 80,
                                                top: 0,
                                                bottom: 0
                                            },
                                        },
                                        chart: {
                                            toolbar: {
                                                show: false
                                            },
                                            type: 'bar',
                                            height: 70,
                                            stacked: true,
                                            stackType: "100%",
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        legend: {
                                            show: false,
                                            position: 'top'
                                        },
                                        xaxis: {
                                            show: false,
                                            labels: {
                                                show: false
                                            },
                                            categories: ['{{ $course->name }}'],
                                        },
                                        yaxis: {
                                            show: false,
                                            labels: {
                                                show: false
                                            }
                                        },
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                                    chart.render();
                                </script>
                            @endif
                            @endrole
                        </div>
                        @role('admin')
                        <div onclick="location.href='{{ route('courses.details', $course->id) }}';"
                            class="flex justify-center text-3xl text-gray-400 hover:text-gray-600 cursor-pointer mx-6">
                            <i class="fas fa-info-circle mx-auto"></i>
                        </div>
                    @endrole
                </div>
                @empty
                    <div class="flex justify-center items-center">
                        <h1 class="text-2xl text-gray-500">You are not enroled in any course.</h1>
                    </div>
                @endforelse

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">



                </div>

            </div>
        </div>
    </div>
    @role('guest')
        <x-shepherd-tour tourName="guests/courses_preview" role="guest" />
    @endrole
    @role('teacher')
        <x-shepherd-tour tourName="teachers/courses_preview" role="teacher" />
    @endrole
</x-app-layout>
