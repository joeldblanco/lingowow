<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-10 mb-20">
                    <h1 class="text-3xl font-bold text-center text-gray-500 mb-12">Plans
                        ({{ $plans->count() }})
                    </h1>
                    <div class="w-full flex justify-end mb-6">
                        <a href="{{ route('plans.create') }}"
                            class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-lw-light_blue">+</a>
                    </div>

                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Name & Description</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Product</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">
                                    Plan Price (Monthly)
                                </th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan)
                                <tr class="hover:bg-gray-200 module">
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white">
                                        <div class="w-full text-gray-600">
                                            <a href="{{ route('plans.show', $plan->id) }}"
                                                class="text-lg font-bold">{{ $plan->name }}</a>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white">
                                        <div class="w-full text-gray-600">
                                            @if (!empty($plan->product))
                                                <a href="{{ route('products.show', $plan->product->id) }}"
                                                    class="text-lg">{{ $plan->product->name }}</a>
                                            @else
                                                <p class="italic">NULL</p>
                                            @endif
                                        </div>

                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white text-center">
                                        <div class="w-full text-gray-600">
                                            @if (!empty($plan->product))
                                                @if ($plan->product->categories->pluck('name')->contains('Synchronous'))
                                                    @if ($plan->sale_price == null)
                                                        <p class="text-sm">
                                                            ${{ $plan->monthly_classes * $plan->product->regular_price }}
                                                        </p>
                                                    @else
                                                        <p class="text-sm">
                                                            ${{ $plan->monthly_classes * $plan->product->sale_price }}
                                                        </p>
                                                    @endif
                                                @else
                                                    @if ($plan->sale_price == null)
                                                        <p class="text-sm">
                                                            ${{ $plan->product->regular_price }}
                                                        </p>
                                                    @else
                                                        <p class="text-sm">
                                                            ${{ $plan->product->sale_price }}
                                                        </p>
                                                    @endif
                                                @endif
                                            @else
                                                <p class="text-sm">NULL</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500 bg-white">
                                        <div class="flex justify-end items-center">
                                            <a href="{{ route('plans.edit', $plan->id) }}" title="Edit"><i
                                                    class="fas fa-pen m-1"></i></a>
                                            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete"><i
                                                        class="fas fa-trash m-1"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
