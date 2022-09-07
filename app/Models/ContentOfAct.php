<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOfAct extends Model
{
    protected $table = 'content_of_act';
    use HasFactory;

    public function detalles()
    {
        // dd($this->type);
        if ($this->type == "words") {
            return $this->hasMany(DetallesWords::class,'content_id');
        }
        

    }
}
