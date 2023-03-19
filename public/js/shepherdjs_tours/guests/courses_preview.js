const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        // scrollTo: true
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 20,
        canClickTarget: false,
    }
});

tour.addSteps([
    {
        id: 'courses-list',
        text: 'Here you can preview our available programs.📖 All of them will be listed here. ⬇️',
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
        text: 'Click on the name of the course you wish to preview it.👀',
        attachTo: {
            element: '.course-div',
            on: 'top'
        },
        buttons: [
            {
                text: 'Okay! 👍',
                action: tour.next
            }
        ]
    },
    {
        id: 'shop-link',
        text: 'Ready to start your journey with us?🚀 Click the <b>Shop</b> button anytime to see the amazing plans we have.',
        attachTo: {
            element: '.shop-link',
            on: 'top'
        },
        buttons: [
            {
                text: 'Finish! 🎉',
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
            tourName: 'guests/courses_preview',
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