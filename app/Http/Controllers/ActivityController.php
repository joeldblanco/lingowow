<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ContentOfAct;
use App\Models\DetallesCards;
use App\Models\DetallesDictation;
use App\Models\DetallesWords;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\each;

class ActivityController extends Controller
{
    public $activity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        // dd($activities->first()->unit->group->module->course);
        $activities = Activity::Where('status', '1')->get();
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("hola");
        // return view('livewire.activity-create');
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = json_decode($request->data, true);
        // dd($data);

        // $activity = new Activity;
        // $activity->name = $request->activity;
        // $activity->unit_id = '1'; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
        // $activity->save();

        $last_activity = Activity::all()->last();

        foreach ($data as $key => $value) {
            // dd(json_encode(explode("-", $value['words'])));
            if ($value["type"] == 'words') {
                $content = new ContentOfAct;
                $content->unit_id = '1'; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                $content->activities()->attach($last_activity->id);

                $details = new DetallesWords;
                $details->content_id = $content->id;
                if ($value['mode'] != 'find-the-word') {
                    $details->text = $value['text_word'];
                }
                $details->words = json_encode(explode("-", $value['words']));
                $details->mode = $value['mode'];
                $details->save();
            }

            if ($value['type'] == 'cards') {

                $data_cards = explode(',', $value['cards-images']);
                foreach ($data_cards as $key => $value) {
                    $data_cards[$key] = explode('/', $value);
                }
                $data_cards = json_encode($data_cards);

                $content = new ContentOfAct;
                $content->unit_id = '1'; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                $content->activities()->attach($last_activity->id);

                $details = new DetallesCards;
                $details->content_id = $content->id;
                $details->cards_group = $data_cards;
                $details->save();
            }
        }

        // dd($last_activity, $activity);

        // dd($data, $request);
    }

    public function storeFiles(Request $request)
    {
        // dd($request);


        $data = json_decode($request->data, true);
        $unit = $request->unit;
        $file = $request->files;
        // dd($data);
        $ruta = "";

        foreach ($file as $key => $value) {

            if (explode("-", $key)[0] == "inputImage") {
                $ruta = "activity-cards";
            }
            if (explode("-", $key)[0] == "inputAudio") {
                $ruta = "activity-dictation";
            }

            if ($ruta != "") {
                foreach ($value as $keyFile => $valueFile) {
                    $id = explode("-", $key)[1];
                    // dump($valueFile);
                    $request->file($key)[$keyFile]->storeAs($ruta, $id . "-" . $keyFile . "-" . $valueFile->getClientOriginalName(), "public");
                    // dump($id . "-" . $keyFile . "-" . $valueFile->getClientOriginalName(), $ruta, explode("-", $key)[0]);
                }
            }

            $ruta = "";
        }

        // dd($request->files, $unit, $data);

        $activity = new Activity;
        $activity->name = $request->activity;
        $activity->unit_id = $unit; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
        $activity->save();

        // $activity = Activity::all()->last();

        foreach ($data as $key => $value) {

            // dd(json_encode(explode("-", $value['words'])));
            if ($value["type"] == 'words') {
                $content = new ContentOfAct;
                $content->unit_id = $unit; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                $content->activities()->attach($activity->id);

                $details = new DetallesWords;
                $details->content_id = $content->id;
                if ($value['mode'] != 'find-the-words') {
                    $details->text = $value['text_word'];
                }
                $details->words = json_encode(explode("-", $value['words']));
                $details->mode = $value['mode'];
                $details->save();
            }

            if ($value['type'] == 'cards') {
                $cards = $value['cards-images'];
                $data_cards = explode(',', $cards);
                foreach ($data_cards as $key => $value2) {
                    $data_cards[$key] = explode('/', $value2);
                }
                $data_cards = json_encode($data_cards);
                // dd($value);
                $content = new ContentOfAct;
                $content->unit_id = $unit; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!

                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                $content->activities()->attach($activity->id);

                $details = new DetallesCards;
                $details->content_id = $content->id;
                $details->cards_group = $data_cards;
                $details->save();
            }

            if ($value['type'] == 'dictation') {

                $data_audios = explode(',', $value['dictation-audio']);
                foreach ($data_audios as $key => $value2) {
                    $data_audios[$key] = explode('/', $value2);
                }
                $data_audios = json_encode($data_audios);

                $content = new ContentOfAct;
                $content->unit_id = $unit; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                $content->activities()->attach($activity->id);

                $details = new DetallesDictation;
                $details->content_id = $content->id;
                $details->dictation_group = $data_audios;
                $details->mode = $value['mode'];
                $details->save();
            }
        }

        // $activities = Activity::Where('status', '1')->get();
        // return view('activities.index', compact('activities'));
        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */

    // Activity $activity REVIEW *************************************************
    public function show($activity)
    {
        // dd($id);
        // return view('livewire.activity-create');
        return view('activities.show', compact('activity'));
    }

    public function show_activity($unit_id, $id)
    {
        // dd($id);
        // return view('livewire.activity-create');
        $activity = Activity::find($id);
        $activity_contents = $activity->contents;
        $detalles = [];

        foreach ($activity_contents as $key => $value) {
            $detalles[] = $value->detalles->first();
        }

        

        return view('course.module.unit.activity.show', compact('id', 'activity', 'detalles'), compact('activity_contents'));
    }

    public function edit_activity($id){
        // dd($id);
        // return view('livewire.activity-create');
        $activity = Activity::find($id);
        $activity_contents = $activity->contents;
        $detalles = [];

        foreach ($activity_contents as $key => $value) {
            $detalles[] = $value->detalles->first();
        }
        // dd($activity);
        return view('course.module.unit.activity.edit', compact('id', 'activity', 'detalles'), compact('activity_contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.                                    UPDATE
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activity)
    {
        //
        
        
        $data = json_decode($request->data, true);
        $unit = $request->unit;
        $file = $request->files;
        // dd($data);
        $ruta = "";
        
        foreach ($file as $key => $value) {
            
            if (explode("-", $key)[0] == "inputImage") {
                $ruta = "activity-cards";
            }
            if (explode("-", $key)[0] == "inputAudio") {
                $ruta = "activity-dictation";
            }
            
            if ($ruta != "") {
                foreach ($value as $keyFile => $valueFile) {
                    $id = explode("-", $key)[1];
                    // dump($valueFile);
                    $request->file($key)[$keyFile]->storeAs($ruta, $id . "-" . $keyFile . "-" . $valueFile->getClientOriginalName(), "public");
                    // dump($id . "-" . $keyFile . "-" . $valueFile->getClientOriginalName(), $ruta, explode("-", $key)[0]);
                }
            }
            
            $ruta = "";
        }
        
        // dd($request->files, $unit, $data);
        
        $activity = Activity::find($activity);
        $activity->name = $request->activity;
        $activity->unit_id = $unit; 
        $activity->save();
        
        // $activity = Activity::all()->last();

        
        foreach ($data as $key => $value) {
            // dd($value);
            // dd(json_encode(explode("-", $value['words'])));
            if ($value["type"] == 'words') {
                $content = ContentOfAct::find($value['id']);
                $content->unit_id = $unit; 
                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();
                
                // $content->activities()->attach($activity->id);
                
                $details = DetallesWords::Where('content_id', $value['id'])->get()->first();
                // $details->content_id = $content->id;
                if ($value['mode'] != 'find-the-words') {
                    $details->text = $value['text_word'];
                }
                $details->words = json_encode(explode("-", $value['words']));
                $details->mode = $value['mode'];
                $details->save();

                // dd($request, $activity, $value, $details);
            }
            
            if ($value['type'] == 'cards') {
                $cards = $value['cards-images'];
                $data_cards = explode(',', $cards);
                foreach ($data_cards as $key => $value2) {
                    $data_cards[$key] = explode('/', $value2);
                }
                $data_cards = json_encode($data_cards);
                // dd($value);
                $content = ContentOfAct::find($value['id']);
                $content->unit_id = $unit; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!

                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                // $content->activities()->attach($activity->id);

                $details = DetallesCards::Where('content_id', $value['id'])->get()->first();
                // $details->content_id = $content->id;
                $details->cards_group = $data_cards;
                $details->save();
            }

            if ($value['type'] == 'dictation') {

                $data_audios = explode(',', $value['dictation-audio']);
                foreach ($data_audios as $key => $value2) {
                    $data_audios[$key] = explode('/', $value2);
                }
                $data_audios = json_encode($data_audios);

                $content = ContentOfAct::find($value['id']);
                $content->unit_id = $unit; //RECORDAR CAMBIAR A UN SELECT CON TODAS LAS UNIDADES!!
                $content->titulo = $value["activity_name"];
                $content->type = $value["type"];
                $content->save();

                // $content->activities()->attach($activity->id);

                $details = DetallesDictation::Where('content_id', $value['id'])->get()->first();
                // $details->content_id = $content->id;
                $details->dictation_group = $data_audios;
                $details->mode = $value['mode'];
                $details->save();
            }
        }

        // $activities = Activity::Where('status', '1')->get();
        // return view('activities.index', compact('activities'));
        return redirect()->route('activities.index');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
        // $act = Activity::find($activity)->first();
        // dd($act);
        // $act->status = '0';
        // $act->save();
        // dd($activity);
        $activity->status = '0';
        $activity->save();

        $activities = Activity::all()->where('status', '=', '1');
        return redirect()->back();

    }
}
