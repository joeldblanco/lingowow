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
        text: 'Here you will find a carousel with the teachers availables. You can drag right or left to see other teachers.',
        attachTo: {
            element: '.teachers-carousel',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next
            }
        ]
    },
    {
        id: 'teacher-save',
        text: 'Once you find a teacher you like, you can select it to proceed to choose your schedule.',
        attachTo: {
            element: '.teacher-save',
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
        id: 'table-schedule-seccion',
        text: 'In this section you will be able to choose your class schedule according to your selected plan.',
        attachTo: {
            element: '.table-tour-seccion',
            // on: 'right'
        },
        buttons: [
            {
                text: 'Next',
                action(){
                    // console.log("una prueba SIUUUU")
                    // $('#2-2').toggleClass('border-block-tour');
                    return this.next()
                }
            }
        ]
    },
    {
        id: 'table-schedule',
        text: 'It is represented by blocks, each block has a duration of one hour. <br>On the left side is shown the UTC time and your local time to which each block belongs.<br>Take this into account your local time when selecting your class schedule.',
        attachTo: {
            element: '.table-tour',
            on: 'top'
        },
        buttons: [
            {
                text: 'Next',
                action(){
                    console.log("una prueba SIUUUU")
                    return this.next()
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