function selectedLog(plan){
    
    var cells = $(".selected");

    if(cells.length == plan){
        for (var i=0; i<cells.length; i++){
            cells[i] = cells[i].id.split("-");
        }
    
        var data = [];
    
        for (let i=0; i<cells.length; i++){
            data[i] = cells[i];
        }

        console.log(data);

        post('schedule', {
            data: data,
            "_token": $("meta[name='csrf-token']").attr("content")
        });

    }else{
        console.log("Necesita seleccionar " + plan + " bloques en total. Solo " + cells.length + " han sido seleccionados.")
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