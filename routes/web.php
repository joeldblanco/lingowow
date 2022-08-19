<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AttemptController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PayPalPaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingCalendarController;
use App\Http\Livewire\CartComponent;
use App\Invoice;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\Admin\Users\UsersTable;
use App\Models\User;
use App\Notifications\BookedClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\MeetingController;
use App\Models\Enrolment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware(['web', 'auth', 'verified', 'impersonate'])->group(function () {

    Route::get('/home', function () {
        return redirect('dashboard');

        //TO DELETE//
        return view('home');
    })->name('home');

    // Route::middleware(['role:guest'])->get('/courses', function () {
    //     return view('courses');
    // })->name('courses');

    Route::get('/dashboard', function () {
        if (auth()->user()->roles[0]->name == "admin") {
            return redirect()->route('admin.dashboard');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');

    // Route::get('/pages', function () {
    //     return view('pages');
    // })->name('pages');

    //ROUTES FOR COURSES//
    Route::middleware(['role:student|teacher|admin'])->get('/courses/{id}', [CourseController::class, "show"])->name('course.show');
    Route::middleware(['role:student|teacher|admin'])->get('/courses', [CourseController::class, "index"])->name('course.index');

    //ROUTES FOR MODULES//
    Route::middleware(['role:student|teacher|admin'])->get('/module/{id}', [ModuleController::class, "show"])->name('module.show');

    // //ROUTES FOR UNITS//
    Route::middleware(['role:student|teacher|admin'])->get('/unit/{id}', [UnitController::class, "show"])->name('unit.show');

    //ROUTES FOR SHOP//
    Route::middleware(['role:guest|student|admin'])->get('/shop', [PayPalPaymentController::class, 'getIndex'])->name('shop');
    Route::middleware(['role:guest|student|admin'])->get('/shop/cart', function () {
        return view('cart');
    })->name("cart");

    //ROUTES FOR INVOICES//
    Route::middleware(['role:student|admin'])->get('/shop/invoices', [InvoiceController::class, 'index'])->name("invoices");
    Route::middleware(['role:student|admin'])->get('/shop/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');

    //ROUTES FOR SCHEDULE//
    Route::post('/schedule/check', [SchedulingCalendarController::class, 'checkForTeachers'])->name("schedule.check");
    Route::middleware('checkPreviousUrlName:shop|schedule.check|schedule.create,shop')->get('/schedule/selection', [SchedulingCalendarController::class, 'create'])->name("schedule.create");
    Route::post('/schedule/update', [SchedulingCalendarController::class, 'update'])->name("schedule.update");
    Route::get('/schedule/destroy/{student_id}/{course_id}', [SchedulingCalendarController::class, 'destroy'])->name("schedule.destroy");

    //ROUTES FOR EXAMS//
    Route::get('/exam/{id}', [ExamController::class, 'display'])->name('exam.display');
    //ROUTES FOR ATTEMPTS//
    Route::get('/attempts/{user}', [AttemptController::class, 'index'])->name('attempt.index');
    Route::get('/attempt/{id}', [AttemptController::class, 'show'])->name('attempt.show');
    Route::get('/attempt/{attempt_id}/question/{question_id}', [AttemptController::class, 'show_question'])->name('attempt.show_question');

    //ROUTES FOR ADMINISTRATION//
    Route::middleware(['role:admin'])->group(function () {

        //DASHBOARD//
        Route::get('/admin/dashboard', [AnalyticsController::class, 'index'])->name('admin.dashboard');

        //USERS//
        Route::get('/admin/users/{role}', [UsersController::class, 'index'])->name('users');

        //INVOICES//
        Route::get('/admin/invoices', [InvoiceController::class, 'adminIndex'])->name('admin.invoices');

        //EARNINGS//
        Route::get('/admin/earnings', [AnalyticsController::class, 'destroy'])->name('admin.earnings');

        //COUPONS//
        Route::get('/admin/coupons', [CouponController::class, 'index'])->name("coupons.index");
        Route::get('/admin/coupons/create/{product_id}/{coupon_amount}', [CouponController::class, 'store'])->name("coupons.create");
        // Route::get('/admin/marketing', [CouponController::class,'index'])->name('admin.marketing');

        //ROUTE FOR TESTING MAILS//
        Route::get('/mail/test', function () {
            $admin = User::find(6);
            $student = User::find(5);
            Notification::sendNow($admin, new BookedClass($student));
        })->name('mail.test');

        //ROUTES FOR EXAMS//
        Route::get('/admin/exam', [ExamController::class, 'index'])->name('exam.index');
        Route::get('/admin/exam/store', [ExamController::class, 'store'])->name('exam.store');
        Route::get('/admin/exam/show/{id}', [ExamController::class, 'show'])->name('exam.show');
        Route::post('/admin/exam/edit/{id}', [ExamController::class, 'edit'])->name('exam.edit');

        //ROUTES FOR QUESTIONS//
        Route::post('/admin/exam/{id}/question/store', [QuestionController::class, 'store'])->name('question.store');
        Route::get('/admin/exam/{exam_id}/question/show/{question_id}', [QuestionController::class, 'show'])->name('question.show');
        Route::get('/admin/exam/{exam_id}/question/edit/{question_id}', [QuestionController::class, 'edit'])->name('question.edit');
        Route::get('/admin/exam/{exam_id}/question/delete/{question_id}', [QuestionController::class, 'destroy'])->name('question.destroy');
        Route::post('/admin/exam/{exam_id}/question/update/{question_id}', [QuestionController::class, 'update'])->name('question.update');
        Route::post('/admin/exam/question/import', [QuestionController::class, 'import'])->name('question.import');

        //ROUTES FOR UNITS//
        Route::get('/unit/{id}/details', [UnitController::class, "details"])->name('unit.details');
        Route::get('/exam/{id}/details', [ExamController::class, "details"])->name('exam.details');

        //ROUTES FOR CLASSES//
        Route::get('/admin/classes', [ClassController::class, 'index'])->name('admin.classes.index');

        //ROUTES FOR ACTIVITIES//
        Route::resource('/activities', ActivityController::class);
        // Route::get('/admin/activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
        // Route::post('/admin/activities', [ActivityController::class, 'store'])->name('admin.activities.store');
        // Route::get('/admin/activities/{id}', [ActivityController::class, 'show'])->name('admin.activities.show');
        // Route::get('/admin/activities/{id}/edit', [ActivityController::class, 'edit'])->name('admin.activities.edit');
        // Route::patch('/admin/activities/{id}', [ActivityController::class, 'update'])->name('admin.activities.update');
        // Route::post('/admin/activities/{id}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');

        //ROUTES FOR IMPERSONATION//
        Route::get('/users/impersonate/{id}', [UsersController::class, 'impersonate'])->name('impersonate');

        //ROUTES FOR MEETINGS//
        Route::resource('/meetings', MeetingController::class);

        //USER RESET//
        Route::get('/reset/{users}', function (User ...$users) {
            foreach ($users as $user) {

                $user->studentClasses->each(function ($class) {
                    $class->delete();
                });
                $user->schedules->where('enrolment_id', $user->enrolments->first()->id)->first()->delete();
                $user->enrolments->first()->delete();
                $user->removeRole('student');
                $user->assignRole('guest');
            }
            return redirect()->route('users', 4);
        });
    });

    Route::get('/admin/exam/result/{id}', [ExamController::class, 'correct'])->name('exam.result');

    Route::get('/users/stop-impersonation', [UsersController::class, 'stopImpersonation'])->name('stopImpersonation');

    //ROUTES FOR CLASSES//
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/{id}', [ClassController::class, 'edit'])->name('classes.edit');
    Route::post('/classes/update', [ClassController::class, 'update'])->name('classes.update');

    //ROUTES FOR POSTS//
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

    //CLASSROOMS//
    Route::get('/classroom/{id}', [ClassroomController::class, 'openRoom'])->name("classroom");

    //ROUTES FOR PROCESSING PAYMENTS (PAYPAL)//
    Route::get('/payment/ec-checkout', [PayPalPaymentController::class, 'getExpressCheckout'])->name("checkout");
    Route::get('/payment/ec-checkout-success', [PayPalPaymentController::class, 'getExpressCheckoutSuccess'])->name("checkout-success");
    Route::get('/payment/adaptive-pay', [PayPalPaymentController::class, 'getAdaptivePay'])->name("adpative-payment");
    Route::post('/payment/notify', [PayPalPaymentController::class, 'notify'])->name("notify");

    //ROUTES FOR NOTIFICATIONS//
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.show');

    //ROUTES FOR CHAT//
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{num}', [ChatController::class, 'show'])->name('chat.show');

    //ROUTES FOR PROFILE//
    // Route::get('/profile', function () {
    //     // Only verified users may access this route...
    // });
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name("profile.show");
});



//ROUTES FOR EMAIL VERIFICATION//
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
