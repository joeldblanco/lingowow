const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        // scrollTo: true
    }
});

tour.addSteps([
    {
        id: 'units-list',
        text: 'Here you can see all the content of the unit.',
        // attachTo: {
        //     element: '.units-list',
        //     on: 'top'
        // },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ]
    },
    // {
    //     id: 'first-unit',
    //     text: 'Click on the name of free unit to preview it.',
    //     attachTo: {
    //         element: '.first-unit',
    //         on: 'top'
    //     },
    //     buttons: [
    //         {
    //             text: 'Thanks!',
    //             action: tour.complete
    //         }
    //     ]
    // },
]);

tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'guests/contents_preview',
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