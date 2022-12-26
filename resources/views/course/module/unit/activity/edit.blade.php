@php
    use App\Models\Unit;
    use App\Models\ContentOfAct;
    
    $units = Unit::all();
    $qty_contents = ContentOfAct::all()->count();
    // dd($qty_contents);
@endphp


<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">


                <h1>Edit Activity</h1>
                <br>
                <hr>
                <br>
                <div style="display: :none;" id="data_qty_content" data-user=@json($qty_contents)></div>
                <div class="">

                    <div class="center-h w-1/4">ACTIVITY NAME</div>
                    <div class="center-h"><input class="inpWord w-5/6" id="activity-id" name="id_activity" type="text" style="display: none"
                        value="{{ $activity->id }}"></div>
                    <div class="center-h"><input class="inpWord w-5/6" id="activity-name" name="activityyyy" type="text"
                            value="{{ $activity->name }}"></div>
                    <br>


                    <form id="activities-form-contents" enctype="multipart/form-data"
                        action="{{ route('admin.activities.update',$activity->id) }}" method="POST">


                        <div class="center-h w-1/4">Select the unit</div>
                        <div class="center-h">
                            <select form="activities-form-contents" name="unit" class="inpWord w-2/6" required>
                                <option hidden value="0">Select unit</option>
                                @foreach ($units as $unit)
                                    @if ($unit->id == $activity->unit_id)
                                        <option selected value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                    @else
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <br>

                        @csrf

                        <div class="activity-create">

                            @foreach ($activity_contents as $key => $content)
                                {{-- {{dump($content->detalles->first())}} --}}
                                {{-- <div class="content-box"> --}}

                                @if ($content->type == 'words')
                                    {{-- <h2 class="content-title">{{ $content->titulo }}</h2> --}}
                                    @livewire('activities-edit.edit-activity-words', ['content' => $content,'activity_content' => $content->detalles->first(), 'num_content' => $key])
                                @endif
                                @if ($content->type == 'cards')
                                    {{-- <h2 class="content-title">{{ $content->titulo }}</h2> --}}
                                    @livewire('activities-edit.edit-activity-cards', ['content' => $content,'activity_content' => $content->detalles->first(), 'num_content' => $key])
                                @endif
                                @if ($content->type == 'dictation')
                                    {{-- <h2 class="content-title">{{ $content->titulo }}</h2> --}}
                                    @livewire('activities-edit.edit-activity-dictation', ['content' => $content,'activity_content' => $content->detalles->first(), 'num_content' => $key])
                                @endif
                                {{-- </div> --}}
                                
                            @endforeach

                        </div>
                        <div class="center-h">
                            <button value="Submit" id="btnEdit" class="btn-black-outliner"
                                type="">Save</button>
                        </div>
                    </form>

                    {{-- @livewire('upload-file')
                    <br><br>
                    @livewire('upload-file') --}}
                    {{-- <button id="B_uploadImages" >Save Photos</button> --}}
                    <div id="prueba">

                    </div>
                    <br>
                    <div class="center-h">
                        {{-- <button value="Enviar" id="btnSend" class="btn-black-outliner">Save</button> --}}
                    </div>
                    <div class="grid place-content-center">
                        @livewire('modal-content-menu')
                    </div>
                    <a href="#" class="btn-flotante"><i class="fa fa-plus text-sm "></i></a>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
