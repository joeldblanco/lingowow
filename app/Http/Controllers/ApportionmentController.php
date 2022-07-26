<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApportionmentController extends Controller
{

    public static function calculateApportionment($plan)
    {
        $plan = json_decode($plan);
        $schedule = json_decode(session('user_schedule'));
        $course_id = session("selected_course");
        $product = Course::find($course_id)->products->first();

        $today = Carbon::now()->setTimezone('America/Lima');
        $today->addDays(1);

        $current_period_start = new Carbon('first monday of this month');
        $current_period_end = (new Carbon('first monday of this month'))->addDays(6);
        $current_period_end->addWeeks(3);

        $next_period_start = new Carbon('first monday of next month');
        $next_period_end = (new Carbon('first monday of next month'))->addDays(6);
        $next_period_end->addWeeks(3);

        foreach ($schedule as $key => $value) {
            $schedule[$key][0] = (int)$value[0];
            $schedule[$key][1] = (int)$value[1];
        }

        $qty = 0;
        $days = [];
        foreach ($schedule as $key => $value) {
            $day = $value[1];
            $time = $value[0];
            $qty += $today->diffInDaysFiltered(function (Carbon $date) use (&$day, &$time, &$days) {
                if ($date->isDayOfWeek($day)) {
                    $date->hour = $time;
                    $date->minute = 0;
                    $date->second = 0;
                    array_push($days, $date->toDateTimeString());
                }
                // if($date->isDayOfWeek($day)) array_push($days,get_class_methods($date));
                return $date->isDayOfWeek($day);
            }, $current_period_end);
        }

        if ($qty <= 0) {
            $qty = 0;
            $days = [];
            foreach ($schedule as $key => $value) {
                $day = $value[1];
                $time = $value[0];
                $qty += $next_period_start->diffInDaysFiltered(function (Carbon $date) use (&$day, &$time, &$days) {
                    if ($date->isDayOfWeek($day)) {
                        $date->hour = $time;
                        $date->minute = 0;
                        $date->second = 0;
                        array_push($days, $date->toDateTimeString());
                    }
                    // if($date->isDayOfWeek($day)) array_push($days,get_class_methods($date));
                    return $date->isDayOfWeek($day);
                }, $next_period_end);
            }
        }

        $teacher_id = session('teacher_id');

        $teacher_classes = User::find($teacher_id)->teacherClasses;

        // dd($days, $teacher_id, $teacher_classes);

        //CONSULTA DE CLASES REAGENDADAS EN EL PERIODO ACTUAL PARA RESTAR AL COBRO

        $current_period = ApportionmentController::currentPeriod();
        $period_start_c = new Carbon($current_period[0]);
        $period_end_c = new Carbon($current_period[1]);

        $abcense = Classes::select("start_date")
            ->where("status", "1")
            ->whereBetween("start_date", [$period_start_c->subDay()->toDateTimeString(), $period_end_c->toDateTimeString()])
            ->get();

        if ($abcense != null) {
            foreach ($abcense as $key => $value) {
                $abcense[$key] = $value->start_date;
            }
            $abcense = json_decode($abcense);
        } else {
            $abcense = [];
        }

        $days_diff = array_diff($days, $abcense);
        $days_diff = array_values($days_diff);

        $qty_diff = sizeof($days_diff);

        //dd($days_diff, $qty_diff);

        return [$qty_diff, $days_diff];
    }

    public static function currentPeriod()
    {
        $first_monday = new Carbon('first monday of this month');
        if ($first_monday < Carbon::now()) {
            $current_period_start = new Carbon('first monday of this month');
            $current_period_end = (new Carbon('first monday of this month'))->addDays(5);
            $current_period_end->addWeeks(3);
            $current_period_end->addDays(1);
        } else {
            $current_period_start = new Carbon('first monday of last month');
            $current_period_end = (new Carbon('first monday of last month'))->addDays(5);
            $current_period_end->addWeeks(3);
            $current_period_end->addDays(1);
        }

        return [$current_period_start->toDateTimeString(), $current_period_end->toDateTimeString()];
    }

    public static function getPeriod($class)
    {

        $period = CarbonPeriod::between('2022-01-03', now()->addYear())->addFilter(function ($date) {
            return $date->is('first monday of this month');
        });

        $class = new Carbon($class);

        foreach ($period as $key => $date) {
            if ($date <= $class) {
                $class_period = $date->format("F Y");
            }
        }

        return $class_period;
    }
}
