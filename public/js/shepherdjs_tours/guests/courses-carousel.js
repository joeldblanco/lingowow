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
        text: 'Welcome to our shop!🛍️ We have a variety of courses available for you to choose from 💻📖. Take a look and find the perfect one for you! ✨',
        attachTo: {
            element: '.courses-carousel',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.next
            }
        ]
    },
    {
        id: 'course-card',
        text: 'Once you find a course that catches your interest, simply select it to view all the available plans and prices. 💰📊💳',
        attachTo: {
            element: '#course-card',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ],
    },
    {
        id: 'select-button',
        text: 'Click on the "Select" button to continue. Let\'s help you make an informed decision! 💡',
        attachTo: {
            element: '#select-button',
            on: 'top'
        },
        canClickTarget: true,
        advanceOn: {
            selector: '#select-button',
            event: 'click'
        },
    },
    // {
    //     id: 'pricing-table',
    //     text: 'Here you will see the plans and prices for the courses you select. If the course you selected is an asynchronous course or a test, you will only see one card with the price.',
    //     attachTo: {
    //         element: '.pricing-table',
    //         on: 'top'
    //     },
    //     canClickTarget: false,
    //     buttons: [
    //         {
    //             text: 'Next',
    //             action: tour.next
    //         }
    //     ]
    // },
    // {
    //     id: 'select-button',
    //     text: 'To select a plan, click on the "Select" button below.',
    //     attachTo: {
    //         element: '.select-button',
    //         on: 'top'
    //     },
    //     buttons: [
    //         {
    //             text: 'Next',
    //             action: tour.next
    //         }
    //     ],
    // },
    // {
    //     id: 'courses-link',
    //     text: 'Once you click the select button on the plan you prefer you will be able to select the teacher and schedule for your classes.',
    //     // attachTo: {
    //     //     element: '.courses-link',
    //     //     on: 'bottom'
    //     // },
    //     buttons: [
    //         {
    //             text: 'Got it!',
    //             action: tour.complete
    //         }
    //     ],
    //     canClickTarget: false
    // }
]);

function start() {
    tour.start()
    clearTimeout(timerId)
}

let timerId = setTimeout(start, 1000);

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