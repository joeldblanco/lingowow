<x-app-layout>

    <script type="text/javascript" src="https://static-content.vnforapps.com/v2/js/checkout.js"></script>

    @php
        $sessionToken = json_decode($sessionToken);
        $sessionKey = $sessionToken->sessionKey;
    @endphp

    <script type="text/javascript">
        function openForm() {
            VisanetCheckout.configure({
                sessiontoken: '{{ $sessionKey }}',
                channel: 'web',
                merchantid: '{{ env('NIUBIZ_MERCHANT_ID') }}',
                purchasenumber: '{{ $purchaseNumber }}',
                amount: {{ $ammount }},
                expirationminutes: 20,
                // expirationminutes: {{ $expirationTimeInMinutes }},
                timeouturl: 'about:blank',
                merchantlogo: '{{ asset("storage/images/logo_lw_for_niubiz.png") }}',
                formbuttoncolor: '#3246BA',
                action: '{{ route('payments.checkout', ['purchaseNumber' => $purchaseNumber]) }}',
                complete: function(params) {
                    alert(JSON.stringify(params));
                }
            });
            VisanetCheckout.open();
        }
        openForm();
    </script>

    <div class="w-full flex h-96 justify-center items-center">
        <button onclick="openForm();" class="bg-lw-blue text-white px-4 py-2 rounded-md text-3xl hover:bg-blue-800">Pay here</button>
    </div>

    {{-- <form action="{{ route('payments.checkout', ['purchaseNumber' => $purchaseNumber]) }}" method="post">

        <script type="text/javascript" src="https://static-content.vnforapps.com/v2/js/checkout.js"
            data-sessiontoken={{ $sessionKey }} data-channel="web" data-merchantid="{{ env('NIUBIZ_MERCHANT_ID') }}"
            data-purchasenumber="{{ $purchaseNumber }}" data-amount={{ $ammount }}
            data-expirationminutes=20 data-timeouturl="about:blank"
            data-merchantlogo="{{ Storage::url('images/logo_lw_for_niubiz.png') }}" data-formbuttoncolor="#3246BA" />
    </form> --}}

</x-app-layout>
