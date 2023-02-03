const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: true,
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 20,
        canClickTarget: false,
    }
});

tour.addSteps([
    {
        id: 'no-classes-div',
        text: "Welcome!🎉 We're thrilled to have you here!",
        // attachTo: {
        //     element: '.no-classes-div',
        //     on: 'top'
        // },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: 'Let\'s do it!',
                action: tour.next
            }
        ]
    },
    {
        id: 'shop-button',
        text: "Want to take a sneak peek at all we have to offer?👀 Click the button below to preview our amazing programs.💡",
        attachTo: {
            element: '.preview-courses-button',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it! 😎',
                action: tour.complete
            }
        ],
    },
    // {
    //     id: 'courses-link',
    //     text: 'If you wish to preview our programs you can click on the "Courses" link in the navigation bar.',
    //     attachTo: {
    //         element: '.courses-link',
    //         on: 'bottom'
    //     },
    //     buttons: [
    //         {
    //             text: 'Got it!',
    //             action: tour.complete
    //         }
    //     ],
    // }
]);

tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'guests/welcome',
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (data) {
            // console.log(data);
        },
        error: function (data) {
            // console.log(data["responseText"]);
        }
    });

});