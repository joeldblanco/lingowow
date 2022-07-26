{{-- VISTA DE LOS CURSOS --}}
<x-app-layout>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <h2 class="text-4xl font-bold my-10 text-gray-800">My Courses</h2>
                <hr class="mb-10 mt-10">


                @foreach ($courses as $course)
                    {{-- <x-course_card id="{{$course->id}}" name="{{$course->course_name}}" image="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"/> --}}
                    <div onclick="location.href='{{route('course.show',$course->id)}}';"
                        class="group flex flex-row bg-gray-100 rounded-lg w-full justify-between mb-10 shadow-md hover:shadow-xl cursor-pointer h-40 items-center">

                        <div class="w-3/12 m-5">
                            <img class="rounded-lg rounded-b-none"
                                src="https://img.pixers.pics/pho_wat(s3:700/FO/60/89/19/91/700_FO60891991_9eb8248aebe7688d0b16c848c91d86e9.jpg,700,467,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,417,jpg)/almohadas-largas-ee-uu-y-el-reino-unido-de-la-bandera.jpg.jpg"
                                alt="thumbnail" loading="lazy" />
                        </div>
                        <div class="w-full flex flex-col justify-start">
                            <div class="py-2 px-4 mb-5">
                                <h1 class="text-2xl leading-6 text-blue-800 font-semibold">
                                    {{-- <a href="blog/detail">{{$course->course_name}}</a> --}}
                                    {{ $course->course_name }}
                                </h1>
                            </div>

                            <div class="flex px-4 space-x-2">
                                <span
                                    class="flex flex-col @if ($course->course_category == 'Spanish') bg-blue-500 @else bg-red-500 @endif rounded-full font-medium text-gray-100 px-3 pt-0.5">
                                    <p class="my-auto capitalize">{{ $course->course_category }}</p>
                                </span>
                                <span
                                    class="flex flex-col @if ($course->course_modality == 'synchronous') bg-green-500 @else bg-purple-500 @endif rounded-full font-medium text-gray-100 px-3 pt-0.5">
                                    <p class="my-auto capitalize">{{ $course->course_modality }}</p>
                                </span>
                            </div>
                        </div>
                        <div class="text-3xl text-gray-400 w-1/12 group-hover:text-blue-500">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                @endforeach
                {{-- </div> --}}

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- <x-jet-welcome /> --}}



                </div>

            </div>
        </div>
    </div>
</x-app-layout>
