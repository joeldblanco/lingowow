<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friend extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'friend_requests';

    protected $fillable = [
        'user_id',
        'friend_id',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    // public function Sender()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
