const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: { behavior: 'smooth', block: 'center' },
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 20,
        canClickTarget: false,
    }
});

tour.addSteps([
    {
        id: 'cart-general',
        text: 'This is your shopping cart.',
        attachTo: {
            element: '.cart-general',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'cart-info-buy',
        text: 'Here you can see the information about your selected products and courses.',
        attachTo: {
            element: '.cart-info-buy',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ],
    },
    {
        id: 'cart-coupon',
        text: 'If you have a special coupon, feel free to redeem it in this section.',
        attachTo: {
            element: '.cart-coupon',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next',
                action(){
                    // console.log("una prueba SIUUUU")
                    // $('#2-2').toggleClass('border-block-tour');
                    return this.next()
                }
            }
        ]
    },
    {
        id: 'cart-payment',
        text: 'Finally, use your preferred payment method.',
        attachTo: {
            element: '.cart-payment',
            on: 'top'
        },
        buttons: [
            {
                text: 'Great!',
                action(){
                    console.log("una prueba SIUUUU")
                    return this.complete()
                }
            }
        ]
    },
]);

tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'guests/cart_view',
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            // console.log(data["responseText"]);
        }
    });

});