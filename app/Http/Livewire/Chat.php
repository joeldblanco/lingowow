<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Chat extends Component
{

    public $conversations = [];
    public $last_messages = [];
    // public $participants = [];
    public $conversation_id = 0;
    public $participant;
    public $text_message;
    public $search;
    public $friends;
    public $show_id = null;
    public $conversation;

    public function mount($participant_id = null, $conversation_id = null)
    {
        if ($this->show_id != null) {
            $this->showConversation($this->show_id);
        }

        if ($conversation_id != null) {
            $this->showConversation($conversation_id);
        }

        if ($participant_id != null) {
            $this->showConversationByParticipant($participant_id);
        }
    }

    public function showConversationByParticipant($participant_id)
    {
        $this->show_id = null;

        $conversations = auth()->user()->conversations;
        foreach ($conversations as $conversation) {
            if (!$conversation->group_conversation) {
                foreach ($conversation->users as $user) {
                    if ($user->id == $participant_id) {
                        $this->show_id = $conversation->id;
                    }
                }
            }
        }

        $this->showConversation($this->show_id);
    }

    //LIVEWIRE FUNCTION FOR GETTING LARAVEL ECHO LISTENERS//
    public function getListeners()
    {
        $user_id = auth()->user()->id;
        return [
            "echo-notification:App.Models.User.{$user_id},notification" => 'render',
        ];
    }

    //FUNCTION FOR SHOWING SELECTED CONVERSATION (TRIGGERED WHEN A CONVERSATION IS CLICKED ON VIEW)//
    public function showConversation($id)
    {
        //SELECT CONVERSATION THAT MATCHES CONVERSATION ID IN DATABASE AND STORES IT IN CONVERSATION VARIABLE//
        $this->conversation = Conversation::find($id);

        //STORES CONVERSATION ID IN CONVERSATION ID VARIABLE//
        $this->conversation_id = $id;

        //SCROLLING TO VIEW//
        $this->emit("scrollIntoView");
    }

    //FUNCTION FOR SENDING MESSAGES (TRIGGERED WHEN 'SEND' BUTTON IS CLICKED)//
    public function send_message()
    {
        //DELETES ALL EMPTY SPACES IN MESSAGE TEXT//
        $message = preg_replace('/\s+/', '', $this->text_message);

        //VERIFIES IS MESSAGE LENGTH IS GREATER THAN ZERO AFTER DELETING ALL EMPTY SPACES//
        if (strlen($message) > 0) {

            //SELECT CONVERSATION THAT MATCHES CONVERSATION ID IN DATABASE AND STORES IT IN CONVERSATION VARIABLE//
            $this->conversation = Conversation::find($this->conversation_id);

            //VERIFIES IF CONVERSATION DOESN'T EXISTS OR IS DIFFERENT TO 'NULL'//
            if (!$this->conversation) {

                //CREATES NEW CONVERSATION AND STORES IT IN CONVERSATION VARIABLE//
                $this->conversation = Conversation::create();

                //STORES RECENTLY CREATED CONVERSATION ID IN CONVERSATION ID VARIABLE//
                $this->conversation_id = $this->conversation->id;

                //STORES CURRENT USER'S ID AND PARTICIPANT'S ID IN INTERMEDIATE TABLE (ELOQUENT MANY-TO-MANY RELATIONSHIP'S ATTACH METHOD)//
                $this->conversation->users()->attach([auth()->id(), $this->participant->id]);
            }

            //CREATES NEW MESSAGE AND ATTACHES IT TO THE CONVERSATION//
            $this->conversation->messages()->create([
                'user_id' => auth()->id(),
                'message_content' => $this->text_message,
                'message_type' => 1,
            ]);

            //SENDS NEW MESSAGE NOTIFICATION TO PARTICIPANT//
            Notification::send($this->users_notifications, new \App\Notifications\NewMessage());
            $this->text_message = "";

            $this->showConversation($this->conversation_id);
        }
    }

    public function getUsersNotificationsProperty()
    {
        return $this->conversation ? $this->conversation->users->where('id', '!=', auth()->id()) : [];
    }

    public function getMessagesProperty()
    {
        return $this->conversation ? $this->conversation->messages : [];
    }

    public function selectParticipant($participant_id)
    {
        $this->participant = User::find($participant_id);
    }

    public function updatedTextMessage($value)
    {
        if ($value && $this->conversation) {
            Notification::send($this->users_notifications, new \App\Notifications\UserTyping($this->conversation->id));
        }
    }

    public function render()
    {
        $user = User::find(auth()->id());
        $this->friends = $user->friends();
        $this->conversations = $user->conversations;
        $this->conversations_id = [];

        if ($this->conversation) {
            $this->conversation->messages()->where('user_id', '!=', auth()->id())->where('read', null)->update([
                'read' => now()
            ]);
            Notification::send($this->users_notifications, new \App\Notifications\MessageRead());
        }

        return view('livewire.chat');
    }
}
