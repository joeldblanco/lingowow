<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">Code</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Total</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Disposable</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400 text-center">Created at</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($coupons as $coupon)
                        <tr class="hover:bg-gray-200">
                            {{-- "model_id"
                            "data"
                            "is_disposable" --}}
                            {{-- "expires_at"
                            "created_at"
                            "updated_at" --}}

                            <td class="py-4 px-6 border-b border-gray-400">{{$coupon->code}}</td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center">${{$coupon->price}}</td>
                            <td class="py-4 px-6 border-b border-gray-400 mx-auto text-center">
                                <input type="checkbox" @if($coupon->is_disposable) checked @endif disabled/>
                            </td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center">{{$coupon->updated_at->isoFormat('L')}}</td>
                            <td class="py-4 px-6 border-b border-gray-400 text-center">
                                <a href="{{route('invoices.show',$coupon->id)}}" class="text-gray-600 font-bold py-1 px-3 rounded text-xs bg-blue-100 hover:bg-blue-500 hover:text-white">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>