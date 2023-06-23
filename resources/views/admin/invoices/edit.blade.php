<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="bg-white rounded-md w-1/2 p-6 my-4 mx-auto border border-gray-400">
                    <form method="POST" action="{{ route('invoice.update', $invoice->id) }}" id="invoice_update">
                        @csrf
                        @method('PATCH')
                        <div class="divide-y">
                            <p class="font-bold text-2xl mb-6">
                                Edit Invoice
                            </p>
                            <div>
                                <div class="pt-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Customer</p>
                                    <input type="text" name="customer_name" id="customer_name"
                                        placeholder="{{ $invoice->user->first_name }} {{ $invoice->user->last_name }}"
                                        value="{{ $invoice->user->first_name }} {{ $invoice->user->last_name }}"
                                        disabled class="w-full rounded-md p-3 text-gray-400 border-gray-400">
                                    {{-- <p class="text-gray-500 text-sm font-light">Please enter course name</p> --}}
                                </div>
                                <div class="pt-6 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Date</p>
                                    <input type="text" name="invoice_date" id="invoice_date"
                                        placeholder="{{ $invoice->created_at }}" value="{{ $invoice->created_at }}"
                                        disabled class="w-full rounded-md p-3 text-gray-400 border-gray-400">
                                    {{-- <p class="text-gray-500 text-sm font-light">Please enter course name</p> --}}
                                </div>
                                <div class="py-4 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Items</p>
                                    <div id="selected-categories" name="selected-categories"
                                        class="bg-white border border-gray-300 rounded p-2">
                                        <table class="w-full text-sm text-gray-500 my-4">
                                            <thead>
                                                <tr class="flex justify-between px-2 font-bold mb-3">
                                                    <td class="w-full">Name</td>
                                                    <td class="w-1/4 text-center">Qty</td>
                                                    <td class="w-1/4 text-right">Price</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoice->items as $item)
                                                    <tr class="flex justify-between px-2 italic">
                                                        <td class="w-full">{{ $item->item_name }}</td>
                                                        <td class="w-1/4 text-center">{{ $item->item_qty }}</td>
                                                        <td class="w-1/4 text-right">${{ $item->item_price }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr
                                                    class="flex justify-between px-2 italic mt-4 p-2 border-t font-bold">
                                                    <td class="w-full text-left">Total</td>
                                                    <td class="w-full text-right">${{ $invoice->price }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="py-4 pt-3 space-y-1">
                                    <p class="font-bold text-gray-600 mb-1">Paid</p>
                                    <input type="checkbox" name="invoice_paid" id="invoice_paid"
                                        class="text-gray-500 border-gray-500"
                                        @if ($invoice->paid) checked @endif>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="w-full flex justify-end space-x-3">
                        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" id="invoice_delete"
                            x-data="{ deleteButton: true, deleteConfirmation: false }" x-cloak>
                            @csrf
                            @method('DELETE')
                            <button type="button" x-show="deleteButton"
                                @click="deleteButton = false; deleteConfirmation = true"
                                class="bg-red-600 hover:bg-red-700 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                Delete
                            </button>
                            <button type="submit" form="invoice_delete" x-show="deleteConfirmation"
                                class="bg-red-600 hover:bg-red-700 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                        <button type="submit" form="invoice_update"
                            class="bg-blue-500 hover:bg-blue-700 py-1 px-3 rounded-md font-semibold text-white shadow-lg text-lg">
                            Save
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
