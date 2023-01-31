<x-app-layout>

    {{-- MENSAJE --}}



    {{-- FIN MENSAJE --}}

    <div class="bg-white font-sans">

        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            @if (!empty($response['code']))
                <div x-show="open" x-transition.duration.200ms x-data="open" x-init="setTimeout(() => open = false, 3000)"
                    class="py-4 px-4 text-white font-semibold rounded-lg text-center @if ($response['code'] == 'success')
bg-green-500
@else
bg-red-500
@endif">
                    <span class="font-bold">{{ $response['message'] }}</span>
                </div>
            @endif
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-20">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <livewire:courses-carousel />

            </div>

            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <livewire:pricing-table-component />

            </div>
        </div>
        @role('guest')
            <x-shepherd-tour tourName="guests/courses-carousel" role="guest" />
        @endrole
    </div>

    {{-- <a href="{{ route('cart') }}"
        class="bg-green-500 rounded-full w-20 h-20 flex justify-center items-center fixed bottom-5 right-5 z-10">
        @if (Cart::count() > 0)
            <div
                class="absolute top-0 right-0 rounded-full bg-red-600 w-7 h-7 text-white font-bold flex justify-center">
                {{ Cart::count() }}
            </div>
        @endif
        <div class="text-white text-2xl">
            <i class="fas fa-shopping-cart"></i>
        </div>
    </a> --}}

</x-app-layout>
