<?php

use App\Http\Controllers\AnalyticsController;
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
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\Admin\Users\UsersTable;
use App\Models\User;
use App\Notifications\BookedClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
    return view('welcome');
});



Route::middleware(['web', 'auth', 'verified', 'impersonate'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Route::middleware(['role:guest'])->get('/courses', function () {
    //     return view('courses');
    // })->name('courses');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::middleware(['role:student|teacher|admin'])->get('/courses/{num}/{num2}/{num3}', [CoursesController::class, "show_unit"])->name('courses.unit');
    Route::middleware(['role:student|teacher|admin'])->get('/courses/{num}/{num2}', [CoursesController::class, "show_module"])->name('courses.module');
    Route::middleware(['role:student|teacher|admin'])->get('/courses/{num}', [CoursesController::class, "show_course"])->name('courses.course');
    Route::middleware(['role:student|teacher|admin'])->get('/courses', [CoursesController::class, "index"])->name('courses.index');

    Route::get('/pages', function () {
        return view('pages');
    })->name('pages');

    Route::middleware(['role:guest|student|admin'])->get('/shop', [PayPalPaymentController::class,'getIndex'])->name('shop');
    Route::middleware(['role:guest|student|admin'])->get('/shop/cart', function(){
        return view('cart');
    })->name("cart");

    //ROUTES FOR INVOICES//  
    Route::middleware(['role:student|admin'])->get('/shop/invoices', [InvoiceController::class,'index'])->name("invoices");
    Route::middleware(['role:student|admin'])->get('/shop/invoice/{id}', [InvoiceController::class,'show'])->name('invoice.show');

    //ROUTES FOR SCHEDULE//
    Route::post('/schedule/check', [SchedulingCalendarController::class,'checkForTeachers'])->name("schedule.check");
    Route::middleware('checkPreviousUrlName:shop|schedule.check,shop')->get('/schedule/selection', [SchedulingCalendarController::class,'create'])->name("schedule.create");
    Route::post('/schedule/update', [SchedulingCalendarController::class,'update'])->name("schedule.update");
    Route::get('/schedule/destroy/{student_id}/{course_id}', [SchedulingCalendarController::class,'destroy'])->name("schedule.destroy");

    //ROUTES FOR EXAMS//
    Route::get('/exam/{id}', [ExamController::class,'display'])->name('exam.display');

    Route::middleware(['role:admin'])->group(function(){        

        //ROUTES FOR ADMINISTRATION//
        Route::get('/admin/dashboard', [AnalyticsController::class,'index'])->name('admin.dashboard');
        Route::get('/admin/users', [UsersController::class,'index'])->name('admin.users');
        Route::get('/admin/invoices', [InvoiceController::class,'adminIndex'])->name('admin.invoices');
        Route::get('/admin/coupons', [CouponController::class,'index'])->name("coupons.index");
        Route::get('/admin/coupons/create/{product_id}/{coupon_amount}', [CouponController::class,'store'])->name("coupons.create");
        // Route::get('/admin/marketing', [CouponController::class,'index'])->name('admin.marketing');

        //ROUTE FOR TESTING MAILS//
        Route::get('/mail/test', function(){
            $admin = User::find(6);
            $student = User::find(5);
            Notification::sendNow($admin, new BookedClass($student));
        })->name('mail.test');

        //ROUTES FOR EXAMS//
        Route::get('/admin/exam', [ExamController::class,'index'])->name('exam.index');
        Route::get('/admin/exam/store', [ExamController::class,'store'])->name('exam.store');
        Route::get('/admin/exam/show/{id}', [ExamController::class,'show'])->name('exam.show');
        Route::post('/admin/exam/edit/{id}', [ExamController::class,'edit'])->name('exam.edit');
        //ROUTES FOR QUESTIONS//
        Route::post('/admin/exam/{id}/question/store', [QuestionController::class,'store'])->name('question.store');
        Route::get('/admin/exam/{exam_id}/question/show/{question_id}', [QuestionController::class,'show'])->name('question.show');
        Route::get('/admin/exam/{exam_id}/question/edit/{question_id}', [QuestionController::class,'edit'])->name('question.edit');
        Route::get('/admin/exam/{exam_id}/question/update/{question_id}', [QuestionController::class,'update'])->name('question.update');


        //ROUTES FOR IMPERSONATION//
        Route::get('/users/impersonate/{id}', [UsersController::class,'impersonate'])->name('impersonate');
    });

    Route::get('/users/stop-impersonation', [UsersController::class,'stopImpersonation'])->name('stopImpersonation');

    //ROUTES FOR CLASSES//
    Route::get('/classes', [ClassController::class,'index'])->name('classes.index');


    //CLASSROOMS//
    Route::get('/classroom/{id}', [ClassroomController::class,'openRoom'])->name("classroom");

    
    //ROUTES FOR PROCESSING PAYMENTS (PAYPAL)//
    Route::get('/payment/ec-checkout', [PayPalPaymentController::class,'getExpressCheckout'])->name("checkout");
    Route::get('/payment/ec-checkout-success', [PayPalPaymentController::class,'getExpressCheckoutSuccess'])->name("checkout-success");
    Route::get('/payment/adaptive-pay', [PayPalPaymentController::class,'getAdaptivePay'])->name("adpative-payment");
    Route::post('/payment/notify', [PayPalPaymentController::class,'notify'])->name("notify");


    //ROUTES FOR NOTIFICATIONS//
    Route::get('/notifications', [NotificationsController::class,'index'])->name('notifications.index');
    Route::get('/notifications/{id}',[NotificationsController::class,'show'])->name('notifications.show');

    //ROUTES FOR NOTIFICATIONS//
    Route::get('/chat', [ChatController::class,'index'])->name('chat.index');
    Route::get('/chat/{num}', [ChatController::class,'show'])->name('chat.show');


    //ROUTES FOR PROFILE//
    // Route::get('/profile', function () {
    //     // Only verified users may access this route...
    // });

    Route::get('/profile/{id}', [ProfileController::class,'show'])->name("profile.show");

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
