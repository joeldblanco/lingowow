const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: true,
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 10,
        canClickTarget: false,
    }
});

tour.addSteps([
    {
        id: 'form_tour',
        text: "This is your rescheduling form.",
        attachTo: {
            element: '.form-tour',
            // on: 'top'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ],
    },
    {
        id: 'dateReason_tour',
        text: "First, you will have the date of your current class to reschedule.<br>And a space for you to write the reason why you want to reschedule that class.",
        attachTo: {
            element: '.dateReason-tour',
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
        id: 'schedule_tour',
        text: 'This schedule has the particularity that you can navigate between the weeks of the month of the period using the <b>"Previous"</b> and <b>"Next"</b> buttons, so that you can select the exact day of your available rescheduling.',
        attachTo: {
            element: '.schedule-tour',
            // on: 'bottom'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ],
    },
    {
        id: 'terms-tour',
        text: 'Finally, you must accept the terms and conditions for class recovery.',
        attachTo: {
            element: '.terms-tour',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ],
    }
]);

function start() {
    tour.start()
    clearTimeout(timerId)
}

let timerId = setTimeout(start, 1500);


tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'students/rescheduling',
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