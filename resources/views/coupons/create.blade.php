<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('coupons.store') }}"
                    class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    @csrf
                    <div class="divide-y">
                        <p class="font-bold text-2xl mb-6">
                            New Coupon
                        </p>
                        <div>
                            <div class="py-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Value</p>
                                <input type="number" name="coupon_value" id="coupon_value" step="0.01"
                                    min="0" placeholder="Enter coupon value" required
                                    class="w-full rounded-md p-3 text-gray-600 hover:border-gray-600 @if ($errors->has('coupon_value')) border-red-600 @else border-gray-300 @endif ">
                                @if ($errors->has('coupon_value'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('coupon_value')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please enter coupon code</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Coupon type</p>
                                <select name="coupon_type" id="coupon_type" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('coupon_type')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a coupon type</option>
                                    @foreach ($couponTypes as $type)
                                        <option value="{{ $type }}">
                                            {{ Str::ucfirst($type) }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('coupon_type'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('coupon_type')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a type for the coupon</p>
                            </div>
                            <div class="pb-6 space-y-1">
                                <p class="font-bold text-gray-600 mb-1">Product</p>
                                <select name="product_id" id="product_id" required
                                    class="w-full rounded-md hover:border-gray-600 p-3 text-gray-600 @if ($errors->has('product_id')) border-red-600 @else border-gray-300 @endif">
                                    <option value="none" selected disabled hidden>Select a product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ Str::ucfirst($product->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_id'))
                                    <p class="text-xs font-light text-red-600">{{ $errors->get('product_id')[0] }}</p>
                                @endif
                                <p class="text-gray-500 text-sm font-light">Please select a product for the coupon</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-end">
                        <button class="bg-blue-500 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
