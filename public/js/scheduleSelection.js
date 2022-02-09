function saveSchedule(plan,routeTo,role = 2){
    
    var cells = $(".selected, .selectable .ui-selected");
    var error = false;

    if(role == 2){
        for (var i=0; i<cells.length; i++){
            cells[i] = cells[i].id.split("-");
        }
    
        var data = [];
    
        for (let i=0; i<cells.length; i++){
            data[i] = cells[i];
        }

        
        let count = 1;
        loop1:
        for (let i = 0; i < (data.length-1); i++) {
            for (let e = i+1; e < data.length; e++) {
                if(data[i][1] == data[e][1]){
                    error = "same_day";
                    console.log('same_day');
                    break loop1;
                }
            }
            count++;
        }

        if(data.length < plan){
            error = "not_enough_days";
        }

        if(data.length > plan){
            error = "too_much_days";
        }

        post(route(routeTo), {
            data: data,
            error: error,
            "_token": $("meta[name='csrf-token']").attr("content")
        });
        

    }else{

        for (var i=0; i<cells.length; i++){
            cells[i] = cells[i].id.split("-");
        }
    
        var data = [];
    
        for (let i=0; i<cells.length; i++){
            data[i] = cells[i];
        }

        post(route(routeTo), {
            data: data,
            error: error,
            "_token": $("meta[name='csrf-token']").attr("content")
        });

    }

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