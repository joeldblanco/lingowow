const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'shadow-md bg-red-900',
        scrollTo: true
    }
});

tour.addSteps([
    {
        id: 'show-earnings',
        text: 'Here you can see the total earings of the company',
        attachTo: {
            element: '.earnings-div',
            on: 'right'
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
        id: 'show-invoices',
        text: 'Here you can see the total number of invoices generated',
        attachTo: {
            element: '.invoices-div',
            on: 'right'
        },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    }
]);

tour.start();