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
        // $current_period = ApportionmentController::getPeriod('2023-06-15', true); //UNCOMMENT THIS TO CALCULATE THE PAYMENT FOR A SPECIFIC PERIOD 1/3
        $invoices = Invoice::where('created_at', '>=', Carbon::parse($current_period[0])->startOfMonth())->where('created_at', '<=', Carbon::parse($current_period[0])->endOfMonth())->get();
        $payment = [];
        $classes = [];
        $profit = [];
        $paypal_commissions = [];

        $paymentForRegularClass = json_decode(DB::table('metadata')->where('key', 'payment_per_class')->first()->value)->regular;
        $paymentForSpecialClass = json_decode(DB::table('metadata')->where('key', 'payment_per_class')->first()->value)->special;
        $paymentForPlacementTest = json_decode(DB::table('metadata')->where('key', 'payment_per_class')->first()->value)->placement_test;

        $guests = User::role('guest')->get();
        $students = User::role('student')->get();
        $teachers = User::role('teacher')->orderBy('first_name')->get();
        $admins = User::role('admin')->get();

        foreach ($teachers as $key => $value) {
            $enrolments = Enrolment::where('teacher_id', $value->id)->get();
            // $enrolments = Enrolment::withTrashed()->where('teacher_id', $value->id)->get(); //UNCOMMENT THIS TO CALCULATE THE PAYMENT FOR A SPECIFIC PERIOD 2/3

            foreach ($enrolments as $enrolment) {
                $monthly_classes = Classes::where('enrolment_id', $enrolment->id)->where('start_date', '>=', $current_period[0])->where('end_date', '<=', now())->count();
                // $monthly_classes = Classes::where('enrolment_id', $enrolment->id)->where('start_date', '>=', $current_period[0])->where('end_date', '<=', $current_period[1])->count(); //UNCOMMENT THIS TO CALCULATE THE PAYMENT FOR A SPECIFIC PERIOD 3/3

                $product = Course::find($enrolment->course_id)->products->first();
                if ($product->sale_price == NULL) {
                    $product_price = $product->regular_price;
                } else {
                    $product_price = $product->sale_price;
                }

                if (str_contains($product->slug, "english-regular")) {
                    $teacher_payment = $paymentForRegularClass;
                } else if (str_contains($product->slug, "english-conversational")) {
                    $teacher_payment = $paymentForSpecialClass;
                } else if (str_contains($product->slug, "spanish-regular")) {
                    $teacher_payment = $paymentForSpecialClass;
                } else if (str_contains($product->slug, "spanish-conversational")) {
                    $teacher_payment = $paymentForSpecialClass;
                } else if (str_contains($product->slug, "placement-test")) {
                    $teacher_payment = $paymentForPlacementTest;
                }

                if ($product->plans->pluck('slug')->contains(function ($slug) {
                    return str_contains($slug, 'single-payment');
                })) {
                    $classes[$value->id][] = $teacher_payment;
                    $profit[$value->id][] = $product_price;
                } else {
                    $classes[$value->id][] = ($monthly_classes * $teacher_payment);
                    $profit[$value->id][] = ($monthly_classes * $product_price);
                }
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

        $earningsByMonth = Invoice::all()->groupBy(function ($invoice) {
            return $invoice->created_at->format('M');
        });

        $earningsByMonth = $earningsByMonth->map(function ($month) {
            return $month->sum('price');
        });

        $months = Invoice::all()->pluck('created_at')->map(function ($invoice) {
            return $invoice->format('M');
        })->unique()->toArray();

        $total_exams = Exam::all()->count();

        $thisMonthEarnings = $invoices->groupBy(function ($invoice) {
            return $invoice->created_at->format('M');
        });

        $thisMonthEarnings = $thisMonthEarnings->map(function ($month) {
            return $month->sum('price');
        });

        $data = [
            'total_earnings' => $earningsByMonth->sum(),
            'this_month_earnings' => $thisMonthEarnings->sum(),
            'total_invoices' => $invoices->count(),
            'total_users' => User::count(),
            'total_guests' => $guests->count(),
            'total_students' => $students->count(),
            'total_teachers' => $teachers->count(),
            'total_admins' => $admins->count(),
            'invoices' => $invoices,
            'months' => $months,
            'months_total' => $earningsByMonth->toArray(),
            'teachers' => $teachers,
            'payment' => $payment,
            'total_payment' => $total_payment,
            'total_profit' => $total_profit,
            'aux_profit' => $aux_profit,
            'paypal_commissions' => $paypal_commissions,
            'total_paypal_commissions' => $total_paypal_commissions,
            'total_exams' => $total_exams,
        ];

        return view('admin.dashboard', compact('data',));
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
    public function earnings($period = null)
    {
        $teachers = User::role('teacher')->get();
        $synchronousCourses = Course::whereHas('categories', function ($query) {
            $query->where('name', 'synchronous');
        })->get();
        $courses = Course::all();
        $enrolments = Enrolment::all();

        if ($period == null) {
            $period = ApportionmentController::getPeriod(Carbon::now(), true);
        }

        $periodClasses = Classes::whereBetween('start_date', [$period[0], $period[1]])->get();

        $classes = Classes::all();
        $allPeriods = [];
        foreach (Classes::all() as $class) {
            $allPeriods[] = ApportionmentController::getPeriod($class->start_date, true)[0];
        }

        $allPeriods = array_values(array_unique($allPeriods));
        foreach ($allPeriods as $key => $value) {
            $allPeriods[$key] = (new Carbon($value))->isoFormat('MMMM Y');
        }

        return view('admin.analytics.earnings', compact('teachers', 'synchronousCourses', 'courses', 'enrolments', 'allPeriods', 'periodClasses', 'period'));
    }

    /**
     * Show the earnings.
     *
     * @return \Illuminate\Http\Response
     */
    public function earnings2(Request $request)
    {
        $period = $request->period;

        $teachers = User::role('teacher')->orderBy('first_name')->get();

        if (empty($period)) {
            $period = ApportionmentController::getPeriod(Carbon::now(), true);
        } else {
            $period = ApportionmentController::getPeriod($period, true);
        }

        $classes = [];
        foreach ($teachers as $teacher)
            foreach ($teacher->teacherClassesWithTrashedParents->whereBetween('start_date', $period) as $class) {
                $classes[$class->enrolment_id][] = $class;
            }

        $groupedClasses = collect($classes);

        return view('admin.analytics.earnings2', compact('groupedClasses', 'period'));
    }

    /**
     * Show the earnings.
     *
     * @return \Illuminate\Http\Response
     */
    public function periodEarnings(Request $request)
    {
        $period = ClassController::getClassesByPeriod($request->month);

        return $this->earnings($period);
    }

    /**
     * Show the earnings by teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacherEarnings(Request $request)
    {
        $period = $request->period;
        $id = $request->teacher_id;

        if (auth()->user()->hasRole('teacher') && empty($id)) {
            $id = auth()->user()->id;
        }

        if (auth()->user()->hasRole('teacher') && $id != auth()->user()->id) {
            return abort(403, 'Unauthorized action.');
        }

        $teachers = User::role('teacher')->orderBy('first_name')->get();

        if (empty($period)) {
            $period = ApportionmentController::getPeriod(Carbon::now(), true);
        } else {
            $period = ApportionmentController::getPeriod($period, true);
        }

        if (empty($id)) {
            $id = $teachers->first()->id;
        }

        $teacher = User::find($id);
        $classes = [];
        foreach ($teacher->teacherClassesWithTrashedParents->whereBetween('start_date', $period) as $class) {
            $classes[$class->enrolment_id][] = $class;
        }

        $groupedClasses = collect($classes);

        return view('admin.analytics.teacherEarnings', compact('teacher', 'groupedClasses', 'teachers', 'period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerTeachersPayment(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|numeric|exists:App\Models\User,id',
            'supporting_document' => 'required|file|mimes:pdf|max:2048',
            'agreement_checkbox' => 'required',
        ]);

        dd($request);
    }
}
