<div class="w-full bg-blue pt-8" x-data="{ open: false }">
  <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0">
      
      <div class="sm:flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg rounded-tr-none bg-white mt-4 flex flex-col shadow-2xl">
          <div class="p-8 text-3xl font-bold text-center">{{ucfirst($products[0]->plan)}}</div>
          <div class="border-0 border-gray-light border-t border-solid text-sm">
              <div class="text-center border-0 border-gray-light border-b border-solid py-4">
              1 Ice Cream
              </div>
              <div class="text-center border-0 border-gray-light border-b border-solid py-4">
              Unlimited toppings
              </div>
              <div class="text-center border-0 border-gray-light border-b border-solid py-4">
              Analytics
              </div>
          </div>
          <div class="w-full text-center px-8 pt-8 text-xl mt-auto flex-col flex">
              <span class="text-gray-400 italic line-through">
              {{$products[0]->regular_price}}
              </span>
              <span class="font-bold text-2xl">{{$products[0]->sale_price}}</span>
          </div>
          <div class="text-center mb-8 mt-auto">
              <a href="#" @click="{open=true; setTimeout(() => open = false, 3000)}" wire:click.prevent="store({{$products[0]->id}}, '{{$products[0]->name}}', {{$products[0]->sale_price}})" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</a>
          </div>
      </div>
    
    <div class="flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg bg-white mt-4 sm:-mt-4 shadow-2xl z-10 flex flex-col">
      <div class="w-full p-8 text-3xl font-bold text-center">{{ucfirst($products[1]->plan)}}</div>
      <div class="w-full border-0 border-gray-light border-t border-solid text-sm">
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          2 Ice Creams
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          25 Cones
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Unlimited toppings
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Analytics
        </div>
      </div>
      <div class="w-full text-center px-8 pt-8 text-xl mt-auto flex-col flex">
        <span class="text-gray-400 italic line-through">
          {{$products[1]->regular_price}}
        </span>
        <span class="font-bold text-2xl">{{$products[1]->sale_price}}</span>
      </div>
      <div class="w-full text-center mb-8 mt-auto">
        <a href="#" @click="{open=true; setTimeout(() => open = false, 3000)}" wire:click.prevent="store({{$products[1]->id}}, '{{$products[1]->name}}', {{$products[1]->sale_price}})" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</a>
      </div>
    </div>

    <div class="flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg bg-white mt-4 sm:-mt-4 shadow-2xl z-10 flex flex-col">
      <div class="w-full p-8 text-3xl font-bold text-center">{{ucfirst($products[1]->plan)}}</div>
      <div class="w-full border-0 border-gray-light border-t border-solid text-sm">
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          2 Ice Creams
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          25 Cones
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Unlimited toppings
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Analytics
        </div>
      </div>
      <div class="w-full text-center px-8 pt-8 text-xl mt-auto flex-col flex">
        <span class="text-gray-400 italic line-through">
          {{$products[1]->regular_price}}
        </span>
        <span class="font-bold text-2xl">{{$products[1]->sale_price}}</span>
      </div>
      <div class="w-full text-center mb-8 mt-auto">
        <a href="#" @click="{open=true; setTimeout(() => open = false, 3000)}" wire:click.prevent="store({{$products[3]->id}}, '{{$products[3]->name}}', {{$products[3]->sale_price}})" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</a>
      </div>
    </div>
    
    <div class="flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg rounded-tl-none bg-white mt-4 flex flex-col shadow-2xl">
      <div class="p-8 text-3xl font-bold text-center">{{ucfirst($products[2]->plan)}}</div>
      <div class="border-0 border-gray-light border-t border-solid text-sm">
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Unlimited Ice Creams
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Unlimited Cones
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Unlimited toppings
        </div>
        <div class="text-center border-0 border-gray-light border-b border-solid py-4">
          Analytics
        </div>
      </div>
      <div class="text-center px-8 pt-8 text-xl mt-auto flex-col flex">
        <span class="text-gray-400 italic line-through">
          {{$products[2]->regular_price}}
        </span>
        <span class="font-bold text-2xl">{{$products[2]->sale_price}}</span>
      </div>
      <div class="text-center pt-8 mb-8 mt-auto">
        <button @click="{open=true; setTimeout(() => open = false, 3000)}" wire:click="$emit('store',{{$products[2]->id}}, '{{$products[2]->name}}', {{$products[2]->sale_price}})" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</button>
      </div>
    </div>
  </div>
  <div x-show.transition.duration.200ms="open" @click.away="open=false" class="flex justify-center fixed bottom-5 left-5 z-20">
    <div class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-green-600 border-green-600 text-white">
        <div>
          Item added to Cart
        </div>
        <div class="flex mt-2 sm:mt-0 sm:ml-4">
            <a href="{{route('cart')}}" class="px-3 py-2 hover:bg-green-700 transition ease-in-out duration-300"> View Cart </a>
            {{-- <a @click="open = false" class="px-3 py-2 hover:bg-green-700 transition ease-in-out duration-300 cursor-pointer"> Dismiss </a> --}}
        </div>
    </div>
  </div>
</div>