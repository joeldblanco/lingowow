function saveSchedulee(plan, routeTo, role = 2){ // AQUI TENGO QUE ELIMINAR LA ULTIMA E EN EL NOMBRE DE LA FUNCION POR SI SE ME OLVIDA.
    
    var cells = $(".selected, .selectable .ui-selected");
    var error = false;

    if(role == 2){
        for (var i=0; i<cells.length; i++){
            cells[i] = cells[i].id.split("-");
        }
    
        var data = [];
    
        for (let i=0; i<cells.length; i++){
            if(cells[i] != ""){
                data[i] = cells[i];
            }
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

        data = JSON.stringify(data);

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
            if(cells[i] != ""){
                data[i] = cells[i];
            }
        }

        data = JSON.stringify(data);

        // console.log();

        post(route(routeTo), {
            data: data,
            error: error,
            "_token": $("meta[name='csrf-token']").attr("content")
        });

        // console.log(data, cells);

    }

}

function saveSchedule(plan, routeTo, role = 2){
    //console.log("Hola");
    var cells = $(".selected");
    error = false;

    if(role == 2){
      for (var i=0; i<cells.length; i++){
        cells[i] = cells[i].id.split("-");
    }

    var data = [];

    for (let i=0; i<cells.length; i++){
        if(cells[i] != ""){
            data[i] = cells[i];
        }
    }

    //console.log(data,cells);
    
    let count = 1;
    loop1:
    for (let i = 0; i < (data.length-1); i++) {
        for (let e = i+1; e < data.length; e++) {
            // if(data[i][1] == data[e][1]){
            //     error = "same_day";
            //     console.log('same_day');
            //     break loop1;
            // }
        }
        count++;
    }

    if(data.length < plan){
        error = "not_enough_days";
    }

    if(data.length > plan){
        error = "too_much_days";
    }

    data = JSON.stringify(data);

    // console.log(plan);

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
        if(cells[i] != ""){
            data[i] = cells[i];
        }
    }

    data = JSON.stringify(data);

    // console.log();

    post(route(routeTo), {
        data: data,
        error: error,
        "_token": $("meta[name='csrf-token']").attr("content")
    });

    // console.log(data, cells);

}

}

function saveAbsence(id, routeTo, role = 2){
    var cells = $(".selected");
    var message = document.getElementById("absence_reason").value;
    var check = document.getElementById("consent_checkbox").checked;
    console.log(message);
    error = false;
    console.log(id+" "+routeTo)
    //console.log($('.selectable'))
    for (var i=0; i<cells.length; i++){
        cells[i] = cells[i].id.split("-");
    }

    var data = [];

    for (let i=0; i<cells.length; i++){
        if(cells[i] != ""){
            data[i] = cells[i];
        }
    }


    if(data.length < 1){
        error = "not_enough_days";
    }
    if(data.length > 1){
        error = "too_much_days";
    }
    if(check == false){
        error = "not_check";
    }
    if(message == ""){
        error = "null";
    }

    console.log(data);

    data = JSON.stringify(data);

    console.log(data);


    post(route(routeTo), {
        data: data,
        error: error,
        id:id,
        message: message,
        check: check,
        "_token": $("meta[name='csrf-token']").attr("content")
    });


}

function checkClass(plan, role = 2){
    
    var cells = $(".selected");
    error = false;
    //console.log($('.selectable'))
    for (var i=0; i<cells.length; i++){
        cells[i] = cells[i].id.split("-");
    }

    var data = [];

    for (let i=0; i<cells.length; i++){
        if(cells[i] != ""){
            data[i] = cells[i];
        }
    }


    if(data.length < 1){
        error = "not_enough_days";
    }
    if(data.length > 1){
        error = "too_much_days";
    }

    console.log(data);

    data = JSON.stringify(data);

    console.log(data);

    Livewire.emit("checkForClass",data,plan,error);
    
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
        hiddenField.setAttribute('required', '');

        form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

// Funcion de seleccion en el horario

/* let numClass = 0;
let classSelected = [];
let preClass = ["1-6", "2-6", "3-6", "4-6", "5-6", "6-6"];
classSelected = preClass;
let preClassTd = [];
preClass.forEach(element =>{
  preClassTd.push(document.getElementById(element));
});
let init = true;

const selection = new SelectionArea({
    selectables: ["td.selectable"],
    boundaries: [".container"],
  })
    .on("start", ({ store, event }) => {
      if(!init){
        store.stored = preClassTd;
        init = true;
      }
      
      if (!event.ctrlKey && !event.metaKey) {
        //console.log(store)
        for (const el of store.stored) {
          if(el.classList.contains("selected")){
              el.classList.remove("selected");
              classSelected = classSelected.filter(function(cf){
                return cf !== el.id;
              });
              if(numClass > 0)
                  numClass--;
              //console.log("uno"+numClass);
          }
        }
  
        selection.clearSelection();
      }
      //console.log(store.stored)
    })
    .on(
      "move",
      ({
        store: {
          changed: { added, removed }
        }
      }) => {
        //console.log(added)
        for (const el of added) {
          if(!(el.classList.contains("selected"))){
              if(numClass < qtyClass){
                  el.classList.add("selected");
                  classSelected.push(el.id);
                  numClass++;
                  //console.log("dos"+numClass);
              }
          }
        }
  
        for (const el of removed) {
              if(el.classList.contains("selected")){       
                  el.classList.remove("selected");
                  classSelected = classSelected.filter(function(cf){
                    return cf !== el.id;
                  });
                  numClass--;
              }
              //console.log("tres"+numClass);
          
        }
        
      }
      
    );*/