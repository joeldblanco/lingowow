const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: true
    }
});

tour.addSteps([
    {
        id: 'courses-link',
        text: 'Welcome to our campus. You can view the courses you are enrolled in as a teacher by clicking on the "Courses" button in the navigation bar.',
        attachTo: {
            element: '.courses-link',
            on: 'bottom'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'teachers-edit-schedule-button',
        text: 'You can update your schedule by clicking on the "Edit Schedule" button below.',
        attachTo: {
            element: '.teachers-edit-schedule-button',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ]
    }    
]);

tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'teachers/welcome',
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