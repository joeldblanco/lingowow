<div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
        @if (Cart::count() > 0)
        
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Product</th>
                            <th class="lg:text-right text-left pl-5 lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qty</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-right md:table-cell">Unit price</th>
                            <th class="text-right">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd(Cart::content())}} --}}
                        @foreach (Cart::content() as $item)
                            {{-- {{dd(Cart::content())}} --}}
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="{{ $item->image }}" class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                        <button wire:click.prevent="removeItem('{{ $item->rowId }}')"
                                            class="text-gray-700 md:ml-4">
                                            <small>(Remove item)</small>
                                        </button>
                                    </a>
                                </td>
                                <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="w-20 h-10">
                                        <div class="relative flex flex-row w-full h-8">
                                            @if (!$item->options->editable)
                                                <input type="text" value="{{ $item->qty }}"
                                                    class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black"
                                                    disabled />
                                            @else
                                                <button wire:click.prevent="decrementQtyItem('{{ $item->rowId }}')"><i
                                                        class="fas fa-minus"></i></button>
                                                <input type="text" value="{{ $item->qty }}"
                                                    class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black"
                                                    disabled />
                                                <button wire:click.prevent="incrementQtyItem('{{ $item->rowId }}')"><i
                                                        class="fas fa-plus"></i></button>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <span class="text-sm lg:text-base font-medium">
                                        ${{ $item->price }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <span class="text-sm lg:text-base font-medium">
                                        ${{ $item->price * $item->qty }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 -mx-2 lg:flex">
                    <div class="lg:px-2 lg:w-1/2">
                        <div class="p-4 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase">Coupon Code</h1>
                        </div>
                        <div class="p-4">
                            <p class="mb-4 italic">If you have a coupon code, please enter it in the box below</p>
                            <div class="justify-center md:flex">
                                <div class="flex items-center w-full h-13 pl-3 bg-gray-100 border rounded-full">
                                    <input type="coupon" name="code" id="coupon" placeholder="Apply coupon"
                                        value="90off"
                                        class="w-full bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none"
                                        wire:model="coupon_code" />
                                    <button
                                        class="text-sm flex items-center px-3 py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none"
                                        wire:click="applyCoupon">
                                        <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z" />
                                        </svg>
                                        <span class="font-medium">Apply coupon</span>
                                    </button>
                                </div>
                            </div>
                            <p class="text-red-600 font-semibold">{{ $coupon_error_message }}</p>
                        </div>
                        <div class="p-4 mt-6 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase">Instruction for seller</h1>
                        </div>
                        <div class="p-4">
                            <p class="mb-4 italic">If you have some information for the seller you can leave them in the
                                box below</p>
                            <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
                        </div>
                    </div>
                    <div class="lg:px-2 lg:w-1/2">
                        <div class="p-4 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                        </div>
                        <div class="p-4">
                            <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you
                                have entered</p>
                            {{-- <div class="flex justify-between border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                Subtotal
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                ${{Cart::subtotal()}}
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                                    <form action="" method="POST">
                                    <button type="submit" class="mr-2 mt-1 lg:mt-2">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                                    </button>
                                    </form>
                                    Coupon "90off"
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700">
                                    -133,944.77$
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    New Subtotal
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    14,882.75€
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    Tax
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    2,976.55€
                                </div>
                            </div> --}}
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    Total
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    ${{ Cart::total() }}
                                </div>
                            </div>
                            @if ($user->street == null || $user->city == null || $user->country == null || $user->zip_code == null)
                                <div x-data="{ editBillingAddress: false }" x-cloak
                                    class="bg-red-200 border border-red-400 w-full rounded-md p-5 text-red-500 space-y-4">
                                    <p>
                                        In order to make the payment, you must complete your profile with your billing
                                        address.
                                    </p>
                                    <p>
                                        You can go to your profile by clicking
                                        <span @click="editBillingAddress = true"
                                            class="text-blue-600 hover:underline cursor-pointer">here</span>, once there
                                        click on the "Edit profile" button
                                        and complete the address fields.
                                    </p>


                                    <x-modal type="info" name="editBillingAddress">
                                        <x-slot name="title">
                                            <p class="text-md ">Profile</p>
                                        </x-slot>

                                        <x-slot name="content">

                                            <div class="bg-white flex space-x-6 mx-4">
                                                <div class="border border-b rounded-xl divide-y w-1/3">
                                                    <div class="py-4">
                                                        <p>Profile Picture</p>
                                                    </div>
                                                    <div class="flex flex-col items-center space-y-4 p-4">
                                                        <div class="w-32 h-32 border-gray-400 bg-white">
                                                            <img id="profile_pic_preview"
                                                                src="{{ Storage::url(auth()->user()->profile_photo_path) }}"
                                                                class="w-full h-full object-cover rounded-full"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-white rounded-md w-2/3 p-6 my-4 mx-auto border border-b"
                                                    id="update_profile_form">
                                                    <div class="divide-y mb-5">
                                                        <p class="font-bold text-md mb-6 w-full text-left">
                                                            Account Details
                                                        </p>
                                                        <div>
                                                            <div class="flex pt-6 space-x-4">
                                                                <div class="space-y-1">
                                                                    <input type="text"
                                                                        placeholder="{{ $user->first_name }}"
                                                                        value="{{ $user->first_name }}"
                                                                        class="w-full rounded-md p-3 text-gray-400 border-gray-300"
                                                                        disabled>
                                                                </div>
                                                                <div class="space-y-1">
                                                                    <input type="text"
                                                                        placeholder="{{ $user->last_name }}"
                                                                        value="{{ $user->last_name }}"
                                                                        class="w-full rounded-md p-3 text-gray-400 border-gray-300"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="flex pt-6 space-x-4">
                                                                <div class="space-y-1">
                                                                    <input type="text"
                                                                        value="{{ $user->username }}" disabled
                                                                        class="w-full rounded-md p-3 text-gray-400 border-gray-300">
                                                                </div>
                                                                <div class="space-y-1">
                                                                    <input type="text"
                                                                        placeholder="{{ $user->email }}"
                                                                        value="{{ $user->email }}" disabled
                                                                        class="w-full rounded-md p-3 text-gray-400 border-gray-300">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divide-y mb-5 mt-16">
                                                        <p class="font-bold text-md mb-6 w-full text-left">
                                                            Billing Information
                                                        </p>
                                                        <div>
                                                            <div class="flex pt-6 space-x-4">
                                                                <div class="space-y-1 w-full">
                                                                    <input wire:model="street" type="text"
                                                                        name="street" id="street"
                                                                        placeholder="Street address" required
                                                                        value="{{ $user->street }}"
                                                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($user->street == null) border-red-600 @endif @if ($errors->has('street')) border-red-600 @else border-gray-300 @endif ">
                                                                    @if ($errors->has('street'))
                                                                        <p class="text-xs font-light text-red-600">
                                                                            {{ $errors->get('street')[0] }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="flex pt-6 space-x-4">
                                                                <div class="space-y-1">
                                                                    <input wire:model="city" type="text"
                                                                        name="city" id="city"
                                                                        placeholder="City" required
                                                                        value="{{ $user->city }}"
                                                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($user->city == null) border-red-600 @endif @if ($errors->has('city')) border-red-600 @else border-gray-300 @endif ">
                                                                    @if ($errors->has('city'))
                                                                        <p class="text-xs font-light text-red-600">
                                                                            {{ $errors->get('city')[0] }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="space-y-1">
                                                                    <input wire:model="country" type="text"
                                                                        name="country" id="country"
                                                                        placeholder="Country" required
                                                                        value="{{ $user->country }}"
                                                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($user->country == null) border-red-600 @endif @if ($errors->has('country')) border-red-600 @else border-gray-300 @endif ">
                                                                    @if ($errors->has('country'))
                                                                        <p class="text-xs font-light text-red-600">
                                                                            {{ $errors->get('country')[0] }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="flex pt-6 space-x-4 w-1/2">
                                                                <div class="space-y-1 mr-2">
                                                                    <input wire:model="zip_code" type="text"
                                                                        name="zip_code" id="zip_code"
                                                                        placeholder="ZIP Code" required
                                                                        value="{{ $user->zip_code }}"
                                                                        class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($user->zip_code == null) border-red-600 @endif @if ($errors->has('zip_code')) border-red-600 @else border-gray-300 @endif ">
                                                                    @if ($errors->has('zip_code'))
                                                                        <p class="text-xs font-light text-red-600">
                                                                            {{ $errors->get('zip_code')[0] }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex justify-end">
                                                        <button @click="editBillingAddress = false"
                                                            wire:click="saveBillingAddress"
                                                            class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                                            Save
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>

                                        </x-slot>

                                        <x-slot name="footer" class="justify-center">
                                        </x-slot>
                                    </x-modal>

                                </div>
                                <div wire:loading wire:target="saveBillingAddress">
                                    @include('components.loading-state')
                                </div>
                            @else
                                <a href="{{ route('payments.gateway') }}">
                                    <button
                                        class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow items-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                        <i class="fas fa-credit-card h-full text-xl"></i>
                                        <span class="ml-2 mt-5px">Credit/Debit Card</span>
                                    </button>
                                </a>
                                <a href="{{ route('paypal-checkout') }}">
                                    <button
                                        class="flex justify-center w-full px-10 py-3 mt-6 font-bold text-white uppercase rounded-full shadow items-center focus:shadow-outline focus:outline-none"
                                        style="background-color: #FFCC00; color: #2C2E2F;">
                                        <i class="fab fa-paypal h-full text-xl"></i>
                                        <span class="ml-2 mt-5px">PayPal</span>
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="px-10 py-3 font-medium mb-2 md:ml-4 text-2xl">No Items in Cart</p>
            <a href="{{ route('shop') }}">
                <button
                    class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                    <i class="fas fa-store text-2xl"></i>
                    <span class="ml-2 mt-5px">Back to shop</span>
                </button>
            </a>
        @endif
    </div>
</div>
