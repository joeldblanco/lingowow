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
        id: 'teachers-carousel',
        text: 'Here\'s a carousel showcasing our talented teachers! 🧑‍🏫 You can swipe right or left to see more of them. 💡 Let\'s find the perfect match for your learning needs! 🔍',
        attachTo: {
            element: '.teachers-carousel',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ]
    },
    {
        id: 'teacher-save',
        text: 'Great news! Once you\'ve found a teacher that you connect with, simply select them to proceed with choosing your schedule. 🗓️ Let\'s make sure we find a time that works for you! ✨',
        attachTo: {
            element: '.teacher-save',
            on: 'top'
        },
        buttons: [
            {
                text: 'Great!',
                action: tour.next
            }
        ],
    },
    {
        id: 'table-schedule-seccion',
        text: '🗓️ Welcome to the scheduling section! Here, you can choose the perfect class schedule that fits your selected plan. 💻 Let\'s make sure your learning journey is as convenient as possible! 💡',
        attachTo: {
            element: '.table-tour-seccion',
            // on: 'right'
        },
        buttons: [
            {
                text: 'Next',
                action() {
                    // console.log("una prueba SIUUUU")
                    // $('#2-2').toggleClass('border-block-tour');
                    return this.next()
                }
            }
        ]
    },
    {
        id: 'table-schedule',
        text: 'In this section, class schedules are represented by blocks, with each block representing one class. 🕰️',
        attachTo: {
            element: '.table-tour',
            on: 'top'
        },
        buttons: [
            {
                text: 'Okay!',
                action() {
                    // console.log("una prueba SIUUUU")
                    return this.next()
                }
            }
        ]
    },
    {
        id: 'utc-local',
        text: '👈 On the left side, you\'ll see both UTC time and your local time, so you can make sure you\'re selecting the right schedule for you. 🗓️ Keep that in mind while making your selection! 💡',
        // attachTo: {
        //     elements: '.utc-local',
        //     on: 'top'
        // },
        buttons: [
            {
                text: 'Got it!',
                action() {
                    return this.complete()
                }
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
            tourName: 'guests/teachers-carousel',
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