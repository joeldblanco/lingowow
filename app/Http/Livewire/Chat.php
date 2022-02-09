<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chat extends Component
{
    public $conversations = [];
    public $last_messages = [];
    public $participants = [];
    public $messages;
    public $conversation_id;
    public $participant;
    public $text_message;
    public $search;
    public $friends;
    public $show_id;

    public function mount()
    {
        $this->messages = DB::table('messages')
                        ->where('sender_id',auth()->id())
                        ->orWhere('receiver_id',auth()->id())
                        ->first();

        // foreach ($this->messages as $key => $value) {
        //     array_push($this->conversations,$value->conversation_id);
        // }

        if(($this->messages != null) AND isset($this->messages)){
            $this->conversation_id = $this->messages->conversation_id;
        }

        $friends = null;

        if(isset($friends)){
            $this->friends = DB::table('friend_requests')
                            ->where('receiver_id',auth()->id())
                            ->where('status',1)
                            ->select('sender_id')
                            ->union($friends)
                            ->get();

            foreach($this->friends as $key => $value){
                if(isset($this->friends[$key]->receiver_id)){
                    $this->friends[$key] = User::find($this->friends[$key]->receiver_id);
                }else if(isset($this->friends[$key]->sender_id)){
                    $this->friends[$key] = User::find($this->friends[$key]->sender_id);
                }
            }
        }
    }

    public function showConversation($id)
    {
        if(isset($this->show_id)){
            dd($this->messages);
            $this->conversation_id = $this->show_id;
        }else{
            $this->conversation_id = $id;
        }
    }

    public function send_message()
    {
        $message = preg_replace('/\s+/', '', $this->text_message);

        if(strlen($message) > 0){
            if($this->conversation_id == null)
            {
                $conversation = DB::table('conversations')
                    ->insertGetId([
                        'status' => 1
                    ]);

                $this->conversation_id = $conversation;
            }

            DB::table('messages')
                ->insert([
                    'conversation_id' => $this->conversation_id,
                    'sender_id' => auth()->id(),
                    'receiver_id' => $this->participant->id,
                    'message_content' => $this->text_message,
                    'message_type' => 1,
                    'status' => 1
                ]);
                $this->text_message = "";
                
        }else{
            dd('Impossible!');
        }
    }

    public function selectParticipant($participant_id)
    {
        $this->participant = User::find($participant_id);
    }

    public function render()
    {
        $conversations = DB::table('messages')
                        ->where('sender_id',auth()->id())
                        ->orWhere('receiver_id',auth()->id())
                        ->get();

        if(isset($conversations)){
            foreach ($conversations as $conversation) {
                array_push($this->conversations,$conversation->conversation_id);
            }
            $this->conversations = array_values(array_unique($this->conversations));
        }

        if(isset($this->show_id) AND (in_array($this->show_id,$this->conversations))){
            $this->conversation_id = $this->show_id;
        }

        $this->messages = DB::table('messages')
                        ->where('conversation_id',$this->conversation_id)
                        ->where('status',1)
                        ->get();
        
        foreach ($this->conversations as $conversation_id) {
            $message = DB::table('messages')->where('conversation_id',$conversation_id)->first();
            $this->last_messages[$conversation_id] = DB::table('messages')->where('conversation_id',$conversation_id)->orderBy('id','desc')->first();

            if($message->sender_id == auth()->id()){
                $this->participants[$conversation_id] = $message->receiver_id;
            }else{
                $this->participants[$conversation_id] = $message->sender_id;
            }
        }

        foreach ($this->participants as $key => $value) {
            $this->participants[$key] = User::find($value);
        }

        if((count($this->participants) > 0) AND ($this->conversation_id != null)){
            $this->participant = $this->participants[$this->conversation_id];
        }

        $this->friends = DB::table('friend_requests')
                        ->where('sender_id',auth()->id())
                        ->orWhere('receiver_id',auth()->id())
                        ->where('status',1)
                        ->get();

        if(isset($this->friends)){
            foreach ($this->friends as $key => $value) {
                if($value->sender_id == auth()->id())
                {
                    $this->friends[$key] = $value->receiver_id;
                }else{
                    $this->friends[$key] = $value->sender_id;
                }
            }

            $this->friends = User::find($this->friends);
        }

        return view('livewire.chat');
    }
}
