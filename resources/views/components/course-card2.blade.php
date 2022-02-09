<div class="max-w-{{$size}} bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
    <div id="header" class="flex"> 
       <img alt="mountain" class="w-45 rounded-md border-2 border-gray-300" src="{{$attributes['post_pic_url']}}" />
       <div id="body" class="flex flex-col ml-5">
          <h4 id="name" class="text-xl font-semibold mb-2">{{$title}}</h4>
          <p id="job" class="text-gray-800 mt-2">{{$slot}}</p>
          <div class="flex mt-5">
             <img alt="avatar" class="w-6 rounded-full border-2 border-gray-300" src="{{$attributes['author_pic_url']}}" />
             <p class="ml-3">{{$author}}</p>
          </div>
       </div>
    </div>
 </div>