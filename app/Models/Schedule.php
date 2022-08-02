<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'selected_schedule', 'deleted_at', 'enrolment_id'];

    // FUNCION PARA RETORNAR EL HORARIO DE LA UNIVERSIDAD
    public static function university_schedule()
    {

        // $U_S = DB::table("roles")->where('name', 'admin')
        //     ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
        //     ->join('users', 'users.id', '=', 'model_has_roles.model_id')
        //     ->join('schedules', 'schedules.user_id', '=', 'users.id')
        //     ->select('schedules.selected_schedule')->first();

        $U_S = User::whereHas("roles", function ($role) {
            $role->where("name", "admin");
        })->first();
        $U_S = $U_S->schedules->first();
        $U_S = json_decode($U_S->selected_schedule);
        $start = $U_S[0];
        $end = $U_S[1];
        $hours = 0;

        if ($end <= $start) {
            $hours = ((24 - $start) + $end) + 1;
            array_push($U_S, $hours);
        } else {
            $hours = ($end - $start) + 1;
            array_push($U_S, $hours);
        }

        return $U_S;
    }
}
