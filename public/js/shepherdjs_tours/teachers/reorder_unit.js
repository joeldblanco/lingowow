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
        id: 'Options-details',
        text: 'For each unit there are options such as: Edit, Delete, Reorder, among others.',
        attachTo: {
            element: '.options-details',
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
        id: 'reorder-unit',
        text: 'To reorder the units, hold down this button and drag it up or down.',
        attachTo: {
            element: '.reorder-unit',
            on: 'bottom'
        },
        buttons: [
            {
                text: 'Next!',
                action: tour.next
            }
        ]
    },
    {
        id: 'reorder-unit-save',
        text: 'Finally click on the Save button to save the changes made.',
        attachTo: {
            element: '.reorder-unit-save',
            on: 'bottom'
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
            tourName: 'teachers/reorder_unit',
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