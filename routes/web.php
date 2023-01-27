<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AttemptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatwootController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PayPalPaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingCalendarController;
use App\Http\Livewire\CartComponent;
use App\Invoice;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\GatherController;
use App\Http\Controllers\GradingController;
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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Models\Attempt;
use App\Http\Controllers\UploadImages;
use App\Http\Controllers\WhatsAppController;
use App\Http\Livewire\ClassesComponent;
use App\Mail\InvoicePaid;
use App\Models\Enrolment;
use App\Models\Meeting;
use App\Models\Post;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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




//ROUTES FOR AUTHENTICATION//
Route::get('/', function () {
    return redirect()->route('login');
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

Route::middleware(['web', 'auth', 'verified', 'impersonate'])->group(function () {


    Route::get('/home', function () {
        return view('home');
    })->name('home');



    Route::get('chatwoot/createContact', [ChatwootController::class, 'createContact']);



    Route::post('/complete-tour', function (Request $request) {
        $query = DB::table('shepherd_users')->insertOrIgnore([
            ['tour_name' => $request->tourName, 'user_id' => auth()->user()->id]
        ]);
        return $query;
    })->name('complete-tour');




    Route::get('/dashboard', function () {
        if (auth()->user()->roles[0]->name == "admin") {
            return redirect()->route('admin.dashboard');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');




    //ROUTES FOR COURSES//
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::middleware(['role:admin'])->get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::middleware(['role:admin'])->post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::middleware(['role:admin'])->get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::middleware(['role:admin'])->patch('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::middleware(['role:admin'])->delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('courses/{id}/details', [CourseController::class, 'details'])->name('courses.details');




    //ROUTES FOR MODULES//
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::middleware(['role:admin'])->get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::middleware(['role:admin'])->post('/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::middleware(['role:admin'])->get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::middleware(['role:admin'])->patch('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::middleware(['role:admin'])->delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');

    Route::post('modules/sort', [ModuleController::class, 'sort'])->name('modules.sort');
    Route::get('modules/{module}/details', [ModuleController::class, 'details'])->name('modules.details');




    //ROUTES FOR UNITS//
    Route::get('/units', [UnitController::class, 'index'])->name('units.index');
    Route::middleware(['role:admin|teacher'])->get('/units/create', [UnitController::class, 'create'])->name('units.create');
    Route::middleware(['role:admin|teacher'])->post('/units', [UnitController::class, 'store'])->name('units.store');
    Route::get('/units/{unit}', [UnitController::class, 'show'])->name('units.show');
    Route::middleware(['role:admin|teacher'])->get('/units/{unit}/edit', [UnitController::class, 'edit'])->name('units.edit');
    Route::middleware(['role:admin|teacher'])->patch('/units/{unit}', [UnitController::class, 'update'])->name('units.update');
    Route::middleware(['role:admin'])->delete('/units/{id}', [UnitController::class, 'destroy'])->name('units.destroy');

    Route::post('units/sort', [UnitController::class, 'sort'])->name('units.sort');
    Route::get('/units/{unit}/details', [UnitController::class, "details"])->name('units.details');



    //ROUTES FOR CONTENTS//
    Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
    Route::middleware(['role:admin|teacher'])->get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
    Route::middleware(['role:admin|teacher'])->post('/contents', [ContentController::class, 'store'])->name('contents.store');
    Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');
    Route::middleware(['role:admin|teacher'])->get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
    Route::middleware(['role:admin|teacher'])->patch('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
    Route::middleware(['role:admin|teacher'])->delete('/contents/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');

    Route::post('contents/sort', [ContentController::class, 'sort'])->name('contents.sort');




    //ROUTES FOR ACTIVITY//
    Route::middleware(['role:student|teacher|admin'])->get('/unit/{id_unit}/activity/{id}', [ActivityController::class, 'show_activity'])->name('activity.show'); ///Cree, esta nueva
    Route::middleware(['role:teacher|admin'])->get('/activity/edit/{id}', [ActivityController::class, 'edit_activity'])->name('activity.edit'); ///Cree, esta nueva




    //ROUTES FOR SHOP//
    Route::middleware(['role:guest|student|admin'])->get('/shop', [PayPalPaymentController::class, 'getIndex'])->name('shop');
    Route::middleware(['role:guest|student|admin'])->get('/shop/cart', function () {
        return view('cart');
    })->name("cart");




    //ROUTES FOR INVOICES//
    Route::middleware(['role:guest|student|admin'])->get('/shop/invoices', [InvoiceController::class, 'index'])->name("invoices");
    Route::middleware(['role:guest|student|admin'])->get('/shop/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');




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




    //ROUTES FOR RECORDINGS//
    Route::get('/recordings', [MeetingController::class, 'getRecordings'])->name('recordings.index');




    //ROUTES FOR ADMINISTRATION//
    Route::middleware(['role:admin'])->group(function () {





        //ROUTES FOR GRADINGS//
        Route::resource('/gradings', GradingController::class);



        //ROUTES FOR PRODUCTS//
        Route::resource('/products', ProductController::class);





        //DASHBOARD//
        Route::get('/admin/dashboard', [AnalyticsController::class, 'index'])->name('admin.dashboard');





        //USERS//
        Route::get('/admin/users/{role}', [UsersController::class, 'index'])->name('users');
        Route::post('/admin/getUser/', [UsersController::class, 'getUser'])->name('getUser');





        //INVOICES//
        Route::get('/admin/invoices', [InvoiceController::class, 'adminIndex'])->name('admin.invoices');





        //EARNINGS//
        Route::get('/admin/earnings', [AnalyticsController::class, 'earnings'])->name('admin.earnings');




        //COUPONS//
        Route::get('/admin/coupons', [CouponController::class, 'index'])->name("coupons.index");
        Route::get('/admin/coupons/create/{product_id}/{coupon_amount}', [CouponController::class, 'store'])->name("coupons.create");
        // Route::get('/admin/marketing', [CouponController::class,'index'])->name('admin.marketing');




        //ROUTES FOR CATEGORIES//
        Route::resource('/categories', CategoryController::class);




        //ROUTES FOR FEATURES//
        Route::resource('/features', FeatureController::class);





        //ROUTE FOR TESTING MAILS//
        Route::get('/mail/test', function () {
            $admin = User::find(6);
            $student = User::find(5);
            Notification::sendNow($admin, new BookedClass($student));
        })->name('mail.test');




        //ROUTES FOR EXAMS//
        Route::resource('/admin/exam', ExamController::class);
        Route::get('/exam/{id}/details', [ExamController::class, "details"])->name('exam.details');




        //ROUTES FOR QUESTIONS//
        Route::resource('/questions', QuestionController::class);
        Route::post('/questions/import', [QuestionController::class, 'import'])->name('questions.import');




        //ROUTES FOR CLASSES//
        Route::get('/admin/classes', ClassesComponent::class)->name('admin.classes.index');




        //ROUTES FOR ACTIVITIES//
        Route::resource('/activities', ActivityController::class);
        // Route::get('/admin/activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
        // Route::post('/admin/activities', [ActivityController::class, 'store'])->name('admin.activities.store');
        // Route::get('activities/{id}', [ActivityController::class, 'show'])->name('admin.activities.show');
        Route::post('activities/store', [ActivityController::class, 'store'])->name('admin.activities.store');
        Route::post('activities/store/files', [ActivityController::class, 'storeFiles'])->name('admin.activities.storeFiles');
        Route::post('activities/update/{id}', [ActivityController::class, 'update'])->name('admin.activities.update');



        //ROUTES FOR WHATSAPP BUSINESS API//
        Route::post('/whatsapp/callback', [WhatsAppController::class, 'handleCallback']);


        //ROUTES FOR IMPERSONATION//
        Route::get('/users/impersonate/{id}', [UsersController::class, 'impersonate'])->name('impersonate');

        //ROUTES FOR MEETINGS//
        Route::resource('/meetings', MeetingController::class);

        //ROUTES FOR ENROLMENTS//
        Route::resource('enrolments', EnrolmentController::class);
        Route::post('enrolments/checkSchedule', [EnrolmentController::class, 'isScheduleNeeded'])->name('enrolments.checkSchedule');

        //USER RESET//
        Route::get('/reset/{users}', function (User ...$users) {
            foreach ($users as $user) {
                $role_id = $user->roles[0]->id;
                if ($user->roles[0]->name == 'student') {
                    $user->studentClasses->each(function ($class) {
                        // $deleted_class = $class->delete();
                        // dd($class);
                        if ($class->meeting != null) (new MeetingController)->destroy($class->meeting);
                        $class->delete();
                    });

                    if ($user->enrolments->count()) {
                        // $user->schedules->where('enrolment_id', $user->enrolments->first()->id)->first()->delete();
                        $user->enrolments->first()->delete();
                        if ($user->schedules->first() != null) {
                            $user->schedules->first()->next_schedule = null;
                            $user->schedules->first()->save();
                            $user->schedules->first()->delete();
                        }
                    }

                    $user->removeRole('student');
                    $user->assignRole('guest');
                }
            }
            return redirect()->route('users', $role_id);
        })->name('reset.user');

        //ROUTES FOR GLOBALS//
        Route::get('admin/globals', function () {
            $globals = DB::table('metadata')->get();
            return view('globals.index', compact('globals'));
        })->name("globals.index");
        Route::get('admin/globals/{key}/edit', function ($key) {
            $globals = DB::table('metadata')->where('key', $key)->first();
            return view('globals.edit', compact('globals'));
        })->name("globals.edit");

        Route::get('gather/get_guests_list', [GatherController::class, 'getGuestsList']);
        Route::get('gather/set_guests_list', [GatherController::class, 'setGuestsList']);

        Route::resource('api/paypal', PayPalController::class);

        Route::get('/admin/exam/result/{id}', [ExamController::class, 'correct'])->name('exam.result');
    });

    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('activities/{id}', [ActivityController::class, 'show'])->name('admin.activities.show');

    Route::get('/users/stop-impersonation', [UsersController::class, 'stopImpersonation'])->name('stopImpersonation');

    //ROUTES FOR CLASSES//
    Route::get('/classes', ClassesComponent::class)->name('classes.index');
    Route::get('/classes/{id}', [ClassController::class, 'edit'])->name('classes.edit');
    Route::post('/classes/update', [ClassController::class, 'update'])->name('classes.update');
    Route::post('/classes/check', [ClassController::class, 'checkClasses'])->name('classes.check');

    //ROUTES FOR POSTS//
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

    //CLASSROOMS//
    Route::get('/classroom/{id}', [ClassroomController::class, 'openRoom'])->name("classroom");

    //ROUTES FOR PROCESSING PAYMENTS (PAYPAL)//
    Route::get('/payment/ec-checkout', [PayPalPaymentController::class, 'getExpressCheckout'])->name("paypal-checkout");
    Route::get('/payment/ec-checkout-success', [PayPalPaymentController::class, 'getExpressCheckoutSuccess'])->name("checkout-success");
    Route::get('/payment/adaptive-pay', [PayPalPaymentController::class, 'getAdaptivePay'])->name("adpative-payment");
    Route::post('/payment/notify', [PayPalPaymentController::class, 'notify'])->name("notify");

    Route::get('/payment/gateway', [PaymentController::class, 'createButton'])->name("payments.gateway");
    Route::get('/payment/checkout', [PaymentController::class, 'checkout'])->name("payments.checkout");

    //ROUTES FOR NOTIFICATIONS//
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.show');

    //ROUTES FOR CHAT//
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'sendMessage'])->name('chat.message');
    Route::get('/chat/{num}', [ChatController::class, 'show'])->name('chat.show');

    //ROUTES FOR PROFILE//
    // Route::get('/profile', function () {
    //     // Only verified users may access this route...
    // });
    Route::resource('/profile', ProfileController::class);

    // Route::resource('/admin/enrolments', EnrolmentController::class);
});
