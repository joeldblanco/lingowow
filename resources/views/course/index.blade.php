{{-- VISTA DE LOS CURSOS --}}
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
                    {{-- <x-course_card id="{{$course->id}}" name="{{$course->name}}" image="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"/> --}}
                    <div
                        class="flex items-center justify-between mb-10 @if ($loop->first) course-div @endif">
                        <div onclick="location.href='{{ route('courses.show', $course->id) }}';"
                            class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between shadow-md hover:shadow-xl cursor-pointer h-40 items-center">

                            <div class="w-3/12 m-5">
                                <img class="rounded-lg rounded-b-none"
                                    src="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"
                                    alt="thumbnail" loading="lazy" />
                            </div>
                            <div class="w-full flex flex-col justify-start">
                                <div class="py-2 px-4 mb-5">
                                    <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                        {{-- <a href="blog/detail">{{$course->name}}</a> --}}
                                        {{ $course->name }}
                                    </h1>
                                </div>

                                <div class="flex px-4 space-x-2">
                                    <span
                                        class="flex flex-col @if ($course->category == 'Spanish') bg-blue-500 @else bg-red-500 @endif rounded-full font-medium text-gray-100 px-3 pt-0.5">
                                        <p class="my-auto capitalize">{{ $course->category }}</p>
                                    </span>
                                    <span
                                        class="flex flex-col @if ($course->modality == 'synchronous') bg-green-500 @else bg-purple-500 @endif rounded-full font-medium text-gray-100 px-3 pt-0.5">
                                        <p class="my-auto capitalize">{{ $course->modality }}</p>
                                    </span>
                                </div>
                            </div>
                            <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                                <i class="fas fa-chevron-right"></i>
                            </div>
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
                {{-- </div> --}}

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- <x-jet-welcome /> --}}



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
