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
        text: 'Welcome to our campus. To enjoy our services, the first thing you must do is to purchase a lesson plan in one of our programs.',
        // attachTo: {
        //     element: '.no-classes-div',
        //     on: 'top'
        // },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'shop-button',
        text: 'To purchase a lesson plan, click on the "Shop" button below.',
        attachTo: {
            element: '.shop-button',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ],
    },
    {
        id: 'courses-link',
        text: 'If you wish to preview our programs you can click on the "Courses" link in the navigation bar.',
        attachTo: {
            element: '.courses-link',
            on: 'bottom'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ],
    }
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