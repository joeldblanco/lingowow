<div class="w-full bg-blue pt-8" x-data="{ open: @entangle('popup'), pricingTableModal: @entangle('pricingTableModal') }" id="plans" x-cloak>



    <x-modal type="info" name="pricingTableModal">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0 pricing-table"
                style="width: calc(100vw - 6rem);">
                @foreach ($plans->sortBy('id') as $plan)
                    <div
                        class="sm:flex-1 lg:flex-none flex-initial w-1/3 rounded-t-lg rounded-tr-none bg-white @if ($loop->index == 1) z-10 @else mt-4 @endif flex flex-col shadow-2xl">
                        <div class="p-8 text-3xl font-bold text-center">{{ ucfirst($plan->name) }}</div>
                        <div class="border-0 border-gray-light border-t border-solid text-sm">
                            @foreach ($plan->features as $feature)
                                <div
                                    class="flex space-x-5 items-center justify-around border-0 border-gray-light border-b border-solid p-6 pl-8">
                                    @if ($feature->pivot->status)
                                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                    @else
                                        {{-- <i class="fas fa-times-circle text-red-500 text-xl"></i> --}}
                                        <i class="fas fa-check-circle text-gray-300 text-xl"></i>
                                    @endif
                                    <div class="flex justify-end text-right w-full items-center space-x-2"
                                        x-data="{ modalDetails: false }">
                                        <p
                                            class="text-md @if (!$feature->pivot->status) text-gray-400 line-through @endif">
                                            @if (Str::contains($feature->name, 'Personalized Classes'))
                                                {{ $plan->monthly_classes / 4 }} {{ $feature->name }} per week
                                            @else
                                                {{ $feature->name }}
                                            @endif
                                        </p>
                                        @if ($feature->details != null)
                                            <div class="relative cursor-pointer">
                                                <div x-show="modalDetails" @mouseenter="modalDetails = true"
                                                    @mouseleave="modalDetails = false"
                                                    class="bg-black opacity-90 p-4 rounded-lg absolute z-20 bottom-4 -left-20 text-white w-40 space-y-4 cursor-default">
                                                    <p class="text-left">{{ json_decode($feature->details)->content }}
                                                    </p>
                                                    @if (json_decode($feature->details)->link != 'null')
                                                        <a href="{{ json_decode($feature->details)->link }}"
                                                            target="_blank"
                                                            class="text-left hover:text-blue-500 hover:underline inline-block">Learn
                                                            more <i class="fas fa-external-link-alt text-xs"></i></a>
                                                    @endif
                                                </div>
                                                <i @mouseenter="modalDetails = true" @mouseleave="modalDetails = false"
                                                    class="far fa-question-circle text-gray-300"></i>
                                            </div>
                                        @else
                                            <div class="relative">
                                                <i class="far fa-question-circle text-white"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- {{dd($product->sale_price)}} --}}
                        <div class="w-full text-center px-8 pt-8 text-xl mt-auto flex-col flex">
                            @if ($product->categories->pluck('name')->contains('Synchronous'))
                                @if ($product->sale_price == null)
                                    <div>
                                        <span
                                            class="font-bold text-3xl text-gray-800">${{ $product->regular_price * $plan->monthly_classes }}</span>
                                        <span class="text-gray-400">/mo</span>
                                    </div>
                                @else
                                    <span class="text-gray-400 italic line-through">
                                        ${{ $product->regular_price * $plan->monthly_classes }}
                                    </span>
                                    <span
                                        class="font-bold text-2xl">{{ $product->sale_price * $plan->monthly_classes }}</span>
                                @endif
                            @else
                                @if ($product->sale_price == null)
                                    <div>
                                        <span
                                            class="font-bold text-3xl text-gray-800">${{ $product->regular_price }}</span>
                                        <span class="text-gray-400">/mo</span>
                                    </div>
                                @else
                                    <span class="text-gray-400 italic line-through">
                                        ${{ $product->regular_price }}
                                    </span>
                                    <span class="font-bold text-2xl">{{ $product->sale_price }}</span>
                                @endif
                            @endif
                        </div>
                        <div class="text-center
                                                mb-8 mt-4">
                            @if ($product->courses->first()->modality == 'synchronous')
                                <button wire:click="store('{{ $plan->monthly_classes / 4 }}', true)"
                                    class=" @if ($loop->index == 1) select-button @endif inline-block bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Select</button>
                            @else
                                <button wire:click="store()"
                                    class=" @if ($loop->index == 1) select-button @endif inline-block bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Select</button>
                            @endif

                        </div>
                    </div>
                @endforeach
                {{-- <button @click="open=true; setTimeout(() => open = false, 3000)" class="inline-block bg-blue-800 text-white px-6 py-4 rounded-lg hover:bg-blue-900 hover:text-white hover:no-underline">Add to Cart</button> --}}
            </div>
        </x-slot>

        <x-slot name="footer" class="justify-center">
        </x-slot>
    </x-modal>

    <div x-show="open; setTimeout(() => open = false, 5000)" x-transition.duration.100ms @click.outside="open=false"
        class="flex justify-center fixed bottom-5 left-5 z-20">
        <div
            class="w-full px-6 py-3 shadow-2xl flex flex-col items-center border-t sm:w-auto sm:m-4 sm:rounded-lg sm:flex-row sm:border bg-{{ $popup_color }}-600 border-{{ $popup_color }}-600 text-white">
            <div>
                {{ $popup_message }}
            </div>
            <div class="flex mt-2 sm:mt-0 sm:ml-4">
                {{-- <a href="{{route('cart')}}" class="px-3 py-2 hover:bg-green-700 transition ease-in-out duration-300"> View Cart </a> --}}
                <a @click="open = false"
                    class="px-3 py-2 hover:bg-{{ $popup_color }}-700 transition ease-in-out duration-300 cursor-pointer">
                    Dismiss </a>
            </div>
        </div>
    </div>

    <div wire:loading wire:target="store">
        @include('components.loading-state')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/pricingTable.js') }}" defer></script>

    {{-- @role('guest')
        <x-shepherd-tour tourName="guests/pricing-table" role="guest" />
    @endrole  --}}
</div>
