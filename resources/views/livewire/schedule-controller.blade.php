<div>
    <table class="border" style="width: 100%">
        <!--HEADERS ROW-->
        <tr>
            <th class="width border">UTC</th>
            <th>LOCAL</th>
            @foreach ($days as $day)
                <th class="border width">
                    {{ $day }}
                </th>
            @endforeach
        </tr>

        <!--BODY ROWS-->
        @for ($i = 0; $i < 24; $i++)
            <tr>
                <td class="width border UTC">
                    {{ Carbon\Carbon::createFromFormat('H', str_pad($i, 2, '0', STR_PAD_LEFT))->format('H:i') }}
                </td>
                <td class="width border Local"></td>
                @for ($e = 0; $e < 7; $e++)
                    <td id="{{ $i }}-{{ $e }}" class="border width"></td>
                @endfor
            </tr>
        @endfor
    </table>


    <script>
        var schedule = @json($schedule);

        schedule.forEach(element => {
            var hour = element[0];
            var day = element[1];
            var id = hour + '-' + day;
            document.getElementById(id).classList.add("selected");
        });

        var OpenLocal = new Date(@json(now())).getTimezoneOffset() / 60;
        var cellsLocal = $('.Local');
        for (var i = 0; i < cellsLocal.length; i++) {
            var hourString = '';
            if (OpenLocal < 10) {
                if (OpenLocal < 0) {
                    OpenLocal += 24;
                    hourString += OpenLocal + ":00";
                } else {
                    hourString += "0" + OpenLocal + ":00";
                }
            } else {
                hourString += OpenLocal + ":00";
            }
            cellsLocal[i].innerHTML = hourString;
            if (OpenLocal >= 23) {
                OpenLocal = 0;
            } else {
                OpenLocal++;
            }
        }

        var init = false;
        // console.log(preClassTd)
        var selection = new SelectionArea({
                selectables: ["td.selectable"],
                boundaries: [".container"],
            })
            .on("start", ({
                store,
                event
            }) => {
                if (!init) {
                    // console.log("hola?")
                    store.stored = preClassTd;
                    init = true;
                }
                // console.log(init)
                // console.log(store)
                if (!event.ctrlKey && !event.metaKey) {
                    // console.log(store)
                    for (var el of store.stored) {
                        //console.log("si")
                        if (el.classList.contains("selected") && el.classList.contains("selectable")) {
                            el.classList.remove("selected");
                            classSelected = classSelected.filter(function(cf) {
                                return cf !== el.id;
                            });
                            if (numClass > 0)
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
                        changed: {
                            added,
                            removed
                        }
                    }
                }) => {
                    // console.log(added)
                    for (var el of added) {
                        if (!(el.classList.contains("selected"))) {
                            if (numClass < qtyClass) {
                                el.classList.add("selected");
                                classSelected.push(el.id);
                                numClass++;
                                //console.log("dos"+numClass);
                            }
                        }
                    }

                    for (var el of removed) {
                        if (el.classList.contains("selected")) {
                            el.classList.remove("selected");
                            classSelected = classSelected.filter(function(cf) {
                                return cf !== el.id;
                            });
                            numClass--;
                        }
                        //console.log("tres"+numClass);

                    }

                }

            );
    </script>

</div>
