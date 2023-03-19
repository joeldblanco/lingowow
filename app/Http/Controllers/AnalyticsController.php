<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_period = ApportionmentController::currentPeriod();
        $invoices = Invoice::all();
        // $invoices = Invoice::whereDate('created_at', '>=', $current_period[0])->whereDate('created_at', '<=', $current_period[1])->get();
        $total_earnings = 0;
        $total_invoices = count($invoices);
        $guests = [];
        $students = [];
        $teachers = [];
        $admins = [];
        $payment = [];
        $classes = [];
        $profit = [];
        $paypal_commissions = [];

        $model_roles = DB::table('model_has_roles')->select('role_id', 'model_id')->get();
        foreach ($model_roles as $model_role) {

            if ($model_role->role_id == 1) {
                $guests[] = $model_role->model_id;
            } else if ($model_role->role_id == 2) {
                $students[] = $model_role->model_id;
            } else if ($model_role->role_id == 3) {
                $teachers[] = $model_role->model_id;
            } else if ($model_role->role_id == 4) {
                $admins[] = $model_role->model_id;
            }
        }

        $total_guests = count($guests);
        $total_students = count($students);
        $total_teachers = count($teachers);
        $total_admins = count($admins);

        // $guests = User::find($guests);
        // $students = User::find($students);
        $teachers = User::find($teachers);
        // $admins = User::find($admins);

        // $current_period = ApportionmentController::currentPeriod();
        // dd('2022-01-06 12:00:00' >= $current_period[0],'2022-01-06 12:00:00' <= $current_period[1]);

        foreach ($teachers as $key => $value) {
            $enrolments = Enrolment::where('teacher_id', $value->id)->get();

            foreach ($enrolments as $enrolment) {
                // $monthly_classes = Classes::where('enrolment_id', $enrolment->id)->whereDate('start_date', '>=', $current_period[0])->where('teacher_check', 1)->where('student_check', 1)->count();
                $monthly_classes = Classes::where('enrolment_id', $enrolment->id)->whereDate('start_date', '>=', $current_period[0])->get()->pluck('rating')->whereNotNull()->count();
                $product = Course::find($enrolment->course_id)->products->first();
                if ($product->sale_price == NULL) {
                    $product_price = $product->regular_price;
                } else {
                    $product_price = $product->sale_price;
                }

                if (str_contains($product->slug, "english-regular")) {
                    $teacher_payment = 4.99;
                } else if (str_contains($product->slug, "english-conversational")) {
                    $teacher_payment = 6.99;
                } else if (str_contains($product->slug, "spanish-regular")) {
                    $teacher_payment = 6.99;
                } else if (str_contains($product->slug, "spanish-conversational")) {
                    $teacher_payment = 7.99;
                }

                $classes[$value->id][] = ($monthly_classes * $teacher_payment);
                $profit[$value->id][] = ($monthly_classes * $product_price);

                // dd($monthly_classes,$teacher_payment);

            }
        }

        $total_payment = 0;
        foreach ($classes as $key => $value) {

            $payment[$key] = 0;
            foreach ($value as $v_key => $v_value) {
                $payment[$key] += round($v_value, 2);
            }

            $payment[$key] = -$payment[$key];
            if ($payment[$key] != 0) {
                $paypal_comission = ((-0.3 + $payment[$key]) / (0.946)) - $payment[$key];
            } else {
                $paypal_comission = 0;
            };
            $payment[$key] = round($payment[$key] + $paypal_comission, 2);
            $paypal_commissions[$key] = round($paypal_comission, 2);

            $total_payment += $payment[$key];
        }

        $total_paypal_commissions = round(array_sum($paypal_commissions), 2);


        $aux_profit = [];
        $total_profit = 0;
        foreach ($profit as $key => $value) {
            $aux_profit[$key] = 0;
            foreach ($value as $v_key => $v_value) {
                $aux_profit[$key] += round($v_value, 2);
            }
            $aux_profit[$key] += $payment[$key];

            $total_profit += round($aux_profit[$key], 2);
        }


        // $total_classes = 0;
        // if (isset($data['classes'][$key]))
        //     foreach ($data['classes'][$key] as $classes) {
        //         $total_classes += count($classes);
        //     };

        $total_users = User::count();

        foreach ($invoices as $invoice) {
            $total_earnings += $invoice->price;
        }

        if (count($invoices)) $month = $invoices[0]->created_at->month;
        $month_total = 0;
        $months_total = [];
        $months = [];

        foreach ($invoices as $invoice) {
            if ($month != $invoice->created_at->month) {
                $month = $invoice->created_at->month;
                $month_total = 0;
            }

            array_push($months, (new Carbon($invoice->created_at))->isoFormat("MMM"));
            $month_total += $invoice->price;
            $months_total[$month] = $month_total;
        }

        $months = array_unique($months);

        $total_exams = Exam::all()->count();

        $data = [
            'total_earnings' => $total_earnings,
            'total_invoices' => $total_invoices,
            'total_users' => $total_users,
            'total_guests' => $total_guests,
            'total_students' => $total_students,
            'total_teachers' => $total_teachers,
            'total_admins' => $total_admins,
            'invoices' => $invoices,
            'months' => $months,
            'months_total' => $months_total,
            // 'guests' => $guests,
            // 'students' => $students,
            'teachers' => $teachers,
            // 'admins' => $admins,
            'payment' => $payment,
            'total_payment' => $total_payment,
            'total_profit' => $total_profit,
            'aux_profit' => $aux_profit,
            'paypal_commissions' => $paypal_commissions,
            'total_paypal_commissions' => $total_paypal_commissions,
            'total_exams' => $total_exams,
        ];

        return view('admin.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the earnings.
     *
     * @return \Illuminate\Http\Response
     */
    public function earnings()
    {
        //
    }
}
