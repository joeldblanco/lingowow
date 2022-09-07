<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                {{-- {{dd("a ver")}} --}}
                {{-- {{dd($detalles)}} --}}
                <h1 class="activity-title">{{ $activity->name }}</h1>
                <br><br><br>
                <div class="content-box">
                    @foreach ($activity_contents as $content)
                        {{-- {{dd($content)}} --}}
                        <br><br>
                        <br><br>
                        {{-- <div class="content-box"> --}}
                        <h2 class="content-title">{{ $content->titulo }}</h2>
                        @livewire('activity-words', ['activity_content' => $content->detalles->first()])
                        {{-- </div> --}}
                        <br><br>
                    @endforeach

                    <br><br>
                    <hr><br>
                    <div class="flex justify-center">
                        <button class="evaluate-button" onclick="evaluate_activity()">Evaluate</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <style>



    </style>

    <script>
        function evaluate_activity() {

            array = @json($detalles[0]->words);
            // console.log(@json($detalles));
            detalles = @json($detalles);
            // words = JSON.parse(array);
            words = "";
            // console.log(words)
            content = $('.activity-content');
            // console.log("gola");

            // console.log(content);

            // for (let i = 0; i < content.length; i++) {
            //     if(content[i].classList.contains("drag-the-words")){
            //         console.log(content[i].id);
            //     }
            // }

            content.each(function(index, element) {

                if ($(this).hasClass('drag-the-words')) {

                    // console.log()
                    // console.log(detalle(detalles,element.id));
                    let content_detalle = detalle(detalles, element.id);
                    words = JSON.parse(content_detalle.words);
                    console.log(words)

                    let item = $('.blank-drag').find('.dropzone.blank');
                    // console.log(item);

                    item.each(function(j, itemElement) {
                        if (itemElement.firstChild != null) {
                            // console.log(itemElement.firstChild.childNodes[0].textContent);
                            if (itemElement.firstChild.childNodes[0].textContent == words[j]) {
                                $(itemElement.firstChild.childNodes[1]).toggleClass('not_visible');
                            } else {
                                $(itemElement.firstChild.childNodes[2]).toggleClass('not_visible');
                            }
                        }
                    });

                }

                if ($(this).hasClass('mark-the-words')) {

                    // console.log()
                    // console.log(detalle(detalles,element.id));
                    let content_detalle = detalle(detalles, element.id);
                    words = JSON.parse(content_detalle.words);
                    // console.log(words)

                    let check_true = `<div class="grid place-content-center check-word-true not_visible"><i class="fa fa-check fa-xs" aria-hidden="true"></i></div>`
                    let check_false = `<div class="grid place-content-center check-word-false not_visible"><i class="fa fa-times fa-xs" aria-hidden="true"></i></div>`

                    // NO ELIMINAR (POSIBLE USO FUTURO);

                    // var div = document.createElement('div');
                    // div.innerHTML = check_true;
                    // var container = document.createDocumentFragment();
                    // for (var i = 0; i < div.childNodes.length; i++) {
                    //     var node = div.childNodes[i].cloneNode(true);
                    //     container.appendChild(node);
                    // }

                    let item = $('.word-selectable.word-selected');
                    // console.log(container.childNodes);
                    console.log(item);

                    item.each(function(j, itemElement) {
                        if (itemElement != null) {
                            // console.log(itemElement.firstChild.childNodes[0].textContent);
                            if (words.includes(itemElement.childNodes[0].textContent)) {
                                itemElement.innerHTML += check_true;
                                $(itemElement.childNodes[1]).toggleClass('not_visible');
                            } else {
                                itemElement.innerHTML += check_false;
                                $(itemElement.childNodes[1]).toggleClass('not_visible');
                            }
                        }
                    });

                }


            });

            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });

        }

        function detalle(detalles, id_detalle) {
            // console.log(id_detalle)

            for (const element of detalles) {
                if (element.id == id_detalle) {
                    return element;
                }
            }

        }
    </script>

</x-app-layout>
