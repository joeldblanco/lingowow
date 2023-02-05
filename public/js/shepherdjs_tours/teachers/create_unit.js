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
        id: 'form-create',
        text: 'This is the form to create the units.<br>To do this you must follow these simple steps:',
        attachTo: {
            element: '.form-create',
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
        id: 'unit-image',
        text: 'Select an image.',
        attachTo: {
            element: '.unit-image',
            on: 'right'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'unit-module',
        text: 'Select your assigned student.',
        attachTo: {
            element: '.unit-module',
            on: 'right'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'unit-name',
        text: 'Name the unit.',
        attachTo: {
            element: '.unit-name',
            on: 'right'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'unit-status',
        text: 'Keep this field <b>Active</b>.<br>Set <b>Inactive</b> if you do not want your student to view this unit.',
        attachTo: {
            element: '.unit-status',
            on: 'right'
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
            tourName: 'teachers/create_unit',
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