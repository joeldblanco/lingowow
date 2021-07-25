<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PayPalPaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchedulingCalendarController;
use App\Http\Livewire\CartComponent;
use App\Invoice;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'role:guest'])->get('/courses', function () {
    return view('courses');
})->name('courses');

Route::middleware(['auth:sanctum', 'verified'])->get('/pages', function () {
    return view('pages');
})->name('pages');

Route::middleware(['auth:sanctum', 'verified'])->get('/shop', [PayPalPaymentController::class,'getIndex'])->name('shop');

Route::middleware(['auth:sanctum', 'verified'])->get('/cart', function(){
    return view('cart');
})->name("cart");

Route::middleware(['auth:sanctum', 'verified'])->get('/invoices', function(){
    $invoices = Invoice::all()->where('user_id',auth()->id());
    return view('components.invoices-component',compact('invoices'));
})->name("invoices");

Route::middleware(['auth:sanctum', 'verified'])->post('/schedule', [SchedulingCalendarController::class,'checkForTeachers'])->name("schedule.check");

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');


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

Route::middleware(['auth:sanctum', 'verified'])->get('/classroom', [ClassroomController::class,'openRoom'])->name("classroom");

//ROUTES FOR PROCESSING PAYMENTS (PAYPAL)//

Route::middleware(['auth:sanctum', 'verified'])->get('/payment/ec-checkout', [PayPalPaymentController::class,'getExpressCheckout'])->name("checkout");
Route::middleware(['auth:sanctum', 'verified'])->get('/payment/ec-checkout-success', [PayPalPaymentController::class,'getExpressCheckoutSuccess'])->name("checkout-success");
Route::middleware(['auth:sanctum', 'verified'])->get('/payment/adaptive-pay', [PayPalPaymentController::class,'getAdaptivePay'])->name("adpative-payment");
Route::middleware(['auth:sanctum', 'verified'])->post('/payment/notify', [PayPalPaymentController::class,'notify'])->name("notify");