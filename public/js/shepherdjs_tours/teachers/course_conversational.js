const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: true,
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 20,
        canClickTarget: false,
    }
});

tour.addSteps([
    {
        id: 'courses-link',
        text: 'In the conversational course units you will be allowed to upload customized content for each of your students.',
        attachTo: {
            // element: '.courses-link',
            // on: 'bottom'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'add-unit',
        text: 'In this button you can create units and add quizzes.',
        attachTo: {
            element: '.add-unit',
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
        id: 'orden-unit',
        text: 'And in this button you can sort them.',
        attachTo: {
            element: '.orden-unit',
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
            tourName: 'teachers/course_conversational',
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