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
    // {
    //     id: 'form_tour',
    //     text: "This is your rescheduling form.",
    //     attachTo: {
    //         element: '.form-tour',
    //         // on: 'top'
    //     },
    //     buttons: [
    //         {
    //             text: 'Next!',
    //             action: tour.next
    //         }
    //     ],
    // },
    {
        id: 'dateReason_tour',
        text: "Welcome to the rescheduling section! 💡 On this page, you'll see the date of your current class that you'd like to reschedule. 📅 <br><br>And there's also a space for you to write the reason for rescheduling.",
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
        text: "This schedule has a handy feature! You can navigate between the weeks of the month using the 'Previous' and 'Next' buttons. 🔜 <br><br>This way, you can find the exact day that works best for your rescheduling. 🗓️ Easy peasy!",
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
        text: "✅ Finally, don't forget to accept the terms and conditions for class recovery. 💡 It's a simple step to make sure everything is good to go! 🤝",
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