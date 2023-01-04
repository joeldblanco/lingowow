const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        // scrollTo: true
    }
});

tour.addSteps([
    {
        id: 'courses-list',
        text: 'Here you can preview our courses. The available courses will be listed here.',
        attachTo: {
            element: '.courses-list',
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
        id: 'first-course',
        text: 'Click on the name of the course you wish to preview it.',
        attachTo: {
            element: '.course-div',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ]
    },
]);

tour.start();