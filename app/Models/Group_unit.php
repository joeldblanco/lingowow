<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\TextUI\XmlConfiguration\Group;

class Group_unit extends Model
{
    use HasFactory;

    protected $table = 'group_units';

    /**
     * Get the Module that owns the module.
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    /**
     * Get the units for the group.
     */
    public function units()
    {
        return $this->hasMany(Unit::class, 'group_id');
    }

    /**
     * Get the exams for the group of units.
     */
    public function exams()
    {
        return $this->hasMany(Exam::class, 'group_id');
    }


    public function isPassed($id_user,$id_group){
        // $user = User::find($id);
        $unit_priority = null;
        if(Group_unit::find($id_group)->priority == 'FIRST'){
            $unit_priority = Group_unit::find($id_group);
        }else{
            $unit_priority = Group_unit::find(Group_unit::find($id_group)->priority);
        }
        
        // dd($unit_priority);
        return $unit_priority->belongsToMany(User::class,'evaluation_unit','group_id','user_id')->wherePivot('user_id',$id_user)->as('pivot')->withPivot('nota');
    }

}
