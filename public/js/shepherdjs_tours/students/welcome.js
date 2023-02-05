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
        text: "Congratulations!🎉 You're now a part of this wonderful community! 🤗 Let me show you around your dashboard and see what's new. 💡 <br><br>This is where you'll keep track of your progress, receive updates and connect with others.",
        // attachTo: {
        //     element: '.no-classes-div',
        //     on: 'top'
        // },
        // classes: 'example-step-extra-class',
        buttons: [
            {
                text: "Let's dive in! 🚀",
                action: tour.next
            }
        ]
    },
    {
        id: 'dasboard-buttons-tour',
        text: 'On your dashboard, you have two buttons: <br><br> "Classroom" - takes you straight to your virtual classroom with your teacher on the designated day.<br><br>"Classes" - lets you view and interact with each of your classes individually. 💡',
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
        text: '📈 Additionally, you\'ll find a progress bar on your dashboard to track your course progress. 🚀 <br><br>Keep an eye on it to see how far you\'ve come and where you\'re headed! 💡',
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
        text: '📣 Attention! A new section has been added: "GATHER." 🎉<br><br>This is a special space for real-time group meetings with your teachers and fellow students.<br><br>When you\'re ready, go ahead and explore! 💬',
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