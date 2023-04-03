<x-app-layout>
    @php
        // $date = [];
        
        // foreach ($invoices as $invoice) {
        //     $date[] = (new Carbon\Carbon($invoice->created_at))->isoFormat('MMMM G');
        // }
        
        // $date = array_unique($date);
        $invoicesByDate = collect($invoices->items())->groupBy(function ($item, $key) {
            return (new Carbon\Carbon($item->created_at))->isoFormat('MMMM G');
        });
        
    @endphp
    <div class="w-4/5 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            {{ $invoices->links() }}
            @foreach ($invoicesByDate->sortBy('created_at') as $month_year => $invoicesGroup)
                <div
                    class="bg-white text-3xl font-bold w-full p-2 text-center flex justify-around border border-gray-200">
                    <div class="w-3/4">
                        <p class="p-4">{{ $month_year }}</p>

                    </div>
                    <div class="w-1/4 flex justify-center items-center">
                        <a href="{{ route('export', ['month' => $invoicesGroup->first()->created_at->month]) }}"
                            class="bg-lw-blue text-white text-sm text-center py-2 px-4 my-auto rounded-lg hover:bg-blue-800">Export</a>
                    </div>
                </div>
                <table class="text-left w-full border-collapse mb-16">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                ID</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                Customer</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                Total</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                Date</th>
                            <th
                                class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoicesGroup as $invoice)
                            {{-- @if ((new Carbon\Carbon($invoice->created_at))->isoFormat('MMMM G') == $month_year) --}}
                            <tr class="hover:bg-gray-200">
                                <td class="py-4 px-6 border-b border-gray-400">{{ $invoice->id }}</td>
                                <td class="py-4 px-6 border-b border-gray-400"><a
                                        href="{{ route('profile.show', $invoice->user->id) }}"
                                        class="hover:text-blue-600 hover:underline">{{ $invoice->user->first_name }}
                                        {{ $invoice->user->last_name }}</a>
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400">${{ $invoice->price }}</td>
                                <td class="py-4 px-6 border-b border-gray-400">
                                    {{ $invoice->updated_at->isoFormat('L') }}
                                </td>
                                <td class="py-4 px-6 border-b border-gray-400">
                                    <a href="{{ route('invoice.show', $invoice->id) }}"
                                        class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-50 hover:bg-blue-300">View</a>
                                </td>
                            </tr>
                            {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
            @endforeach
            {{ $invoices->links() }}
        </div>
    </div>
</x-app-layout>
