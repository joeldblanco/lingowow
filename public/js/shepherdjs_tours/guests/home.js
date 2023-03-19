const tour = new Shepherd.Tour({
    useModalOverlay: true,
    defaultStepOptions: {
        classes: 'border-2 border-blue-500',
        scrollTo: { behavior: 'smooth', block: 'center' },
        modalOverlayOpeningPadding: 10,
        modalOverlayOpeningRadius: 10,
        canClickTarget: false,
    }
});

tour.addSteps([
    {
        id: 'home_tour',
        text: "Welcome to the announcements section! Here, you can read posts from the institution, your teachers, and even your friends! 🤗 It's a great place to connect and engage with others through likes, comments, and more. 💬 <br><br>Just remember to be respectful and considerate in your interactions! 🤝",
        attachTo: {
            element: '.home-tour',
            // on: 'top'
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

let timerId = setTimeout(start, 1000);


tour.on('complete', () => {
    $.ajax({
        type: 'POST',
        url: route('complete-tour'),
        data: {
            tourName: 'students/home',
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