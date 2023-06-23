<x-app-layout>

    <script type="text/javascript" src="https://static-content.vnforapps.com/v2/js/checkout.js"></script>

    @php
        $sessionToken = json_decode($sessionToken);
        $sessionKey = $sessionToken->sessionKey;
    @endphp

    <script type="text/javascript">
        action_url = @json(route('payments.checkout', ['purchaseNumber' => $purchaseNumber, '_token' => Session::token()]));

        function openForm() {
            VisanetCheckout.configure({
                sessiontoken: @json($sessionKey),
                channel: 'web',
                merchantid: @json(env('NIUBIZ_MERCHANT_ID')),
                purchasenumber: @json($purchaseNumber),
                amount: @json($ammount),
                expirationminutes: 20,
                // expirationminutes: {{ $expirationTimeInMinutes }},
                timeouturl: 'about:blank',
                merchantlogo: '{{ asset('storage/images/logo_lw_for_niubiz.png') }}',
                formbuttoncolor: '#3246BA',
                action: action_url,
                complete: function(params) {
                    // Livewire.emit('paypalCheckout');
                }
            });
            VisanetCheckout.open();
        }
        openForm();
    </script>

    <div class="w-full flex h-96 justify-center items-center">
        <button onclick="openForm();" class="bg-lw-blue text-white px-4 py-2 rounded-md text-3xl hover:bg-blue-800">Pay
            here</button>
    </div>

</x-app-layout>
