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
    // {
    //     id: 'cart-general',
    //     text: 'This is your shopping cart.',
    //     attachTo: {
    //         element: '.cart-general',
    //         on: 'top'
    //     },
    //     buttons: [
    //         {
    //             text: 'Next',
    //             action: tour.next
    //         }
    //     ]
    // },
    {
        id: 'cart-info-buy',
        text: 'Hi there! Welcome to your shopping cart. 🛍️ Here, you can find all the details about the products and courses you\'ve selected. Let\'s make sure you have everything you need before checking out! 💳💡',
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
        text: 'Good news! If you have a special coupon, this is the place to redeem it. 🎉 Simply enter your code and enjoy the savings! 💳💰 Let\'s make the most of your shopping experience! 🛍️',
        attachTo: {
            element: '.cart-coupon',
            on: 'top'
        },
        buttons: [
            {
                text: 'Okay!',
                action(){
                    return this.next()
                }
            }
        ]
    },
    {
        id: 'cart-payment',
        text: '💳 Finally, you can use your preferred payment method to make the transaction. 💰 Whether it\'s a credit card or PayPal, we\'ve got you covered! 🛍️ Let\'s finish this up and get you on your way to your learning journey! 🚀',
        attachTo: {
            element: '.cart-payment',
            on: 'top'
        },
        buttons: [
            {
                text: 'Thanks!',
                action(){
                    // console.log("una prueba SIUUUU")
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