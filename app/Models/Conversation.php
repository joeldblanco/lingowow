<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'group_conversation',
        'status'
    ];

    public function name(): Attribute
    {
        return new Attribute(
            get: function($value){
                if($this->group_conversation){
                    return $value;
                }

                $user = $this->users->where('id', '!=', auth()->id())->first();

                return $user->fisrt_name . $user->last_name;
            }
        );
    }

    public function image(): Attribute
    {
        return new Attribute(
            get: function(){
                if($this->group_conversation){
                    return Storage::url($this->image_url);//"profile-photos/default_group_pp.jpg";
                }

                $user = $this->users->where('id', '!=', auth()->id())->first();

                return $user->profile_photo_path;
            }
        );
    }

    public function unreadMessages($user_id = null): Attribute
    {
        if($user_id == null){
            $user_id = auth()->id();
        }

        return new Attribute(
            get: function() use($user_id){
                return $this->messages()->where('user_id', '!=', $user_id)->where('read', null)->count();
            }
        );
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function last_message()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
