@php

use App\Models\DetallesWords;

// $data = 'El terreno de juego es rectangular de *césped* natural o artificial, con una portería o arco a cada lado del campo. Se juega mediante una pelota que se debe desplazar a través del campo con cualquier parte del cuerpo que no sean los *brazos* o las manos, y mayoritariamente con los pies (de ahí su nombre). El objetivo es introducirla dentro de la *portería* o arco contrario, acción que se denomina marcar un gol. El equipo que logre más goles al cabo del partido, de una *duración* de 90 minutos, es el que resulta ganador del encuentro.';
// $activity_content = DetallesWords::where('mode', 'find-the-words')->first();
// dd($activity_content->words);
// dd($activity_content);
$data = str_replace("\n", " \n ", $activity_content->text);
// dd(DetallesWords::all()->first());
$texto = explode(' ', $data);
$cont_palabras = [];
$palabras = [];

if ($activity_content->mode == 'drag-the-words') {
    $start = false;
    $start_pos = 0;
    $len = 0;
    for ($i = 0; $i < strlen($data); $i++) {
        if ($data[$i] == '*') {
            if ($start == false) {
                $start = true;
                $start_pos = $i + 1;
                $len = 0;
            } else {
                array_push($cont_palabras, substr($data, $start_pos, $len - 1));
                $start = false;
            }
        }
        $len++;
    }
    $palabras = $cont_palabras;
    shuffle($palabras);
}

if ($activity_content->mode == 'mark-the-words') {
  $palabras = $activity_content->words;
  $palabras = json_decode($palabras);
}

if ($activity_content->mode == 'find-the-words') {
  $palabras = $activity_content->words;
  $palabras = json_decode($palabras);
}

// dd($texto ,$palabras);

@endphp

<div id="{{$activity_content->id}}" class="activity-content {{$activity_content->mode}}">
    {{-- Stop trying to control. --}}

    @if ($activity_content->mode == 'drag-the-words')


        <br><br><br>
        
        <div class="grid place-content-center blank-drag">
        <div>
        <div class="container flex flex-wrap gap-x-1 gap-y-3 drag-and-drop">
           
            @foreach ($texto as $word)
                      @if (substr($word, -1) == "\n")
              </div>
              <br>
              <div class="container flex flex-wrap gap-x-1 gap-y-3 drag-and-drop">
              @else
                  @if ($word[0] == '*')
                      <div class="dropzone blank"></div>
                  @else
                      <div>{{ $word }}</div>
                  @endif
              @endif
            @endforeach

        </div>
        </div>
        </div>
      

        <br><br><br>
        <div class="container flex flex-wrap gap-x-3 gap-y-1 drag-and-drop justify-center">

            @foreach ($palabras as $word)
                <div class="dropzone draggable-dropzone--occupied">
                    <div class="item">{{ $word }}<div class="grid place-content-center check-word-true not_visible"><i class="fa fa-check fa-xs" aria-hidden="true"></i></div><div class="grid place-content-center check-word-false not_visible"><i class="fa fa-times fa-xs" aria-hidden="true"></i></div></div>
                </div>
            @endforeach

        </div>

    @endif

    @if ($activity_content->mode == 'mark-the-words')
    

    <br><br><br>

        <div class="grid place-content-center">
          <div>
        <div class="container flex flex-wrap gap-x-1 gap-y-3 drag-and-drop">

            @foreach ($texto as $word)
                @if (substr($word, -1) == "\n")
                  </div>
                  <br>
                  <div class="container flex flex-wrap gap-x-1 gap-y-3 drag-and-drop">
                @else
                  <div class="word-selectable">{{ $word }}</div>
                @endif
        @endforeach

        </div>
      </div>
    </div>

    @endif


    @if ($activity_content->mode == 'find-the-words')
    
        <!-- Add required markup -->
        <br><br><br>

    <div class="flex justify-center">
      
      <div id='puzzle'></div>

    </div>
   
     
      <div id='words'></div>
      <div><button id='solve'></button></div>

    @endif


    
  
   
    



<style>

    .word-selectable:hover{
        background: lightgray;
        border-radius: 5px;
    }

    .word-selected {
        background: #01ffe9;
        border-radius: 5px;
        padding-left: 2px;
        padding-right: 2px;
        position: relative;
    }

    .word-selectable.word-selected:hover{
        background: rgb(23, 181, 173);
        border-radius: 5px;
        padding-left: 2px;
        padding-right: 2px;
    }

    div.drag-and-drop>div {}

    .inline {
        float: left;
    }

    .item {
        height: 100%;
        position: relative;
    }

    .dropzone {
        /* outline: solid 1px; */
        border-bottom: 1px solid #000;
        width: 100px;
        height: 20px;
    }

    .ancho {
        width: 100px;
        height: 40px;
        background: rgb(0, 135, 0);
        outline: solid 1px;
    }

    .draggable-dropzone--occupied {
        background: #01ffe9;
        text-align: center;
        border-radius: 10px;
    }

    .check-word-true{
      background-color: green;
      color: white;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      position: absolute; top:-10px; right:0;
    }

    .check-word-false{
      background-color: rgb(202, 21, 21);
      color: white;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      position: absolute; top:-10px; right:0;
    }
/* ***************************** */


/**
* Wordfind.js 0.0.1
* (c) 2012 Bill, BunKat LLC.
* Wordfind is freely distributable under the MIT license.
* For all details and documentation:
*     http://github.com/bunkat/wordfind
*/

p {
  font: 22pt sans-serif;
  margin: 20px 20px 0px 20px;
}

/**
* Styles for the puzzle
*/
#puzzle {
  border: 5px solid rgb(12, 17, 90);
  border-radius: 15px;
  padding: 20px;
  float: left;
  margin: 30px 20px;
}

#puzzle div {
  width: 100%;
  margin: 0 auto;
}

/* style for each square in the puzzle */
#puzzle .puzzleSquare {
  height: 30px;
  width: 30px;
  text-transform: uppercase;
  background-color: white;
  border: 0;
  font: 1em sans-serif;
}

button::-moz-focus-inner {
  border: 0;
}

/* indicates when a square has been selected */
#puzzle .selected {
  background-color: orange;
}

/* indicates that the square is part of a word that has been found */ 
#puzzle .found {
  background-color: blue;
  color: white;
}

#puzzle .solved {
  background-color: purple;
  color: white;
}

/* indicates that all words have been found */
#puzzle .complete {
  background-color: green;
}

.complete {
  background-color: green;
}

/**
* Styles for the word list
*/
#words {
  padding-top: 20px;
  -moz-column-count: 2;
  -moz-column-gap: 20px;
  -webkit-column-count: 2;
  -webkit-column-gap: 20px;
  column-count: 2;
  column-gap: 20px;
  width: 300px;
}

#words ul {
  list-style-type: none;
}

#words li {
  padding: 3px 0;
  font: 1em sans-serif;
}

/* indicates that the word has been found */
#words .wordFound {
  text-decoration: line-through;
  color: gray;
}

/**
* Styles for the button
*/
#solve {
  margin: 0 30px;
}



</style>


<script>
    data = @json($activity_content);

    // console.log(data.mode);
    // console.log($('.item'));

    if (data.mode == "drag-the-words") {

        const droppable = new Draggable.Droppable(document.querySelectorAll('.container'), {
            draggable: '.item',
            dropzone: '.dropzone'
        });

        droppable.on('droppable:dropped', () => console.log('droppable:dropped'));
        droppable.on('droppable:returned', () => console.log('droppable:returned'));

    }


    if (data.mode == "mark-the-words") {

      $(".word-selectable").on('click', function(){
          $(this).toggleClass("word-selected")
          // console.log(this.classList)
      });

    }

    if (data.mode == "find-the-words") {

            // var words = ['car', 'dog', 'water'];
            var words = @json($palabras);

      // start a word find game
      var gamePuzzle = wordfindgame.create(words, '#puzzle'); //, '#words'

      $('#solve').click( function() {
        wordfindgame.solve(gamePuzzle, words);
      });

      // create just a puzzle, without filling in the blanks and print to console
      var puzzle = wordfind.newPuzzle(
        words, 
        {height: 18, width:18, fillBlanks: false}
      );
      wordfind.print(puzzle);

    }

    


</script>
</div>
