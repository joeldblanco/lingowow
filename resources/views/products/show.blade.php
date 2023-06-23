<x-app-layout>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="flex justify-around mx-auto w-3/4 h-full">
                    <div class="w-1/2 border border-gray-200 rounded-md p-2 h-full my-auto">
                        <img class="h-full object-cover rounded-md w-full" src="{{ Storage::url($product->image) }}" alt="">
                    </div>
                    <div class="w-1/2 p-5 h-full">
                        <div class="mb-5">
                            <p class="text-gray-400 uppercase mb-2">{{ $product->categories->pluck('name')->random() }}
                            </p>
                            <p class="text-3xl font-bold text-gray-800">{{ $product->name }}</p>
                        </div>
                        <div class="border-b border-gray-100">
                            <p class="text-gray-500 text-justify leading-relaxed pb-5">{{ $product->description }}</p>
                        </div>
                        <div class="flex py-5 justify-between">
                            <div class="flex space-x-2 text-2xl">
                                <p class="text-gray-400 italic line-through">${{ $product->regular_price }}</p>
                                <p class="font-bold text-gray-800">${{ $product->sale_price }}</p>
                            </div>
                            <a href="#" class="bg-lw-blue py-2 px-4 rounded-md text-white text-sm hover:bg-blue-800">
                                Add to cart <i class="fas fa-shopping-cart font-thin"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
