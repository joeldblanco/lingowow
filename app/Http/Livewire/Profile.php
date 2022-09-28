<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;

class Profile extends Component
{
    public $user_id, $comment_content;

    //LIVEWIRE FUNCTION FOR GETTING LARAVEL ECHO LISTENERS//
    public function getListeners()
    {
        $user_id = auth()->user()->id;
        return [
            "echo-notification:App.Models.User.{$user_id},FriendRequest" => 'render',
        ];
    }

    public function confirmRequest($id)
    {
        $friend_request = Friend::find($id);
        $friend_request->status = 1;
        $friend_request->save();
    }

    public function deleteRequest($id)
    {
        $friend_request = Friend::find($id);
        $friend_request->status = 2;
        $friend_request->save();
    }

    public function sendRequest($id)
    {
        $friend_request = Friend::withTrashed()->where('friend_id', $id)->where('user_id', auth()->id())->first();

        if ($friend_request == null) {
            $friend_request = Friend::create([
                'user_id' => auth()->id(),
                'friend_id' => $id
            ]);
        } else if ($friend_request->trashed()) {
            $friend_request->restore();
        }

        $friend = User::find($id);

        Notification::send($friend, new \App\Notifications\FriendRequest(auth()->id(), $id));
    }

    public function cancelRequest($id)
    {
        $friend_request = Friend::withTrashed()->where('friend_id', $id)->where('user_id', auth()->id())->first();
        $friend_request->delete();

        $notifications = DB::table('notifications')
            ->where('type', 'App\Notifications\FriendRequest')
            ->where('data', 'like', '%"user_id":' . auth()->id() . '%')
            ->where('data', 'like', '%"friend_id":' . $id . '%')
            ->delete();
    }

    public function sendMessage($id)
    {
        $friend_request = Friend::withTrashed()->where('friend_id', $id)->where('user_id', auth()->id())->first();
        $friend_request->delete();
    }

    public function getPostsProperty()
    {
        return User::find($this->user_id)->posts->sortByDesc('created_at');
    }

    public function getSentRequestProperty()
    {
        return Friend::where('user_id', auth()->id())->where('friend_id', $this->user_id)->first();
    }

    public function getReceivedRequestProperty()
    {
        return Friend::where('user_id', $this->user_id)->where('friend_id', auth()->id())->first();
    }

    public function getFriendRequestsProperty()
    {
        return Friend::where('friend_id', $this->user_id)->where('status', 0)->get();
    }

    public function getFriendsProperty()
    {
        return User::find($this->user_id)->friends();
    }

    public function render()
    {
        $user = User::find($this->user_id);
        if ($user == null) {
            abort(404);
        }

        return view('livewire.profile', [
            'user' => $user
        ]);
    }
}
