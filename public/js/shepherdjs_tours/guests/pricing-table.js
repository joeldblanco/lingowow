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
        id: 'pricing-table',
        text: 'Here you will see the plans and prices for the courses you select. If the course you selected is an asynchronous course or a test, you will only see one card with the price.',
        attachTo: {
            element: '.pricing-table',
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
        id: 'select-button',
        text: 'To select a plan, click on the "Select" button below.',
        attachTo: {
            element: '.select-button',
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
        text: 'Once you click the select button on the plan you prefer you will be able to select the teacher and schedule for your classes.',
        // attachTo: {
        //     element: '.courses-link',
        //     on: 'bottom'
        // },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ],
        canClickTarget: false
    }
]);

tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'guests/pricing-table',
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