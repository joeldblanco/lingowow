<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // try {
        //     $user = User::where('id',$id)->get();
        //     $user = $user[0];
        // } catch (\Throwable $th) {
        //     if($th->getMessage() == "Undefined array key 0"){
        //         return "User doesn't exist.";
        //     }
        // }

        return view('chat', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMessage(Request $request)
    {
        $message = $request->message;
        $conversation_id = null;

        $conversations = auth()->user()->conversations;
        foreach ($conversations as $conversation) {
            if (!$conversation->group_conversation) {
                foreach ($conversation->users as $user) {
                    if ($user->id == $request->friend_id) {
                        $conversation_id = $conversation->id;
                    }
                }
            }
        }

        //DELETES ALL EMPTY SPACES IN MESSAGE TEXT//
        $message = preg_replace('/\s+/', '', $message);

        //VERIFIES IS MESSAGE LENGTH IS GREATER THAN ZERO AFTER DELETING ALL EMPTY SPACES//
        if (strlen($message) > 0) {

            //SELECT CONVERSATION THAT MATCHES CONVERSATION ID IN DATABASE AND STORES IT IN CONVERSATION VARIABLE//
            $conversation = Conversation::find($conversation_id);

            //VERIFIES IF CONVERSATION DOESN'T EXISTS OR IS DIFFERENT TO 'NULL'//
            if (!$conversation) {

                //CREATES NEW CONVERSATION AND STORES IT IN CONVERSATION VARIABLE//
                $conversation = Conversation::create();

                //STORES RECENTLY CREATED CONVERSATION ID IN CONVERSATION ID VARIABLE//
                $conversation_id = $conversation->id;

                //STORES CURRENT USER'S ID AND PARTICIPANT'S ID IN INTERMEDIATE TABLE (ELOQUENT MANY-TO-MANY RELATIONSHIP'S ATTACH METHOD)//
                $conversation->users()->attach([auth()->id(), $request->friend_id]);
            }

            //CREATES NEW MESSAGE AND ATTACHES IT TO THE CONVERSATION//
            $conversation->messages()->create([
                'user_id' => auth()->id(),
                'message_content' => $message,
                'message_type' => 1,
            ]);

            return redirect()->route('chat.show', $conversation_id);
        }
    }
}
