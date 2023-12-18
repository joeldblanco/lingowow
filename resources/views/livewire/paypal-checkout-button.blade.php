<div>
    <!-- PAYPAL CHECKOUT BUTTON COMPONENT -->
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" class="mt-3"></div>

    <!-- Include the PayPal JavaScript SDK -->
    @if (auth()->id() == 5)
        <script
            src="https://www.paypal.com/sdk/js?client-id=AUa2ToyOsBrbfUh0FwDR4wg8A2A7bvgVFaW3XuAN4-zttVI-XImVMP6Bllg-_UziMRfP5wOSrZqPNAMD&currency=USD"
            defer></script>
    @else
        <script
            src="https://www.paypal.com/sdk/js?client-id=Aau1Mwj0MPuEe3SsdsAsVZ0DvSSt8yrvLCqA-cT72bu6wbKXLHAXK_d9p4RuNRQpxk7nYpLl13GB69qX&currency=USD"
            defer></script>
    @endif

    <script defer>
        function inicializarBotonPayPal(amount) {
            function runPaypalButtonFunction() {
                return new Promise(resolve => {
                    var intervalId = setInterval(() => {
                        if (typeof paypal !== 'undefined') {
                            clearInterval(intervalId);
                            resolve();
                        }
                    }, 100);
                });
            }

            runPaypalButtonFunction(amount).then(() => {
                // Render the PayPal button into #paypal-button-container
                paypal.Buttons({

                        style: {
                            layout: 'horizontal',
                            tagline: false,
                            shape: 'pill',
                        },

                        // Set up the transaction
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: amount
                                    }
                                }]
                            });
                        },

                        // Finalize the transaction
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(orderData) {
                                $('#loading_state').removeClass('hidden');
                                Livewire.emit('paypalCheckout');
                            });
                        }


                    }).render('#paypal-button-container')
                    .then(() => {
                        Livewire.emit('paypalButtonRendered');
                    });
            });
        };

        window.addEventListener('load-payment-buttons', event => {
            inicializarBotonPayPal(event.detail.amount);
        });
    </script>
</div>
