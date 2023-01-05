const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        // scrollTo: true
    }
});

tour.addSteps([
    {
        id: 'modules-list',
        text: 'All our courses are divided into modules and each module has a number of units. The available modules will be listed here.',
        attachTo: {
            element: '.modules-list',
            on: 'top'
        },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'first-module',
        text: 'Click on the name of free module to preview it.',
        attachTo: {
            element: '.first-module',
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
            tourName: 'guests/modules_preview',
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