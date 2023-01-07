<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'topic',
        'host_id',
        'atendee_id',
        // 'meeting_url',
        'join_url',
        'start_date'
    ];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function atendee()
    {
        return $this->belongsTo(User::class, 'atendee_id');
    }

    public function zoom_id()
    {
        $zoom_id = explode('/',$this->join_url);
        return end($zoom_id);
    }

    /**
     * Get the phone associated with the user.
     */
    public function class()
    {
        return $this->hasOne(Classes::class);
    }
}
