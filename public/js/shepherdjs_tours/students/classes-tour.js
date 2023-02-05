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
        id: 'classes_welcome',
        text: "Welcome to your classes page! 🎉 This is where you'll find all the information related to your classes in one place. From class dates to class recordings, it's all here. Let's take a look! 🔍",
        attachTo: {
            element: '.teacher-tour',
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
        id: 'teacher_tour',
        text: "📝 On the left side, you'll see the teacher's name and a link to their profile. On the right side, you'll find the class date and time. 🕰️ This way, you'll have all the important details at a quick glance. 🔍",
        // attachTo: {
        //     element: '.teacher-tour',
        //     on: 'top'
        // },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ],
    },
    {
        id: 'Class_tour',
        text: "👀 To view the details of a class, simply click on the class date. 💡 That's all it takes to access important information about your class. 🔍",
        attachTo: {
            element: '.class-tour',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ],
    },
    {
        id: 'class_recordings',
        text: "👀 To view the details of a class, simply click on the class date. 💡 That's all it takes to access important information about your class. 🔍",
        attachTo: {
            element: '.class-tour',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour.complete
            }
        ],
    },
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
            tourName: 'students/classes-tour',
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