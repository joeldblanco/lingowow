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
        text: 'The available units for this module will be listed here.',
        attachTo: {
            element: '.units-list',
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
        id: 'first-unit',
        text: 'Click on the name of free unit to preview it.',
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