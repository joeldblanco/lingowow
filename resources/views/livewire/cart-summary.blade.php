<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-data="{ cartSummary: @entangle('show') }"
    x-cloak>
    <!--
  Background backdrop, show/hide based on slide-over state.

  Entering: "ease-in-out duration-500"
    From: "opacity-0"
    To: "opacity-100"
  Leaving: "ease-in-out duration-500"
    From: "opacity-100"
    To: "opacity-0"
-->
    {{-- <div class="relative py-2">
    </div> --}}
    <div class="relative">
        <div @click="cartSummary = !cartSummary" x-show="!cartSummary" class="fixed right-0" style="bottom: 40%">
            <div
                class="flex justify-center items-center bg-purple-600 hover:bg-purple-700 p-4 w-14 rounded-l-md text-gray-100 cursor-pointer">
                <div class="absolute top-1 right-1">
                    <p
                        class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-2 border-2 border-white text-xs text-white">
                        {{ $count }}
                    </p>
                </div>
                <i class="fas fa-shopping-cart text-2xl"></i>
            </div>
        </div>
    </div>



    <div x-show="cartSummary" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
        
        <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-auto fixed inset-y-0 right-0 flex max-w-full pl-10"
                    @click.outside="cartSummary = false">
                    <!--
        Slide-over panel, show/hide based on slide-over state.

        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-full"
          To: "translate-x-0"
        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-0"
          To: "translate-x-full"
      -->
                    <div class="pointer-events-auto w-full max-w-md">
                        <div class="flex h-screen flex-col overflow-y-auto bg-white shadow-xl"
                            style="padding-bottom: 90px">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" @click="cartSummary = false"
                                            class="-m-2 p-2 text-gray-400 hover:text-gray-500 cursor-pointer">
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            @forelse ($items as $item)
                                                <li class="flex py-6">
                                                    <div
                                                        class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        @php
                                                            $product = App\Models\Product::find($item->id);
                                                        @endphp
                                                        <img src="{{ Storage::url($product->image) }}"
                                                            class="h-full w-full object-cover object-center">
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div
                                                                class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <p>{{ $product->name }}</p>
                                                                </h3>
                                                                <p class="ml-4">${{ $item->price }}</p>
                                                            </div>
                                                            @if ($product->categories()->count() > 0)
                                                                <p class="mt-1 text-sm text-gray-500">
                                                                    {{ $product->categories()->pluck('name')->random() }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <p class="text-gray-500">Qty {{ $item->qty }}</p>

                                                            <div class="flex">
                                                                <button type="button"
                                                                    wire:click="removeItem('{{ $item->rowId }}')"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove
                                                                    {{-- @if ($item->options->keys()->contains('enrollable')) <span class="text-xs text-gray-400">(Auto-remove in < 20 min.)</span> @endif --}}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <p class="text-xl text-gray-400">No items in cart</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>{{ $subTotal }}</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <a href="{{ route('cart') }}"
                                        class="flex items-center justify-center rounded-md border border-transparent bg-lw-blue px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <a href="{{ route('shop') }}" type="button"
                                            class="font-medium text-lw-blue hover:text-indigo-500">
                                            Continue Shopping
                                            <span aria-hidden="true"> &rarr;</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
