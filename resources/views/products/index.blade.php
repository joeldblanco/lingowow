<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-10 mb-20">
                    <h1 class="text-3xl font-bold text-center text-gray-500 mb-12">Products
                        ({{ $products->count() }})
                    </h1>

                    @role('admin')
                        <div class="w-full flex justify-end mb-6">
                            <a href="{{ route('products.create') }}"
                                class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-lw-light_blue">+</a>
                        </div>
                    @endrole

                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Id</th> --}}
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                </th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Name & Description</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    Regular Price
                                </th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    Sale Price
                                </th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                </th>
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Order</th> --}}
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Role</th> --}}
                                {{-- <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 w-2/12">
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="hover:bg-gray-200 module" id="{{ $product->id }}-{{ $product->order }}">
                                    {{-- <td class="py-4 px-6 border-b border-gray-400"><a
                                            href="{{ route('profile.show', $product->id) }}"
                                            class="hover:text-blue-600 hover:underline">{{ $product->id }}</a></td> --}}
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white">
                                        {{-- <div class="flex space-x-8 w-full items-center justify-evenly"> --}}
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="w-2/12 text-gray-600">
                                            <img src="{{ Storage::url($product->image) }}" alt="Product Image">
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white">
                                        <div class="w-full text-gray-600">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="text-lg font-bold">{{ $product->name }}</a>
                                            <p class="text-sm">{{ $product->description }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white text-center">
                                        <div class="w-full text-gray-600">
                                            <p class="text-sm">${{ $product->regular_price }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white text-center">
                                        <div class="w-full text-gray-600">
                                            @if ($product->sale_price == null)
                                                <p class="text-sm">${{ $product->regular_price }}</p>
                                            @else
                                                <p class="text-sm">${{ $product->sale_price }}</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white">
                                        <div class="flex justify-end items-center">
                                            <a href="{{ route('products.edit', $product->id) }}" title="Edit"><i
                                                    class="fas fa-pen m-1"></i></a>
                                            {{-- <a href="{{ route('products.details', $product->id) }}"
                                                    title="Details"><i class="fas fa-cog m-1"></i></a> --}}
                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete"><i
                                                        class="fas fa-trash m-1"></i></button>
                                            </form>

                                            {{-- <button title="Reorder" class="ml-8 cursor-move">
                                                <i class="fas fa-grip-lines"></i>
                                            </button> --}}
                                        </div>
                                        {{-- </div> --}}
                                    </td>
                                    {{-- <td class="py-4 px-6 border-b border-gray-400">{{ $product->order }}</td> --}}
                                    {{-- <td class="py-4 px-6 border-b border-gray-400 capitalize">
                                        {{ $product->getRoleNames()->first() }}</td> --}}
                                    {{-- <td class="py-4 px-6 border-b border-gray-400 text-gray-500 flex justify-end">
                                        
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="flex justify-end my-2">
                        <button class="mt-4 px-4 py-2 bg-lw-blue rounded-lg text-white font-bold"
                            onclick="sendRequest()">Save</button>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
