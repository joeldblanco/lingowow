{{-- COMPONENTE DEL CURSO --}}

<div class="flex justify-between m-6">
    <div class="flex flex-col h-full max-w-lg mx-auto bg-gray-800 rounded-lg">
              <a href="courses/{{$id}}">
              <img
              class="rounded-lg rounded-b-none"
              src="{{$image}}"
              alt="thumbnail"
              loading="lazy"/>
              </a>
            <div class="flex justify-between -mt-4 px-4">
              <span
                class="inline-block ring-4 bg-red-500 ring-gray-800 rounded-full text-sm font-medium tracking-wide text-gray-100 px-3 pt-0.5"
                >Basico</span
              >
            </div>

            <div class="py-2 px-4">
              <h1
                class="text-xl font-medium leading-6 tracking-wide text-gray-300 hover:text-blue-500 cursor-pointer"
              >
                <a href="blog/detail">"{{$name}}"</a>
              </h1>
            </div>
          </div>
  </div>