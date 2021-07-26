const selection = new SelectionArea({

    // All elements in this container can be selected
    selectables: ['td[name="scheduleBlock"]'],

    // The container is also the boundary in this case
    boundaries: ['#scheduleTable']
}).on('start', ({store, event}) => {

    // Remove class if the user isn't pressing the control key or ⌘ key
    if (!event.ctrlKey && !event.metaKey) {

        // Unselect all elements
        for (const el of store.stored) {
            el.classList.remove('selected');
        }

        // Clear previous selection
        selection.clearSelection();
    }

}).on('move', ({store: {changed: {added, removed}}}) => {

    // Add a custom class to the elements that where selected.
    for (const el of added) {
        el.classList.add('selected');
    }

    // Remove the class from elements that where removed
    // since the last selection
    for (const el of removed) {
        el.classList.remove('selected');
    }

}).on('stop', () => {
    selection.keepSelection();
});

selection
    .on('beforestart', () => document.body.style.userSelect = 'none')
    .on('stop', () => document.body.style.userSelect = 'unset');

function selectedLog(){

    var cells = $(".selected");

    for (var i=0; i<cells.length; i++){

        cells[i] = cells[i].id.split("-");
        console.log(cells[i]);

        // switch (cells[i][1]){
            
        //     case "1": cells[i][1] = "Sunday";
        //     break;
            
        //     case "2": cells[i][1] = "Monday";
        //     break;

        //     case "3": cells[i][1] = "Tuesday";
        //     break;
            
        //     case "4": cells[i][1] = "Wednesday";
        //     break;
            
        //     case "5": cells[i][1] = "Thursday";
        //     break;

        //     case "6": cells[i][1] = "Friday";
        //     break;
            
        //     case "7": cells[i][1] = "Saturday";
        //     break;
        // }
    }

    var data = [];

    for (let i=0; i<cells.length; i++){
        data[i] = cells[i];
    }

    console.log(cells);
    console.log(data);

    post('schedule', {
        data: data,
        "_token": $("meta[name='csrf-token']").attr("content")
    });

}

/**
 * sends a request to the specified url from a form. this will change the window location.
 * @param {string} path the path to send the post request to
 * @param {object} params the parameters to add to the url
 * @param {string} [method=post] the method to use on the form
*/

function post(path, params, method='post') {

    // The rest of this code assumes you are not using a library.
    // It can be made less verbose if you use one.
    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = key;
        hiddenField.value = params[key];

        form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}