<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preselection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'preselection';

    protected $casts = [
        'schedule' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['schedule', 'deleted_at', 'enrolment_id', 'teacher_id'];

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }
}
