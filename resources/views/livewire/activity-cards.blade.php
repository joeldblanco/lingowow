@php
$activity_content = json_decode($activity_content->cards_group);
    // dd(json_decode($activity_content->cards_group));
@endphp

<div>
    {{-- Success is as dangerous as failure. --}}
    
    {{-- <div class="flex justify-center">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front rounded overflow-hidden shadow-lg">
            <img src="{{ Storage::url('images/dog.jpg') }}" alt="Avatar" style="width:auto;height:auto;">
          </div>
          <div class="flip-card-back rounded overflow-hidden shadow-lg">
            <h1>John Doe</h1>
            <p>Architect & Engineer</p>
            <p>We love that guy</p>
          </div>
        </div>
      </div>
    </div> --}}
    
    {{-- <hr> --}}

    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden">
            <div class="mt-10 mb-20">
                {{-- <h3 class="text-4xl font-bold text-gray-800">Available Unit Cards</h3> --}}
                <h4 class="text-2xl font-bold text-gray-400 ml-5 mr-5">Keep clicking on the image to see his word</h4>
                <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": false, "draggable": false }'>
                    @foreach ($activity_content as $content)
                        {{-- {{dd($content)}} --}}
                        <div class="gallery-cell">
                            <div
                                class="py-6 px-6 my-4 mt-7 mb-2 mx-10">
                                
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                      <div class="flip-card-front rounded overflow-hidden shadow-lg">
                                        <img src="{{ asset('storage/activity-cards/'.$content[0]) }}" alt="Avatar" style="width:100%;height:100%;object-fit:cover;">
                                        {{-- {{dump(asset('storage/activity-cards/'.$content[0]))}} --}}
                                      </div>
                                      <div class="grid place-content-center flip-card-back rounded overflow-hidden shadow-lg">
                                        
                                            <div>
                                                {{strtoupper($content[1])}}
                                            </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <hr>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden">
          <div class="mt-10 mb-20">
              
              <h4 class="text-2xl font-bold text-gray-400 ml-5 mr-5">Write the word corresponding to the image</h4>
              <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": false, "draggable": false }'>
                  @foreach ($activity_content as $content)
                  
                      <div class="gallery-cell mb-5 pb-5">
                          <div
                              class="py-6 px-6 my-4 mt-7 mb-2 mx-10">
                              
                              <div class="flip-card ">
                                  
                                    <div class="img-card overflow-hidden shadow-lg">
                                      <img src="{{ asset('storage/activity-cards/'.$content[0]) }}" alt="Avatar" style="width:auto;height:auto;">
                                    </div>
                                    <div class="input-card overflow-hidden shadow-lg">
                                        <input class="card-word w-full py-2 px-3 text-gray-700 shadow-lg" type="text" placeholder="Write here!">
                                    </div>
                                    
                                  </div>
                                
                          </div>
                      </div>
                      
                      
                  @endforeach
              </div>
          </div>
      </div>
  </div> --}}


    <style>

/* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  background-color: transparent;
  width: 300px;
  height: 200px;
  /* border: 1px solid #f1f1f1; */
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  background-color: transparent;
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:active .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card:hover .flip-card-inner {
  cursor: pointer;
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background-color: #01ffe9;
  border: 10px solid rgb(37, 37, 37);
  color: rgb(29, 29, 29);
  font-size: 35px;
  font-weight: 900;
  transform: rotateY(180deg);
}


.card-word{
  border-radius: 0 0 10px 10px;
  border: 1px solid lightgray;
  font-size: 20px;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
  outline: none;
}

.card-word::placeholder{
  font-size: 20px;
  font-weight: 300;
  text-align: center;
}

.card-word:focus{
  border-color: #01ffe9;
  box-shadow: 0 1px 1px rgba(229, 103, 23, 0.075)inset, 0 0 8px rgba(121, 119, 116, 0.6);
  outline: 0 none;
}

.card-word:focus::placeholder{
  color: lightgray;
}

.img-card{
  border-radius: 10px 10px 0 0;
}

.input-card{
  background-color: transparent;
}

    </style>


</div>
