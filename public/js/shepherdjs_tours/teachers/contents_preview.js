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
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'activities-div',
        text: 'Here you can click to see the available activities for the unit and assign them to your students.',
        attachTo: {
            element: '.first-unit',
            on: 'top'
        },
        buttons: [
            {
                text: 'Thanks!',
                action: tour.complete
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