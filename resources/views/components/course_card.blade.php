{{-- COMPONENTE DEL CURSO --}}

{{-- <div class="flex justify-between m-6"> --}}
  <div class="flex flex-row bg-gray-100 rounded-lg w-full justify-between my-20 shadow-md hover:shadow-xl cursor-pointer h-40 items-center">

    <a href="courses/{{$id}}" class="w-1/6 m-5">
      <img
      class="rounded-lg rounded-b-none w-full"
      src="{{$image}}"
      alt="thumbnail"
      loading="lazy"/>
    </a>

    <div class="w-full flex flex-col justify-start">
      <div class="py-2 px-4 mb-5">
        <h1
          class="text-xl font-medium leading-6 text-gray-300 hover:text-blue-500 cursor-pointer"
        >
          <a href="blog/detail">"{{$name}}"</a>
        </h1>
      </div>
  
      <div class="flex px-4 h">
        <span
          class="flex bg-red-500 rounded-full font-medium text-gray-100 px-3 pt-0.5"
          >Basico</span
        >
      </div>
    </div>

  </div>
{{-- </div> --}}