<x-app-layout>
    @php
        $date = [];
        
        foreach ($invoices as $invoice) {
            $date[] = (new Carbon\Carbon($invoice->created_at))->isoFormat('MMMM G');
        }
        
        $date = array_unique($date);
        
    @endphp
    <div class="w-5/6 mx-auto">
        @forelse ($date as $month_year)
            <div
                class="bg-white rounded-t-lg flex justify-between items-center w-full items-left border-b border-gray-300 p-6">
                <p class="text-xl font-bold w-full text-left">{{ $month_year }}</p>
            </div>
            <table class="bg-white rounded-b-lg flex flex-col w-full mb-8">
                <thead>
                    <tr class="text-md py-3 px-6 flex justify-between">
                        <th class="text-left w-1/3">
                            Title</th>
                        <th class="text-center w-1/3">
                            Total</th>
                        <th class="text-center w-1/3">
                            Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        @if ((new Carbon\Carbon($invoice->created_at))->isoFormat('MMMM G') == $month_year)
                            <tr
                                class="flex justify-between py-3 border-t @if ($loop->last) border-b @endif border-gray-200 py-3 px-6 hover:bg-gray-50">
                                <td class="w-1/3 text-left italic">
                                    <a href="{{ route('invoices.show', $invoice->id) }}"
                                        class="hover:text-blue-500 hover:underline">
                                        {{ $invoice->title }}
                                    </a>
                                </td>
                                <td class="w-1/3 text-center">${{ $invoice->price }}</td>
                                <td class="w-1/3 text-center">
                                    {{ $invoice->created_at->isoFormat('L') }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @empty
            <div class="flex flex-col items-center h-screen pt-20">
                <i class="fas fa-receipt text-9xl text-gray-300 mb-10"></i>
                <p class="text-4xl text-gray-500">No invoices available</p>
                <p class="text-2xl text-gray-400 mb-10">You don't have any invoices in your account</p>
                {{-- <p class="text-xl text-gray-400 mb-10">Why not explore our products and make a purchase?</p> --}}
                <a href="{{ route('shop') }}"
                    class="bg-lw-blue py-2 px-4 rounded-md text-white hover:bg-blue-800 explore-products-button">Explore
                    Products 👀</a>
            </div>
        @endforelse
    </div>
</x-app-layout>
