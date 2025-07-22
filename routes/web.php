<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourOneController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TourController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Tour Detail Pages
Route::get('/tour-packages/{slug}', [HomeController::class, 'show'])->name('tour-packages.show');
// Route::get('/tour-detail-one/{title}', [TourOneController::class, 'show'])->name('tour-detail-one');
Route::get('/tour-detail-two/{slug}', [TourController::class, 'showDetailTwo'])->name('tour-detail-two');


// Listing Layouts
Route::get('/grid', [HomeController::class, 'grid']);
Route::get('/grid-left-sidebar', [HomeController::class, 'gridLeftSidebar']);
Route::get('/grid-right-sidebar', [HomeController::class, 'gridRightSidebar']);
Route::get('/list', [HomeController::class, 'list']);
Route::get('/list-left-sidebar', [HomeController::class, 'listLeftSidebar']);
Route::get('/list-right-sidebar', [HomeController::class, 'listRightSidebar']);

// Optional Static Tour Detail Pages (if still used)
Route::get('/tour-detail-one', [HomeController::class, 'tourDetailOne']);
Route::get('/tour-detail-two', [HomeController::class, 'tourDetailTwo']);

// Blog Routes
Route::get('/blogs', [HomeController::class, 'blogs']);
Route::get('/blog-standard', [HomeController::class, 'blogStandard']);
Route::get('/blog-detail', [HomeController::class, 'blogDetail']);
Route::get('/blog-detail/{title}', [BlogController::class, 'show'])->name('blog-detail');

// Contact
Route::get('/contactus', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contactus', [ContactController::class, 'send'])->name('contact.send');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Auth Pages
Route::get('/signup', [HomeController::class, 'signup']);
Route::get('/signup-success', [HomeController::class, 'signupSuccess']);
Route::get('/forgot-password', [HomeController::class, 'forgotPassword']);
Route::get('/lock-screen', [HomeController::class, 'lockScreen']);

// User Profile Pages
Route::get('/user-profile', [HomeController::class, 'userProfile']);
Route::get('/user-billing', [HomeController::class, 'userBilling']);
Route::get('/user-payment', [HomeController::class, 'userPayment']);
Route::get('/user-invoice', [HomeController::class, 'userInvoice']);
Route::get('/user-social', [HomeController::class, 'userSocial']);
Route::get('/user-notification', [HomeController::class, 'userNotification']);
Route::get('/user-setting', [HomeController::class, 'userSetting']);

// Legal Pages
Route::get('/terms', [HomeController::class, 'terms']);
Route::get('/privacy', [HomeController::class, 'privacy']);

// Utility Pages
Route::get('/comingsoon', [HomeController::class, 'comingsoon']);
Route::get('/maintenance', [HomeController::class, 'maintenance']);
Route::get('/404', [HomeController::class, 'NotFound']);

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
    Route::get('/page', [AdminHomeController::class, 'sample'])->name('sample-page');

    Route::resource('slides', SlideController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('tour-packages', TourController::class);
});
