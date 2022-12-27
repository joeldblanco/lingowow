@php
    use App\Models\Unit;
    use App\Models\ContentOfAct;

    $units = Unit::all();
    $qty_contents = ContentOfAct::all()->last()->id;
    // dd($qty_contents);
@endphp

<x-app-layout>
    <div class="bg-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200" x-data="{ unitsModal: false }" x-cloak>

                <h1>Create Activity</h1>
                <br>
                <hr>
                <br>
                <div style="display: :none;" id="data_qty_content" data-user=@json($qty_contents)></div>
                <div class="">

                    <div class="center-h w-1/4">ACTIVITY NAME</div>
                    <div class="center-h"><input class="inpWord w-5/6" id="activity-name" name="activity" type="text"
                            value="Activity 2"></div>
                    <br>



                    {{-- <div class="activity-create">

                    </div> --}}

                    <form id="activities-form-contents" enctype="multipart/form-data"
                        action="{{ route('admin.activities.storeFiles') }}" method="POST">


                        <div class="center-h w-1/4">Select the unit</div>
                        <div class="center-h">
                            <select form="activities-form-contents" name="unit" class="inpWord w-2/6" required>
                                <option hidden selected value="0">Select unit</option>
                                @foreach ($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        @csrf

                        <div class="activity-create">

                        </div>
                        <div class="center-h">
                            <button value="Submit" id="btnSend" class="btn-black-outliner"
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
                    <a href="#" class="btn-flotante" ><i
                            class="fa fa-plus text-sm "></i></a>
                </div>
                {{-- wire:click="$set('showModalMenu', 'true')" --}}
            </div>
        </div>

    </div>



</x-app-layout>
