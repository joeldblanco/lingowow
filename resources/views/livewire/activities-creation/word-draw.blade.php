<div>
    <form action="" class="form_contact activity-create-form" id="miForm" name="">
        <h2>WORD-DRAGTHEWORD</h2>
        <input id="type" name="type" type="text" value="words" style="display: none;">
        <input id="mode" name="mode" type="text" value="drag-the-words"
            style="display: none;">
        <div class="user_info">
            <label for="nombreyapellido">Name</label>
            <td><input type="text" name="activity_name" value="nombre de la actividad" /></td>

            <label for="dni_number">Text</label>
            <td>
                <textarea name="text_word" id="" cols="30" rows="7">word1 word2 word3 word4 word5 word6</textarea>
            </td>
            <td>
                <div class="flex flex-wrap gap-x-1 gap-y-3 drag-and-drop">
                    <div class="word-selectable">Word1</div>
                    <div class="word-selectable word-selected">Word2</div>
                    <div class="word-selectable">Word3</div>
                    <div class="word-selectable">Word4</div>
                    <div class="word-selectable word-selected">Word5</div>
                    <div class="word-selectable">Word6</div>
                </div>
            </td>
            <button class=" mr-3">Ready</button><button class="">Edit</button>
            <br>
            <label for="nombreyapellido">palabras</label>
            <td><input type="text" name="words" value="word2-word5" style="display: none;" /></td>

        </div>
    </form>
</div>
