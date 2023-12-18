<x-app-layout>
    <div class="bg-white rounded-lg">
        <div class="flex flex-col justify-center w-full items-left border-b border-gray-300 space-y-4 p-6">
            <div class="flex justify-between w-full">
                <p class="text-xl font-bold w-full text-left">Coupons</p>
                <a href="{{ route('coupons.create') }}"
                    class="bg-lw-blue text-white py-2 px-4 rounded-md font-semibold hover:bg-blue-800">New</a>
            </div>
            <div class="w-full flex flex-col items-center">
                @forelse ($coupons as $coupon)
                    <div class="w-5/6 mt-5">
                        <x-coupon :coupon="$coupon" />
                    </div>
                @empty
                    <div class="flex justify-between py-12 border-t border-gray-200 px-6">
                        <div class="font-bold w-full text-center text-gray-600">
                            <i class="fas fa-ticket-alt text-9xl text-gray-300"></i>
                            <p class="text-2xl text-gray-400">There are no coupons</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
        {{-- <table class="flex flex-col w-full">
            <thead>
                <tr class="text-md py-3 px-6 flex justify-between">
                    <th class="text-left w-full">
                        Code</th>
                    <th class="text-left w-full">
                        Total</th>
                    <th class="text-center w-full">
                        Disposable</th>
                    <th class="text-left w-full">
                        Created at</th>
                    <th class="text-left w-1/3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($coupons as $coupon)
                    <tr
                        class="flex justify-between py-3 border-t @if ($loop->last) border-b @endif border-gray-200 py-3 px-6">
                        <td class="flex w-full text-left">{{ $coupon->code }}</td>
                        <td class="flex w-full text-left">
                            @if ($coupon->data['type'] === 'amount')
                                ${{ $coupon->data['value'] }}
                            @else
                                {{ $coupon->data['value'] }}%
                            @endif
                        </td>
                        <td class="flex w-full text-left justify-center">
                            <input type="checkbox" @if ($coupon->is_disposable) checked @endif disabled />
                        </td>
                        <td class="flex w-full text-left">
                            {{ $coupon->updated_at->isoFormat('L') }}</td>
                        <td class="flex w-1/3 text-left space-x-5" x-data="{ trash: true, deleteConfirmation: false }" x-cloak>
                            <button @click="trash = false, deleteConfirmation = true" x-show="trash">
                                <i class="fas fa-trash text-gray-600"></i></button>
                            <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST"
                                x-show="deleteConfirmation" @click.outside="deleteConfirmation=false, trash = true">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-check m-1 text-red-500"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="flex justify-between py-12 border-t border-gray-200 px-6">
                        <td class="font-bold w-full text-center text-gray-600">
                            <i class="fas fa-ticket-alt text-9xl text-gray-300"></i>
                            <p class="text-2xl text-gray-400">There are no coupons</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table> --}}

        {{-- <div class="px-4 py-8">
            {{ $coupons->links('vendor.pagination.berrydashboard') }}
        </div> --}}
    </div>
</x-app-layout>
