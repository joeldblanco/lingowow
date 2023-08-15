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

    public static function calculateApportionment($plan = null, $schedule = null, $course_id = null, $preselection = null)
    {
        // $plan = json_decode($plan);

        if (empty(session('student_id'))) {
            $user = auth()->user();
        } else {
            $user = User::find(session('student_id'));
        }

        if ($schedule == null) {
            $schedule = session("user_schedule");
        }
        $schedule = json_decode($schedule);

        if ($course_id == null) {
            $course_id = session("selected_course");
        }
        // $product = Course::find($course_id)->products->first();

        $today = Carbon::now()->setTimezone('UTC');
        $today->addDays(1);
        // if (auth()->user()->roles[0]->name == 'student' || auth()->user()->roles[0]->name == 'guest') {
        //     $today->addDays(1);
        // }

        $current_period = ApportionmentController::currentPeriod();
        $next_period = ApportionmentController::nextPeriod();

        // dd($current_period,$next_period);
        $current_period_start = new Carbon($current_period[0]);
        $current_period_end = new Carbon($current_period[1]);

        $next_period_start = new Carbon($next_period[0]);
        $next_period_end = new Carbon($next_period[1]);



        // $timezone = Carbon::now()->setTimezone($user->timezone);
        // $schedule_utc = [];
        // foreach ($schedule as $key => $value) {
        //     $date = Carbon::now();
        //     $date_local = Carbon::parse('Next ' . Carbon::now()->setISODate($date->year, $date->weekOfYear, $value[1])->format('l') . ' at ' . $value[0] . ':00');
        //     $schedule_utc[$key][0] = (int)$date_local->copy()->subHours($timezone->offsetHours)->hour;
        //     $schedule_utc[$key][1] = (int)$date_local->copy()->subHours($timezone->offsetHours)->dayOfWeek;
        // }        



        if (empty($preselection)) {
            $qty = 0;
            $days = [];
            foreach ($schedule as $key => $value) {
                $day = $value[1];
                $time = $value[0];
                $qty += $today->diffInDaysFiltered(function (Carbon $date) use (&$day, &$time, &$days, &$current_period_start) {
                    if ($date->isDayOfWeek($day) && $date->greaterThanOrEqualTo($current_period_start)) {
                        $date->hour = $time;
                        $date->minute = 0;
                        $date->second = 0;
                        array_push($days, $date->toDateTimeString());
                    }

                    return $date->isDayOfWeek($day);
                }, $current_period_end->copy()->addDay()); //It's necessary to add a day '->addDay()' to the end date to include the last day of the period
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
                    }, $next_period_end->copy()->addDay()); //It's necessary to add a day '->addDay()' to the end date to include the last day of the period
                }
            }

            //CONSULTA DE CLASES REAGENDADAS EN EL PERIODO ACTUAL PARA RESTAR AL COBRO


            $period_start_c = new Carbon($current_period[0]);
            $period_end_c = new Carbon($current_period[1]);

            $absence = User::find(session('teacher_id'))->teacherClasses()->where('status', 1)->whereBetween('start_date', [$today->toDateTimeString(), ApportionmentController::currentPeriod()[1]])->orderBy('start_date', 'asc')->get()->pluck('start_date');

            if ($absence != null) {
                foreach ($absence as $key => $start_date) {
                    $absence[$key] = $start_date;
                }
                $absence = json_decode($absence);
            } else {
                $absence = [];
            }

            $days_diff = array_diff($days, $absence);
            $days_diff = array_values($days_diff);

            $qty_diff = sizeof($days_diff);
        } else {

            $qty = 0;
            $days = [];
            $absence = [];
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
                }, $next_period_end->copy()->addDay()); //It's necessary to add a day '->addDay()' to the end date to include the last day of the period
            }

            $days_diff = array_diff($days, $absence);
            $days_diff = array_values($days_diff);

            $qty_diff = sizeof($days_diff);
        }

        return [$qty_diff, $days_diff, $days, $absence];
    }

    public static function currentPeriod($onlyDate = false)
    {
        // $first_monday = new Carbon('first monday of this month');
        // if ($first_monday < Carbon::now()) {
        //     $current_period_start = new Carbon('first monday of this month');
        //     $current_period_end = (new Carbon('first monday of this month'))->addDays(5);
        //     $current_period_end->addWeeks(3);
        //     $current_period_end->addDays(1);
        // } else {
        //     $current_period_start = new Carbon('first monday of last month');
        //     $current_period_end = (new Carbon('first monday of last month'))->addDays(5);
        //     $current_period_end->addWeeks(3);
        //     $current_period_end->addDays(1);
        // }

        // if ($onlyDate) return [$current_period_start->toDateString(), $current_period_end->toDateString()];

        // return [$current_period_start->toDateTimeString(), $current_period_end->toDateTimeString()];

        $current_period = DB::table("metadata")->where("key", "current_period")->first()->value;
        $current_period = array_values(json_decode($current_period, 1));
        // dd($current_period);
        return $current_period;
    }

    public static function nextPeriod($onlyDate = false)
    {
        $current_period = DB::table("metadata")->where("key", "current_period")->first()->value;
        $current_period = array_values(json_decode($current_period, 1));

        $start_period = new Carbon($current_period[0]);
        $end_period = new Carbon($current_period[1]);

        if ($start_period->month == $end_period->month) {
            $next_period_start = $start_period->copy()->addMonth()->firstOfMonth(Carbon::MONDAY);
            $next_period_end = $next_period_start->copy()->addDays(5);
            $next_period_end->addWeeks(3);
            $next_period_end->addDays(1);
        } else {
            $next_period_start = $end_period->copy()->firstOfMonth(Carbon::MONDAY);
            $next_period_end = $next_period_start->copy()->addDays(5);
            $next_period_end->addWeeks(3);
            $next_period_end->addDays(1);
        }
        // dd($next_period_start,$next_period_end, $start_period, $end_period);
        if ($onlyDate) return [$next_period_start->toDateString(), $next_period_end->toDateString()];
        return [$next_period_start->toDateTimeString(), $next_period_end->toDateTimeString()];
    }

    public static function previousPeriod($onlyDate = false)
    {
        $current_period = DB::table("metadata")->where("key", "current_period")->first()->value;
        $current_period = array_values(json_decode($current_period, 1));

        $start_period = new Carbon($current_period[0]);
        $end_period = new Carbon($current_period[1]);

        // if ($start_period->month == $end_period->month) {
        $previous_period_start = $start_period->copy()->subMonth()->startOfMonth()->next(Carbon::MONDAY);
        $previous_period_end = $previous_period_start->copy()->addDays(5);
        $previous_period_end->addWeeks(3);
        $previous_period_end->addDays(1);
        // } else {
        //     $previous_period_start = $end_period->copy()->firstOfMonth(Carbon::MONDAY);
        //     $previous_period_end = $previous_period_start->copy()->subDays(5);
        //     $previous_period_end->subWeeks(3);
        //     $previous_period_end->subDays(1);
        // }
        // dd($previous_period_start,$previous_period_end, $start_period, $end_period);
        if ($onlyDate) return [$previous_period_start->toDateString(), $previous_period_end->toDateString()];
        return [$previous_period_start->toDateTimeString(), $previous_period_end->toDateTimeString()];
    }

    public static function getPeriod($class, $extended = false)
    {

        if ($extended) {
            $today = new Carbon($class);
            $month = $today->isoFormat('MMMM G');
            $first_monday = new Carbon('first monday of ' . $month);
            if ($first_monday < Carbon::now()) {
                $period_start_date = new Carbon('first monday of ' . $month);
                $period_end_date = (new Carbon('first monday of ' . $month))->addDays(5);
                $period_end_date->addWeeks(3);
                $period_end_date->addDays(1);
            } else {
                $period_start_date = new Carbon('first monday of ' . $month);
                $period_end_date = (new Carbon('first monday of ' . $month))->addDays(5);
                $period_end_date->addWeeks(3);
                $period_end_date->addDays(1);
            }

            return [$period_start_date->toDateTimeString(), $period_end_date->toDateTimeString()];
        } else {
            $period = CarbonPeriod::between('2022-01-03', now()->addYear())->addFilter(function ($date) {
                return $date->is('first monday of this month');
            });

            $class = new Carbon($class);

            foreach ($period as $key => $date) {
                if ($date <= $class) {
                    $class_period = $date->format("F Y");
                }
            }
        }

        return $class_period;
    }

    public static function getWeekOfPeriod($date)
    {
        $period = static::getPeriod($date, true);
        $weekOfPeriod = now()->diffInWeeks(Carbon::createFromDate($period[0])) + 1;

        return $weekOfPeriod;
    }

    // public static function getPreviousPeriod($class, $extended = false){

    //     if($extended){
    //         $today = new Carbon($class);
    //         $month = $today->isoFormat('MMMM G');
    //         $first_monday = new Carbon('first monday of '.$month);
    //         if($first_monday < Carbon::now()){
    //             $current_period_start = new Carbon('first monday of this month');
    //             $current_period_end = (new Carbon('first monday of this month'))->addDays(5);
    //             $current_period_end->addWeeks(3);
    //             $current_period_end->addDays(1);
    //         }else{
    //             $current_period_start = new Carbon('first monday of last month');
    //             $current_period_end = (new Carbon('first monday of last month'))->addDays(5);
    //             $current_period_end->addWeeks(3);
    //             $current_period_end->addDays(1);
    //         }

    //         return [$current_period_start->toDateTimeString(),$current_period_end->toDateTimeString()];

    //     }else{
    //         $period = CarbonPeriod::between('2022-01-03', now()->addYear())->addFilter(function ($date) {
    //             return $date->is('first monday of this month');
    //         });

    //         $class = new Carbon($class);

    //         foreach ($period as $key => $date) {
    //             if($date <= $class){
    //                 $class_period = $date->format("F Y");
    //             }
    //         }
    //     }

    //     return $class_period;
    // }
}
