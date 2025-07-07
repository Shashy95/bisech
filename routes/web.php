<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourOneController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/index-two', [HomeController::class, 'indexTwo']);
Route::get('/index-three', [HomeController::class, 'indexThree']);
Route::get('/index-four', [HomeController::class, 'indexFour']);
Route::get('/index-five', [HomeController::class, 'indexFive']);

Route::get('/grid', [HomeController::class, 'grid']);
Route::get('/grid-left-sidebar', [HomeController::class, 'gridLeftSidebar']);
Route::get('/grid-right-sidebar', [HomeController::class, 'gridRightSidebar']);

Route::get('/list', [HomeController::class, 'list']);
Route::get('/list-left-sidebar', [HomeController::class, 'listLeftSidebar']);
Route::get('/list-right-sidebar', [HomeController::class, 'listRightSidebar']);

Route::get('/tour-detail-one', [HomeController::class, 'tourDetailOne']);
Route::get('/tour-detail-one/{title}', [TourOneController::class, 'show'])->name('tour-detail-one');

Route::get('/tour-detail-two', [HomeController::class, 'tourDetailTwo']);

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('about');

Route::get('/user-profile', [HomeController::class, 'userProfile']);
Route::get('/user-billing', [HomeController::class, 'userBilling']);
Route::get('/user-payment', [HomeController::class, 'userPayment']);
Route::get('/user-invoice', [HomeController::class, 'userInvoice']);
Route::get('/user-social', [HomeController::class, 'userSocial']);
Route::get('/user-notification', [HomeController::class, 'userNotification']);
Route::get('/user-setting', [HomeController::class, 'userSetting']);

Route::get('/helpcenter', [HomeController::class, 'helpcenter']);
Route::get('/helpcenter-faqs', [HomeController::class, 'helpcenterFaqs']);
Route::get('/helpcenter-guides', [HomeController::class, 'helpcenterGuides']);
Route::get('/helpcenter-support', [HomeController::class, 'helpcenterSupport']);

Route::get('/signup', [HomeController::class, 'signup']);
Route::get('/signup-success', [HomeController::class, 'signupSuccess']);
Route::get('/forgot-password', [HomeController::class, 'forgotPassword']);
Route::get('/lock-screen', [HomeController::class, 'lockScreen']);

Route::get('/terms', [HomeController::class, 'terms']);
Route::get('/privacy', [HomeController::class, 'privacy']);

Route::get('/comingsoon', [HomeController::class, 'comingsoon']);
Route::get('/maintenance', [HomeController::class, 'maintenance']);
Route::get('/404', [HomeController::class, 'NotFound']);

Route::get('/blogs', [HomeController::class, 'blogs']);
Route::get('/blog-standard', [HomeController::class, 'blogStandard']);

Route::get('/blog-detail', [HomeController::class, 'blogDetail']);
Route::get('/blog-detail/{title}', [BlogController::class, 'show'])->name('blog-detail');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/contactus', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contactus', [ContactController::class, 'send'])->name('contact.send');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
     Route::get('/page', [AdminHomeController::class, 'sample'])->name('admin.sample-page');

});