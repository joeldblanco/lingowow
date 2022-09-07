<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="mt-10 mb-20">
                    <h1 class="text-3xl font-bold text-center text-gray-500 mb-3">{{ $unit->unit_name }}</h1>
                    {{-- <hr class="separatortittle-b"> --}}
                    <br><br>
                    <div class="flex justify-center">
                        <iframe src="{{ $unit->slide_url }}" allowfullscreen="true" mozallowfullscreen="true"
                            webkitallowfullscreen="true" width="960" height="540" frameborder="0"></iframe>
                    </div>
    
                    <br><br>
    
                    <div class="flex justify-center">
                        <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick=""
                            href="{{ $unit->doc_url }}">
                            <img src="https://campus.theuttererscorner.com/theme/image.php/moove/url/1627123195/icon"
                                class="iconlarge activityicon mr-2" width="24" height="24" alt="" role="presentation"
                                aria-hidden="true">
                            <span class="instancename">{{ $unit->unit_name }} - Self-study Material<span
                                    class="accesshide "></span></span>
                        </a>
                    </div>
                    <br>
                    <p dir="ltr" style="text-align: center;" id="yui_3_17_2_1_1627517834321_20">Dear utterer, you can
                        download this file to
                        practice and you can check it with your tutor on the following lesson.<br></p>
                    <br>
    
                    <h2 style="text-align: center;">Audio - Self-Study Material - {{ $unit->unit_name }}</h2>
                    <br>
                    <div class="flex justify-center">
                        <audio controls="controls" controlslist="nodownload">
                            <source src="{{ $unit->audio_url }}">
                        </audio>
                    </div>
                    <br>
                    <h2 style="text-align: center;">Forum</h2>
                    <br>
                    <div class="flex justify-center">
                        <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick=""
                            href="{{ $unit->forum_url }}">
                            <img src="https://campus.theuttererscorner.com/theme/image.php/moove/forum/1627123195/icon"
                                class="iconlarge activityicon mr-2" width="24" height="24" alt="" role="presentation"
                                aria-hidden="true">
                            <span class="instancename">{{ $unit->forum_name }} - {{ $unit->unit_name }}<span
                                    class="accesshide "></span></span>
                        </a>
                    </div>
                </div>
                <hr/>
                <div class="mt-10 mb-20">
                    <div class="text-3xl font-bold text-left text-gray-400 flex space-x-6 items-center">
                        <i class="fas fa-tasks"></i>
                        <h2>Activities</h2>
                    </div>
                    <a href="{{$unit->id}}/activity/1">Actividad asignada prueba</a>
                    <div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
