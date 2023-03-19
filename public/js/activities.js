
let divData = document.getElementById("data_qty_content");
var qty_activities = 0;
console.log(divData)
if (divData){
    qty_activities = JSON.parse(document.getElementById("data_qty_content").dataset.user);
}


console.log("Funcionando Activities");

const word_drag = `

`;

////////////////////////////////////////////////////////////////////////////// FUNCTION SAVE ACTIVITIES

$("#btnSend").on("click", function (e) {
    e.preventDefault();

    forms = $(".activity-create-form");
    console.log(forms);

    var data = {};

    forms.each(function (index, element) {
        // console.log($(this).children('#type')[0].value)
        // console.log($(this).children('#mode')[0].value)
        if ($(this).children('#type')[0].value === "words") {

            const divForm = document.createElement("form");
            divForm.appendChild($(element).clone()[0]);
            // console.log(element.innerHTML);

            var formData = new FormData(divForm);
            var jsonData = {};
            for (var [k, v] of formData) {
                jsonData[k] = v;
            }
            // console.log(jsonData);
            data[index] = jsonData;

        }

        if ($(this).children('#type')[0].value === "cards") {

            // Livewire.emit('uploadImage')



            // uploadImages = $(this).children('#uploadImages');
            // formImage = $(uploadImages)[0].children[0];
            imagesFile = $('.imageFile-' + element.id);
            console.log(imagesFile);

            inputFiles = $('.inputImage-1' + element.id);
            console.log(inputFiles);

            inputImage = $(this).children('#cards-images')[0];
            cadena = "";
            imagesFile.each(function (index, elementImage) {
                console.log(element);
                cadena += element.id + "-" + index + "-" + $(elementImage)[0].firstElementChild.id + "/" + $(elementImage)[0].lastElementChild.value;
                if (index < imagesFile.length - 1) {
                    cadena += ',';
                }
                // console.log($(element)[0].lastElementChild.value)
            })
            console.log(cadena);

            inputImage.value = cadena;


            const divForm = document.createElement("form");
            divForm.appendChild($(element).clone()[0]);


            var formData = new FormData(divForm);
            var jsonData = {};
            for (var [k, v] of formData) {
                jsonData[k] = v;
            }
            // console.log(jsonData);
            // var count = Object.keys(jsonData).length;
            // console.log(count);

            // var images = $("#images")[0].files;
            // var imgObject = {
            //     img: images
            // }
            // console.log(images);
            // jsonData[count + 1] = imgObject;
            // console.log(jsonData);
            data[index] = jsonData;



        }

        if ($(this).children('#type')[0].value === "dictation") {

            // Livewire.emit('uploadAudioDictation') //No olvidar quitar el comentario



            // uploadAudio = $(this).children('#uploadAudio');
            // formAudio = $(uploadAudio)[0].children[0];
            // console.log($(uploadAudio).children('.audioFile'));
            audiosFile = $('.audioFile-'+element.id);
            inputAudio = $(this).children('#audios-dictation')[0];
            
            console.log(audiosFile, inputAudio);
            cadena = "";

            audiosFile.each(function (index, elementAudio) {
                cadena += element.id + "-" + index + "-" + $(elementAudio)[0].firstElementChild.id + "/" + $(elementAudio)[0].lastElementChild.value;
                if (index < audiosFile.length - 1) {
                    cadena += ',';
                }

            })
            console.log(cadena);

            inputAudio.value = cadena;

            const divForm = document.createElement("form");
            divForm.appendChild($(element).clone()[0]);

            var formData = new FormData(divForm);
            var jsonData = {};
            for (var [k, v] of formData) {
                jsonData[k] = v;
            }

            data[index] = jsonData;



        }


    });

    

    console.log(data);

    activity_name = $('#activity-name')[0].value
    // console.log(activity_name)

    // input = $('.inputImage');
    // console.log(input[0].files)
    // console.log(input[0].files[0].name)
    // input[0].files[0].name = "HOla.jpg";
    // console.log(input[0].files)
    // var formData = new FormData($("#miForm")[0]);
    // console.log(this);

    // var jsonData = {};
    // for (var [k, v] of formData) {
    //   jsonData[k] = v;
    // }

    // json2 = {};
    // json2[0] = jsonData;
    // json2[1] = jsonData;

    // console.log(json2);

    // json2=JSON.stringify(json2);
    data_aux = data;
    data = JSON.stringify(data);

    // word_drag_f();


    post(route("admin.activities.storeFiles"), {
        data: data,
        activity: activity_name,
        "_token": $("meta[name='csrf-token']").attr("content")
    }, data_aux);
});

////////////////////////////////////////////////////////////////////////////// FUNCTION EDIT ACTIVITIES

$("#btnEdit").on("click", function (e) {
    e.preventDefault();

    forms = $(".activity-create-form");
    console.log(forms);

    var data = {};

    forms.each(function (index, element) {
        // console.log($(this).children('#type')[0].value)
        // console.log($(this).children('#mode')[0].value)
        if ($(this).children('#type')[0].value === "words") {

            const divForm = document.createElement("form");
            divForm.appendChild($(element).clone()[0]);
            // console.log(element.innerHTML);

            var formData = new FormData(divForm);
            var jsonData = {};
            for (var [k, v] of formData) {
                jsonData[k] = v;
            }
            // console.log(jsonData);
            data[index] = jsonData;

        }

        if ($(this).children('#type')[0].value === "cards") {

        
            imagesFile = $('.imageFile-' + element.id);
            console.log(imagesFile);

            inputFiles = $('.inputImage-1' + element.id);
            console.log(inputFiles);

            inputImage = $(this).children('#cards-images')[0];
            cadena = "";
            imagesFile.each(function (index, elementImage) {
                console.log(element);
                cadena += element.id + "-" + index + "-" + $(elementImage)[0].firstElementChild.id + "/" + $(elementImage)[0].lastElementChild.value;
                if (index < imagesFile.length - 1) {
                    cadena += ',';
                }
          
            })
            console.log(cadena);

            inputImage.value = cadena;
          


            const divForm = document.createElement("form");
            divForm.appendChild($(element).clone()[0]);


            var formData = new FormData(divForm);
            var jsonData = {};
            for (var [k, v] of formData) {
                jsonData[k] = v;
            }

            data[index] = jsonData;



        }

        if ($(this).children('#type')[0].value === "dictation") {

 
            audiosFile = $('.audioFile-'+element.id);
            inputAudio = $(this).children('#audios-dictation')[0];
            
            console.log(audiosFile, inputAudio);
            cadena = "";

            audiosFile.each(function (index, elementAudio) {
                cadena += element.id + "-" + index + "-" + $(elementAudio)[0].firstElementChild.id + "/" + $(elementAudio)[0].lastElementChild.value;
                if (index < audiosFile.length - 1) {
                    cadena += ',';
                }

            })
            console.log(cadena);

            inputAudio.value = cadena;

            const divForm = document.createElement("form");
            divForm.appendChild($(element).clone()[0]);

            var formData = new FormData(divForm);
            var jsonData = {};
            for (var [k, v] of formData) {
                jsonData[k] = v;
            }

            data[index] = jsonData;



        }


    });

    

    console.log(data);

    activity_name = $('#activity-name')[0].value

    data_aux = data;
    data = JSON.stringify(data);

    id_activity = $("#activity-id")[0].value;

    post(route("admin.activities.update",id_activity), {
        data: data,
        activity: activity_name,
        activity_id: id_activity,
        "_token": $("meta[name='csrf-token']").attr("content")
    }, data_aux);
});



$("#B_uploadImages").on("click", function (e) {
    e.preventDefault();

    // console.log("images");
    Livewire.emit('uploadImage')

});


function word_drag_f() {
    num = 2;
    let text2 = `
    <form action="" class="form_contact activity-create-form" id="miForm`+ num + `">
                        <h2>WORD-FINDTHEWORD</h2>
                        <div class="user_info">

                            <label for="dni_number">Numero de identificación</label>
                            <td><input type="text" name="dniiii" id="dni_number" value="1" /></td>

                            <label for="nombreyapellido">Nombre y Apellido</label>
                            <td><input type="text" name="full_name" value="Pedro Pérez" /></td>

                            <label for="contact_phone">Celular</label>
                            <td><input type="tel" name="contact_phone" value="633555555" /></td>

                            <label for="email_address">Correo Electrónico</label>
                            <td><input type="email" name="email_address" value="uncorreo@mail.com" /></td>
                            <br>



                        </div>
                    </form>
    `

    // console.log("hola");
}


// let text = `<livewire:upload-file />`
//     prueba = document.getElementById("prueba");
//     prueba.innerHTML += text;






/**
 * sends a request to the specified url from a form. this will change the window location.
 * @param {string} path the path to send the post request to
 * @param {object} params the parameters to add to the url
 * @param {string} [method=post] the method to use on the form
*/

function post(path, params, data_aux, method = 'post') {

    console.log(params.data);

    params_aux = data_aux;
    console.log(params_aux);
    // The rest of this code assumes you are not using a library.
    // It can be made less verbose if you use one.

    // const form = document.createElement('form');
    // form.method = method;
    // form.action = path;
    const form = document.getElementById("activities-form-contents");


    for (const key in params) {
        // console.log("hola");

        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];

            hiddenField.setAttribute('required', '');

            form.appendChild(hiddenField);
            console.log(hiddenField.value);
        }
    }


    form.submit();
}



function readFileAudio(input) {

    var label = input.nextElementSibling,
        labelVal = label.innerHTML;
    var fileName = " ";
    if (input.files && input.files.length > 1)
        // console.log(input.getAttribute('data-multiple-caption').replace('{count}', input.files.length))
        fileName = (input.getAttribute('data-multiple-caption') || '{count}').replace('{count}', input.files.length);
    else
        fileName = input.files[0].name;

    if (fileName)
        label.innerHTML = fileName;
    else
        label.innerHTML = labelVal;

    // parent = $(input)[0].parentElement;
    parent = $('.audios-' + input.id)[0];
    $(parent).empty();

    console.log(parent);
    audio = document.getElementById('audio-test')

    let file = input.files;
    console.log(file)

    for (const item of file) {

        let fileReader = new FileReader();
        fileReader.readAsDataURL(item);
        fileReader.onload = function () {
            // alert(fileReader.result);
            const divAudio = document.createElement('div');
            divAudio.className += 'audioFile-' + input.id.split("-")[1];

            const audioElement = document.createElement('audio');
            audioElement.id = item.name;
            audioElement.src = fileReader.result;
            audioElement.setAttribute('controls');
            audioElement.setAttribute('wire:ignore');
            audioElement.className += 'audio-file w-full';
            divAudio.appendChild(audioElement);

            const audioInput = document.createElement('input');
            audioInput.setAttribute('wire:ignore');
            audioInput.className += "inpWord";
            audioInput.type = "text";
            audioInput.placeholder = "Insert Text";
            audioInput.value = item.name.split('.')[0];
            divAudio.appendChild(audioInput);

            parent.appendChild(divAudio);

            //   audio.src = fileReader.result;
        };
        fileReader.onerror = function () {
            alert(fileReader.error);
        };
    }


}

function readFileImage(input) {

    var label = input.nextElementSibling,
        labelVal = label.innerHTML;
    var fileName = " ";
    if (input.files && input.files.length > 1)
        // console.log(input.getAttribute('data-multiple-caption').replace('{count}', input.files.length))
        fileName = (input.getAttribute('data-multiple-caption') || '{count}').replace('{count}', input.files.length);
    else
        fileName = input.files[0].name;

    if (fileName)
        label.innerHTML = fileName;
    else
        label.innerHTML = labelVal;

    // parent = $(input)[0].parentElement;
    parent = $('.images-' + input.id)[0];
    $(parent).empty();

    console.log(parent);
    audio = document.getElementById('audio-test')

    let file = input.files;
    console.log(file)

    for (const item of file) {

        let fileReader = new FileReader();
        fileReader.readAsDataURL(item);
        fileReader.onload = function () {
            // console.log(item)
            const divImage = document.createElement('div');
            divImage.className += 'imageFile-' + input.id.split("-")[1];

            const imageElement = document.createElement('img');
            imageElement.src = fileReader.result;
            // imageElement.setAttribute('controls');
            imageElement.id = item.name;
            imageElement.setAttribute('wire:ignore');
            imageElement.className += 'img-file img-cards';
            divImage.appendChild(imageElement);

            const imageInput = document.createElement('input');
            imageInput.setAttribute('wire:ignore');
            imageInput.className += "img-input w-full";
            imageInput.type = "text";
            imageInput.placeholder = "Insert Text";
            imageInput.value = item.name.split('.')[0];
            divImage.appendChild(imageInput);

            parent.appendChild(divImage);

            //   audio.src = fileReader.result;
        };
        fileReader.onerror = function () {
            alert(fileReader.error);
        };
    }


}


// window.addEventListener('loadAudio', event => {
//     console.log("ha cargado");
//     console.log(event.target)

//     uploadAudio = $(event.target);
//     formAudio = $(uploadAudio)[0].children[0];
//     // console.log(uploadAudio);
//     // console.log($(formAudio).children('.audioFile'));
//     inputAudio = $(formAudio).children('.inputAudio');
//     audiosFile = $(formAudio).children('.audioFile');

//     console.log(inputAudio);
//     console.log(audiosFile);


// })

// $(".btn-ready-word").on("click", function (e) {
//     e.preventDefault();
//     // console.log($(e.target).parent())
//     // $(".card-front").toggleClass('card-hidden');
//     // $(".card-back").toggleClass('card-hidden');
//     text = $(".text-" + e.target.name)[0].value;
//     wordsArea = $(".words-" + e.target.name)[0];
//     wordsArea.innerHTML = "";
//     words = text.split(" ");
//     console.log(words);
//     words.forEach(element => {
//         wordsArea.innerHTML += `<div class="word-selectable" id="` + e.target.name + `">` + element + `</div>`;
//     });
//     $(".flip-" + e.target.name).toggleClass('card-hidden');
//     $(e.target)[0].disabled = true;
//     $(e.target)[0].nextElementSibling.disabled = false;
// });


// $(".btn-edit-word").on("click", function (e) {
//     e.preventDefault();
//     // console.log(e.target.name)
//     // $(".card-front").toggleClass('card-hidden');
//     // $(".card-back").toggleClass('card-hidden');
//     $(".flip-" + e.target.name).toggleClass('card-hidden');
//     $(e.target)[0].disabled = true;
//     $(e.target)[0].previousElementSibling.disabled = false
// });

// $(".word-selectable").on('click', function(){
//     console.log("hola")
//     $(this).toggleClass("word-selected")
//     // console.log(this.classList)
// })

$(".activity-create").on("click", function (e) {
    // e.preventDefault();
    console.log(e.target);

    if ($(e.target).hasClass("word-selectable")) {

        cadena = "";
        input = $(".inputWords-" + e.target.id)[0];

        input.value = cadena;

        $(e.target).toggleClass("word-selected")
        words = $(e.target).parent().children(".word-selected");
        for (let i = 0; i < words.length; i++) {
            const element = words[i];
            cadena += element.innerText;
            if (i < words.length - 1) {
                cadena += "-";
            }
        }
        input.value = cadena;

    }

    if ($(e.target).hasClass("icon-delete-word")) {
        $(e.target).parents('.word-selected').remove();
    }

    if ($(e.target).hasClass("icon-delete-form")) {
        $(e.target).parents('.activity-create-form').remove();
    }
    if ($(e.target).hasClass("btn-ready-word")) {
        // e.preventDefault();
        text = $(".text-" + e.target.name)[0].value;
        wordsArea = $(".words-" + e.target.name)[0];
        wordsArea.innerHTML = "";
        words = text.split(" ");
        console.log(words);
        words.forEach(element => {
            wordsArea.innerHTML += `<div class="word-selectable" id="` + e.target.name + `">` + element + `</div>`;
        });
        $(".flip-" + e.target.name).toggleClass('card-hidden');
        $(e.target)[0].disabled = true;
        $(e.target)[0].nextElementSibling.disabled = false;
    }
    if ($(e.target).hasClass("btn-edit-word")) {
        $(".flip-" + e.target.name).toggleClass('card-hidden');
        $(e.target)[0].disabled = true;
        $(e.target)[0].previousElementSibling.disabled = false
    }
    if ($(e.target).hasClass("btn-add-word")) {
        e.preventDefault();
        // console.log($(e.target))
        let input = null;
        let inputWords;
        console.log(inputWords);
        if (e.target.localName == "button") {
            input = $(e.target)[0].previousElementSibling;
            areaWords = $(".words-" + e.target.name)[0];
            inputWords = $(".inputWords-" + e.target.name);
        } else {
            input = $(e.target).parent()[0].previousElementSibling;
            areaWords = $(".words-" + $(e.target).parent()[0].name)[0];
            inputWords = $(".inputWords-" + $(e.target).parent()[0].name);
        }

        words = input.value.split(" ");
        input.value = "";
        console.log(inputWords)

        words.forEach(element => {
            areaWords.innerHTML += `<div class="word-selected">` + element + `<button class="icon-delete-word"><i class="fa fa-times mx-1 text-sm icon-delete-word"></i></button></div>`;
        });
        
        // console.log(e.target.localName, input, words, areaWords);
        words = $(areaWords)[0].children;

        cadena = "";
        for (let i = 0; i < words.length; i++) {
            const element = words[i];
            cadena += element.innerText;
            if (i < words.length - 1) {
                cadena += "-";
            }
        }

        inputWords[0].value = cadena;
        console.log(inputWords);
    }
});


// $(".btn-add-word").on("click", function (e) {
//     e.preventDefault();
//     // console.log($(this)[0].name)
//     input = $(this)[0].previousElementSibling;
//     areaWords = $(".words-" + this.name)[0];
//     words = input.value.split(" ");
//     input.value = "";

//     words.forEach(element => {
//         areaWords.innerHTML += `<div class="word-selected">` + element + `<button class="icon-delete-word"><i class="fa fa-times mx-1 text-sm icon-delete-word"></i></button></div>`;
//     });

//     console.log(areaWords);
// });




$(".btn-flotante").on("click", function (e) {
    e.preventDefault();
    // console.log("hola");
    Livewire.emitTo('modal-content-menu', 'display-modal');
});

$(".btn-assign").on("click", function (e) {
    e.preventDefault();
    console.log(this.id)
    Livewire.emit('set_id_activity', this.id)
    Livewire.emitTo('modal-users-menu', 'display-modal');
});
$(".btn-assign-close").on("click", function (e) {
    e.preventDefault();
    Livewire.emitTo('modal-users-menu', 'display-modal');
});
$(".btn-assign-student").on("click", function(e){
    e.preventDefault();
    console.log(this)
    Livewire.emit('set_id_student', this.id);
    Livewire.emit('modalShowConfirm');
});
$(".btn-assign-student-close").on("click", function(e){
    Livewire.emit('modalShowConfirm');
});
$(".btn-assign-student-confirm").on("click", function(e){
    Livewire.emit('assignStudentActivity');
});
$(".btn-act-delete").on("click", function(e){
    e.preventDefault();
    Livewire.emit('set_id_activity', this.id)
    Livewire.emit('modalShowDelete');
});

// console.log($('#search-student'));
// $('#search-studentt').on("keydown", function(){
//     console.log("hola");
//     Livewire.emit('refresh');
// })


function drag_the_word_f() {
    // qty_activities += 1;
    console.log(qty_activities);
    return `<div class="form_contact activity-create-form" id="` + qty_activities + `" name="">
    <h2 class="desc-content mt-4">WORDS - DRAG THE WORD</h2>
    <input id="type" name="type" type="text" value="words" style="display: none;">
    <input id="mode" name="mode" type="text" value="drag-the-words"
        style="display: none;">
    <div class="user_info">
        <div class="mt-2 w-full">
            <div class="center-h w-1/4">Title</div>
            <div class="center-h"><input class="w-5/6 inpWord" type="text"
                    name="activity_name" value="Add a title" /></div>
        </div>
        <div class="mt-2 mb-4 w-full card-activity">
            <div class="flip-`+ qty_activities + ` card-front">
                <div class="center-h w-1/4">Text</div>
                <div class="center-h">
                    <textarea class="w-5/6 text-`+ qty_activities + ` inpWord" name="text_word" id="" cols="30" rows="7">word1 word2 word3 word4 word5 word6</textarea>
                </div>
            </div>
            <div class="flip-`+ qty_activities + ` card-back card-hidden">
                <div class="center-h w-full">Please, select the words to draw; at least one
                </div>
                <br>
                <div
                    class="flex flex-wrap gap-x-1 gap-y-3 drag-and-drop w-5/6 center-h words-`+ qty_activities + `">
                </div>
            </div>
        </div>
        <div class="flex justify-center gap-x-5 mt-5">
            <button class="btn-black-outliner btn-ready-word" name="`+ qty_activities + `">Ready</button>
            <button class="btn-black-outliner btn-edit-word" name="`+ qty_activities + `"
                disabled>Edit</button>
        </div>
        <br>
        <input class="inputWords-`+ qty_activities + `" type="text" name="words" style="display: none" />
    </div>
    <button class="icon-delete-form"><i
            class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
</div>`
}

function mark_the_word_f() {
    return `<div class="form_contact activity-create-form" id="` + qty_activities + `" name="">
 <h2 class="desc-content mt-4">WORDS - MARK THE WORD</h2>
 <input id="type" name="type" type="text" value="words" style="display: none;">
 <input id="mode" name="mode" type="text" value="mark-the-words"
     style="display: none;">
 <div class="user_info">
     <div class="mt-2 w-full">
         <div class="center-h w-1/4">Title</div>
         <div class="center-h"><input class="w-5/6 inpWord" type="text"
                 name="activity_name" value="Add a title" /></div>
     </div>

     <div class="mt-2 mb-4 w-full card-activity">
         <div class="flip-`+ qty_activities + ` card-front">
             <div class="center-h w-1/4">Text</div>
             <div class="center-h">
                 <textarea class="w-5/6 text-`+ qty_activities + ` inpWord" name="text_word" id="" cols="30" rows="7">word1 word2 word3 word4 word5 word6</textarea>
             </div>
         </div>

         <div class="flip-`+ qty_activities + ` card-back card-hidden">
             <div class="center-h w-full">Please, select the words to mark; at least one
             </div>
             <br>
             <div
                 class="flex flex-wrap gap-x-1 gap-y-3 drag-and-drop w-5/6 center-h words-`+ qty_activities + `">
                 
             </div>
         </div>

     </div>

     <div class="flex justify-center gap-x-5 mt-5">
         <button class="btn-black-outliner btn-ready-word" name="`+ qty_activities + `">Ready</button>
         <button class="btn-black-outliner btn-edit-word" name="`+ qty_activities + `"
             disabled>Edit</button>
     </div>
     <br>
     <input class="inputWords-`+ qty_activities + `" type="text" name="words" style="display: none;" />

 </div>
 <button class="icon-delete-form"><i
         class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
</div>`;
}

function find_the_word_f() {
    return `<div class="form_contact activity-create-form" id="` + qty_activities + `">
    <h2 class="desc-content mt-4">WORDS - FIND THE WORD</h2>
    <input id="type" name="type" type="text" value="words"
        style="display: none;">
    <input id="mode" name="mode" type="text" value="find-the-words"
        style="display: none;">
    <div class="user_info">

        <div class="mt-2 w-full mb-2">
            <div class="center-h w-1/4">Title</div>
            <div class="center-h"><input class="w-5/6 inpWord" type="text"
                    name="activity_name" value="Add a title" /></div>
        </div>

        <div class="center-h w-5/6">Tipe the words</div>

        <div class="center-h">
            <input id="add-word" class="w-5/6 inpWord" type="text" name=""
                id="dni_number" value="" placeholder="Tipe one or more words" />
            <button class="btn-add-word btn-add-outliner" name="`+ qty_activities + `"><i
                    class="btn-add-word fas fa-plus w-full"></i></button>
        </div>

        <br>
        <div
            class="flex flex-wrap gap-x-1 gap-y-3 place-content-center drag-and-drop w-5/6 center-h words-`+ qty_activities + `">
        </div>

        <br>
        <input class="inputWords-`+ qty_activities + `" type="text" name="words" value=""
            style="display: none;" />

    </div>
    <button class="icon-delete-form"><i
            class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
</div>`;
}

function cards_f() {
    return `<div class="form_contact activity-create-form"
    id="`+ qty_activities + `">
    <h2 class="desc-content mt-4">CARDS</h2>

    <div class="mt-2 w-full mb-2">
        <div class="center-h w-1/4">Title</div>
        <div class="center-h"><input class="w-5/6 inpWord" type="text"
                name="activity_name" value="Add a title" /></div>
    </div>

    <input id="type" name="type" type="text" value="cards"
        style="display: none;">
    <input id="cards-images" type="text" name="cards-images" value=""
        style="display: none" />

    <br>
    <div class="center-h">
        <input class="inputImage" type="file" name="inputImage-`+ qty_activities + `[]" id="inputImage-` + qty_activities + `"
            data-multiple-caption="{count} files selected" multiple accept="image/*"
            onchange="readFileImage(this)">
        <label class="labelInputImage" for="inputImage-`+ qty_activities + `">Choose image files</label>
    </div>
    <br><br>
    <div class="w-5/6 center-h grid place-content-center overflow-y-scroll">
        <div
            class="grid place-content-center lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-4 gap-x-5 images-inputImage-`+ qty_activities + `">

        </div>
    </div>
    <br>
    <button class="icon-delete-form"><i
            class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
</div>`;
}

function one_by_one_f() {
    return `<div class="form_contact activity-create-form"
    id="`+ qty_activities + `">
    <h2 class="desc-content mt-4">DICTATION - ONE BY ONE</h2>
    <div class="mt-2 w-full mb-2">
        <div class="center-h w-1/4">Title</div>
        <div class="center-h"><input class="w-5/6 inpWord" type="text"
                name="activity_name" value="Add a title" />
        </div>
    </div>
    <input id="type" name="type" type="text" value="dictation"
        style="display: none;">
    <input id="mode" name="mode" type="text" value="one-by-one"
        style="display: none;">
    <input id="audios-dictation" type="text" name="dictation-audio" value=""
        style="display: none;" />

    <br>
    <div class="center-h">
        <input class="inputAudio" type="file" name="inputAudio-`+ qty_activities + `[]" id="inputAudio-` + qty_activities + `"
            data-multiple-caption="{count} files selected" multiple accept="audio/*"
            onchange="readFileAudio(this)">
        <label class="labeInputAudio" for="inputAudio-`+ qty_activities + `">Choose audio files</label>
    </div>

    <br><br>

    <div class="grid place-content-center w-5/6 center-h">
        <div
            class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-y-4 gap-x-20 audios-inputAudio-`+ qty_activities + `">

        </div>
    </div>
    <br>
    <button class="icon-delete-form"><i
            class="fa fa-times mx-1 text-sm icon-delete-form"></i></button>
</div>`;
}

// let activities_html = {
//     drag_the_word: drag_the_word_f(qty_activities),
//     mark_the_word: mark_the_word_f(),
//     find_the_word: find_the_word_f(),
//     card: cards_f(),
//     one_by_one: one_by_one_f()
// }

// console.log(activities_html["drag_the_word"])

$(".card-menu").on("click", function () {
    div = $(".activity-create")[0];
    qty_activities += 1;
    console.log(qty_activities);
    if (this.id == 'drag_the_word')
        div.innerHTML += drag_the_word_f();
    if (this.id == 'mark_the_word')
        div.innerHTML += mark_the_word_f();
    if (this.id == 'find_the_word')
        div.innerHTML += find_the_word_f();
    if (this.id == 'card')
        div.innerHTML += cards_f();
    if (this.id == 'one_by_one')
        div.innerHTML += one_by_one_f();
});


// window.addEventListener('show-modal', event => {
//     console.log("hola");
//     $("#modalContentMenu").modal('show');
// })