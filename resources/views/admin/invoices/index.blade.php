<x-app-layout>
    @php
        $invoicesByDate = collect($invoices->items())->groupBy(function ($item, $key) {
            return (new Carbon\Carbon($item->created_at))->isoFormat('MMMM G');
        });
    @endphp
    <div class="bg-white rounded-lg">
        @forelse ($invoicesByDate->sortBy('created_at') as $month_year => $invoicesGroup)
            <div class="flex justify-between items-center w-full items-left border-b border-gray-300 p-6">
                <p class="text-xl font-bold w-full text-left">{{ $month_year }}</p>

                <a href="{{ route('export', ['month' => $invoicesGroup->first()->created_at->month]) }}"
                    class="text-blue-800 text-xl text-center py-2 px-4 rounded-full cursor-pointer hover:text-blue-900 hover:bg-gray-100">
                    <i class="fas fa-download"></i>
                </a>
            </div>
            <table class="flex flex-col w-full">
                <thead>
                    <tr class="text-md py-3 px-6 flex justify-between">
                        <th class="text-left w-1/12">
                            ID</th>
                        <th class="text-left w-3/12">
                            Customer</th>
                        <th class="text-left w-2/12">
                            Total</th>
                        <th class="text-left w-2/12">
                            Date</th>
                        <th class="text-center w-1/12">
                            Method</th>
                        <th class="text-center w-1/12">
                            Paid</th>
                        <th class="text-center w-2/12">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoicesGroup as $invoice)
                        <tr
                            class="flex justify-between items-center border-t @if ($loop->last) border-b @endif border-gray-200 py-2 px-6 hover:bg-gray-50">
                            <td class="w-1/12 text-left">{{ $invoice->id }}</td>
                            <td class="w-3/12 text-left"><a href="{{ route('profile.show', $invoice->user->id) }}"
                                    class="hover:text-blue-600 hover:underline">{{ $invoice->user->first_name }}
                                    {{ $invoice->user->last_name }}</a>
                            </td>
                            <td class="w-2/12 text-left">${{ $invoice->price }}</td>
                            <td class="w-2/12 text-left">
                                {{ $invoice->created_at->isoFormat('DD/MM/YYYY') }}
                            </td>
                            <td class="w-1/12 text-center">
                                @if ($invoice->payment_method == 'niubiz')
                                    <i class="fas fa-credit-card fa-lg" style="color: #3145b9;"></i>
                                @elseif ($invoice->payment_method == 'paypal')
                                    <i class="fab fa-paypal fa-lg" style="color: #3145b9;"></i>
                                @else
                                    <i class="fas fa-exclamation-triangle fa-lg text-yellow-500"></i>
                                @endif
                            </td>
                            <td class="w-1/12 text-center">
                                @if ($invoice->paid)
                                    <i class="fas fa-check-circle text-green-600"></i>
                                @else
                                    <i class="fas fa-times-circle text-red-600"></i>
                                @endif
                            </td>
                            <td class="flex w-2/12 justify-center space-x-2 text-md">
                                <a href="{{ route('invoices.show', $invoice->id) }}"
                                    class="text-gray-600 font-bold p-3 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @role('admin')
                                    <a href="{{ route('invoices.edit', $invoice->id) }}"
                                        class="text-gray-600 font-bold p-3 rounded-full hover:bg-gray-100">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @empty
            <div class="flex flex-col items-center h-screen pt-20">
                <i class="fas fa-receipt text-9xl text-gray-300 mb-10"></i>
                <p class="text-4xl text-gray-500">No invoices available</p>
                <p class="text-2xl text-gray-400 mb-10">You don't have any invoices in your account</p>
                <a href="{{ route('shop') }}"
                    class="bg-lw-blue py-2 px-4 rounded-md text-white hover:bg-blue-800 explore-products-button">Explore
                    Products 👀</a>
            </div>
        @endforelse
        <div class="py-4">
            {{ $invoices->links('vendor.pagination.berrydashboard') }}
        </div>
    </div>
</x-app-layout>
