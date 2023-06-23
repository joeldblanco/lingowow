<div>
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
        // openForm();
    </script>

    {{-- <div class="w-full flex h-96 justify-center items-center"> --}}
        <button onclick="openForm();"
            class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow items-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
            <i class="fas fa-credit-card h-full text-xl"></i>
            <span class="ml-2 mt-5px">Credit/Debit Card</span>
        </button>
    {{-- </div> --}}
</div>
