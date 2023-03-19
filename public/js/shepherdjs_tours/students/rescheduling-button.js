const tour2 = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: true,
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 10,
        canClickTarget: false,
    }
});

tour2.addSteps([
    {
        id: 'rescheduling-button',
        text: 'If you wish to reschedule a class, you can do it from this button.',
        attachTo: {
            element: '.rescheduling-button',
            on: 'top'
        },
        buttons: [
            {
                text: 'Got it!',
                action: tour2.complete
            }
        ],
    }
]);

function start() {
    tour2.start()
    clearTimeout(timerID2)
}

let timerID2;

function runReschedulingButtonFunction() {
    return new Promise(resolve => {
        var intervalId = setInterval(() => {
            let button = $('.rescheduling-button');
            // console.log(button.length)
            if (button.length > 0) {
                clearInterval(intervalId);
                resolve();
            }
        }, 100);
    });
}

runReschedulingButtonFunction().then(() => {
    // console.log("hola ya aparecio");
    timerID2 = setTimeout(start, 1000);
});


tour2.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'students/rescheduling-button',
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