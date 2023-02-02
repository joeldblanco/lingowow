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
        id: 'unit-created',
        text: 'Congratulations! You have created your first unit!<br><br>Click on it to add content.',
        attachTo: {
            element: '.first-unit',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour2.next
            }
        ],
    },
    {
        id: 'unit-created-edit',
        text: 'In this button you can directly edit the unit information.',
        attachTo: {
            element: '.first-unit-edit',
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
            let button = $('.first-unit');
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
            tourName: 'teachers/unit_created',
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