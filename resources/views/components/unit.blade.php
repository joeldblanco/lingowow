
            <h1 class="titulounit mb-3">{{$name}}</h1>
            <hr class="separatortittle-b">
            <br><br>
            <div class="flex justify-center">
            <iframe src="{{$url_slide}}" 
            allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" width="960" height="540" frameborder="0"></iframe>
            </div>

            <br><br>

            <div class="flex justify-center">
                <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick="" href="{{$url_doc}}">
                    <img src="https://campus.theuttererscorner.com/theme/image.php/moove/url/1627123195/icon" class="iconlarge activityicon mr-2" width="24" height="24" alt="" role="presentation" aria-hidden="true">
                    <span class="instancename">{{$name}} - Self-study Material<span class="accesshide "></span></span>
                </a>
            </div>
            <br>
            <p dir="ltr" style="text-align: center;" id="yui_3_17_2_1_1627517834321_20">Dear utterer, you can download this file to practice and you can check it with your tutor on the following lesson.<br></p>
            <br>
            
            <h2 style="text-align: center;" >Audio - Self-Study Material - {{$name}}</h2>
            <br>
            <div class="flex justify-center">
                <audio controls="controls" controlslist="nodownload" __idm_id__="921248769">
                    <source src="{{$url_audio}}">
                </audio>
            </div>
            <br>
            <h2 style="text-align: center;" >Forum</h2>
            <br>
            <div class="flex justify-center">
                <a class="aalink flex flex-row items-center" style="color: #5ccecd;" onclick="" href="{{$url_foro}}">
                    <img src="https://campus.theuttererscorner.com/theme/image.php/moove/forum/1627123195/icon" class="iconlarge activityicon mr-2" width="24" height="24" alt="" role="presentation" aria-hidden="true">
                    <span class="instancename">{{$name_foro}} - {{$name}}<span class="accesshide "></span></span>
                </a>
            </div>