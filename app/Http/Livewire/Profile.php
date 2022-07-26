<?php

namespace App\Http\Livewire;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Profile extends Component
{
    public $user_id, $posts;

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
        $friend_request = Friend::withTrashed()->where('friend_id',$id)->where('user_id', auth()->id())->first();

        if ($friend_request == null) {
            $friend_request = Friend::create([
                'user_id' => auth()->id(),
                'friend_id' => $id
            ]);
        } else if ($friend_request->trashed()) {
            $friend_request->restore();
        }
    }

    public function cancelRequest($id)
    {
        $friend_request = Friend::withTrashed()->where('friend_id',$id)->where('user_id', auth()->id())->first();
        $friend_request->delete();
    }

    public function render()
    {
        $user = User::find($this->user_id);
        if ($user == null) {
            abort(404);
        }

        $friends = $user->friends();
        $friend_requests = Friend::where('friend_id',$this->user_id)->where('status', 0)->get();
        $this->posts = $user->posts;

        // dd($friends);

        $request_sent = Friend::where('user_id',auth()->id())->where('friend_id',$this->user_id)->first();
        // dd($friend_requests);

        return view('livewire.profile', [
            'friends' => $friends,
            'friend_requests' => $friend_requests,
            'user' => $user,
            'request_sent' => $request_sent,
        ]);
    }
}
