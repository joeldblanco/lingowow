<x-app-layout>

    <div class="bg-white font-sans">
        <div class="max-w-7xl mr-auto sm:px-6 lg:px-8 flex flex-row">
            <div class="w-1/4 m-3">
                {{-- {{dd($units)}} --}}
                <ul class="bg-gray-200 sticky top-5 p-5 rounded-lg" style="height: calc(100vh - 2.25rem)">
                    @foreach ($units as $unit)
                        @php
                            $name_unit = strtolower(str_replace(" ","",$unit->unit_name))
                        @endphp
                        <li class="font-bold text-lg @if(!$unit->status) opacity-25 @endif">{{$unit->unit_name}}</li>
                        <li class="mb-5 @if(!$unit->status) text-gray-400 @endif">
                            <ul class="list-inside pl-5">
                                <li class="w-full">
                                    <a href="#{{$name_unit}}-slide" class="hover:text-gray-500">Slide</a>
                                </li>
                                <li>
                                    <a href="#{{$name_unit}}-ssm" class="hover:text-gray-500">Self-Study Material</a>
                                </li>
                                <li>
                                    <a href="#{{$name_unit}}-forum" class="hover:text-gray-500">Forum</a>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full space-y-7">
                @foreach ($units as $unit)
                <div class="w-full @if(!$unit->status) opacity-25 @endif">
                    @php
                        $name_unit = strtolower(str_replace(" ","",$unit->unit_name))
                    @endphp
                    {{-- <x-unit name="{{$unit->unit_name}}" slide="{{$unit->slide_url}}" doc="{{$unit->doc_url}}" audio="{{$unit->audio_url}}" nameforo="{{$unit->forum_name}}" foro="{{$unit->forum_url}}"/> --}}
                    {{-- <br><br><br><hr><br> --}}
                    <h1 class="titulounit mb-3" id="{{$name_unit}}-slide">{{$unit->unit_name}}</h1>
                    <hr class="separatortittle-b">

                    <br><br>

                    <div class="flex justify-center">
                        <iframe src="{{$unit->slide_url}}"
                        allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" width="960" height="540" frameborder="0"></iframe>
                    </div>

                    <br><br>

                    <div class="flex justify-center" id="{{$name_unit}}-ssm">
                        <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick="" href="{{$unit->doc_url}}">
                            <img src="https://campus.theuttererscorner.com/theme/image.php/moove/url/1627123195/icon" class="iconlarge activityicon mr-2" width="24" height="24" alt="" role="presentation" aria-hidden="true">
                            <span class="instancename">{{$unit->unit_name}} - Self-study Material<span class="accesshide "></span></span>
                        </a>
                    </div>
                    <br>
                    <p dir="ltr" style="text-align: center;">Dear utterer, you can download this file to practice and you can check it with your tutor on the following lesson.<br></p>
                    <br>
                    
                    <h2 style="text-align: center;">Audio - Self-Study Material - {{$unit->unit_name}}</h2>
                    <br>
                    <div class="flex justify-center">
                        <audio controls="controls" controlslist="nodownload" __idm_id__="921248769">
                            <source src="{{$unit->audio_url}}">
                        </audio>
                    </div>
                    <br>
                    <h2 style="text-align: center;" id="{{$name_unit}}-forum">Forum</h2>
                    <br>
                    <div class="flex justify-center">
                        <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick="" href="{{$unit->forum_url}}">
                            <img src="https://campus.theuttererscorner.com/theme/image.php/moove/forum/1627123195/icon" class="iconlarge activityicon mr-2" width="24" height="24" alt="" role="presentation" aria-hidden="true">
                            <span class="instancename">{{$unit->forum_name}} - {{$unit->unit_name}}<span class="accesshide "></span></span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            {{-- <x-jet-welcome /> --}}
                
                

            </div>
        </div>
    </div>
</x-app-layout>
