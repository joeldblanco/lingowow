<div class="w-full bg-blue pt-8" x-data="{ open: false }" id="plans">
  <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0">
    {{-- {{dd($plans[0]->plan_name)}} --}}
    @foreach ($plans as $plan)
      <div class="sm:flex-1 lg:flex-initial lg:w-1/4 rounded-t-lg rounded-tr-none bg-white @if($loop->index == 1) z-10 @else mt-4 @endif flex flex-col shadow-2xl">
        <div class="p-8 text-3xl font-bold text-center">{{ucfirst($plan->plan_name)}}</div>
          <div class="border-0 border-gray-light border-t border-solid text-sm">
            <div class="text-center border-0 border-gray-light border-b border-solid py-4">
              {{0}}
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
            {{$product[0]->regular_price*$plan->n_classes}}
          </span>
          <span class="font-bold text-2xl">{{$product[0]->sale_price*$plan->n_classes}}</span>
        </div>
        <div class="text-center mb-8 mt-4">
          <button wire:click="store('{{$plan->n_classes/4}}')" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</button>
        </div>
      </div>
    @endforeach
    {{--<button @click="{open=true; setTimeout(() => open = false, 3000)}" onclick="savePricingTableItem('{{route('schedule.update')}}','{{$products[2]->plan}}')" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</button>--}}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/pricingTable.js') }}" defer></script>
</div>