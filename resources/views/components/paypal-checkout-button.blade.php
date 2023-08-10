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

        runPaypalButtonFunction().then(() => {
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
                                value: @json(Cart::total())
                            }
                        }]
                    });
                },

                // Finalize the transaction
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        // Successful capture! For demo purposes:
                        // console.log('Capture result', orderData, JSON.stringify(orderData, null,
                        //     2));
                        // var transaction = orderData.purchase_units[0].payments.captures[0];
                        // alert('Transaction ' + transaction.status + ': ' + transaction.id +
                        //     '\n\nSee console for all available details');

                        // Replace the above to show a success message within this page, e.g.
                        // const element = document.getElementById('paypal-button-container');
                        // element.innerHTML = '';
                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                        // Or go to another URL:  actions.redirect('thank_you.html');
                        $('#loading_state').removeClass('hidden');
                        Livewire.emit('paypalCheckout');
                    });
                }


            }).render('#paypal-button-container');
        });
    </script>
</div>
