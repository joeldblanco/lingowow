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
        id: 'no-classes-div',
        text: "Congratulations! You are now part of this great family!<br><br>This is your dashboard, join me to see what's new in it.",
        // attachTo: {
        //     element: '.no-classes-div',
        //     on: 'top'
        // },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'dasboard-buttons-tour',
        text: 'In the first instance, you have a "<b>Classroom</b>" button that will take you directly to your virtual classroom with your teacher on the corresponding day.<br><br>And a "<b>Classes</b>" button where you can view and interact with your classes individually.',
        attachTo: {
            element: '.buttons-dashboard-tour',
            on: 'right'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ],
    },
    {
        id: 'barprogres-your',
        text: 'You will also see a progress bar, in which you will be able to see the progress of your course.',
        attachTo: {
            element: '.barprogress-tour',
            on: 'bottom'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ],
    },
    {
        id: 'gather-link',
        text: '<b>¡Important!</b> a new section has been added! "GATHER", this section is special for you, it is a real time group meeting place for teachers and students!<br><br>When you feel ready, feel free to check it out.',
        attachTo: {
            element: '.gather-link',
            on: 'bottom'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ],
    }
]);
console.log("welcome")
tour.start();

tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'students/welcome',
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