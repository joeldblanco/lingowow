<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityUser extends Model
{
    public $timestamps = false;
    protected $table = 'activity_user';
    use HasFactory;
}
