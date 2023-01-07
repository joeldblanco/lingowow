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
        id: 'courses-carousel',
        text: 'Here you will find a carousel with the courses we offer. You can drag right or left to see the other courses.',
        attachTo: {
            element: '.courses-carousel',
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
        id: 'course-card',
        text: 'Once you find a course you like, you can select it to see the avaliable plans and prices.',
        attachTo: {
            element: '#course-card',
            on: 'top'
        },
        buttons: [
            {
                text: 'Great!',
                action: tour.complete
            }
        ],
    },
]);

tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'guests/courses-carousel',
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