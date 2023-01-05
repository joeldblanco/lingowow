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
        text: 'Here you can see the courses you are enrolled in as a teacher.',
        attachTo: {
            element: '.courses-list',
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
        id: 'first-course',
        text: 'Click on the name of the course you wish to access it.',
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

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'teachers/courses_preview',
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