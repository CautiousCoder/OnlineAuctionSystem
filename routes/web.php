<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\Auth\AdminLoginController;
use App\Http\Controllers\BackEnd\Auth\AdminResetPasswordController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    return view('backend.pages.admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');


Route::prefix('users/admins')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        //Route::post('/store', [AdminController::class, 'store'])->name('store');
        //Admin Login
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login/submit', [AdminLoginController::class, 'login'])->name('login.submit');

        //Admin Reset Password
        Route::get('/password/reste', [AdminResetPasswordController::class, 'showResetForm'])->name('password.request');
        Route::post('/password/reset/submit', [AdminResetPasswordController::class, 'resetPassword'])->name('password.update');
    });
    Route::middleware('auth:admin')->group(function () {
        //Admin Dashboard
        Route::view('/dashboard', 'backend.pages.admin.dashboard')->name('dashboard');

        //Admin Logout
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout.submit');


        //Resource Route
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
        Route::resource('admin', AdminController::class);
    });
});



// Route::get('/', function () {
//     return view('backend.admin.starter');
// });



// Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('front_page');

// Route::get('send-mail', function () {

//     $details = [
//         'title' => 'Mail from Online Web Tutor',
//         'body' => 'Test mail sent by Laravel 9 using SMTP.'
//     ];

//     Mail::to('zahidul.cse.brur@gmail.com')->send(new mailTemplate($details));

//     dd("Email is Sent, please check your inbox.");
//   });
Route::get('send-mail', [MailController::class, 'index']);

//route for seller
Route::prefix('users/seller')->name('seller.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::get('/register', [RegisterController::class, 'sellerregister'])->name('sellerregister');
        Route::get('/login', [LoginController::class, 'sellerloginshow'])->name('sellerloginshow');
        Route::post('/store', [RegisterController::class, 'sellerstore'])->name('register');
        Route::post('/login/submit', [LoginController::class, 'sellerloginsubmit'])->name('login');
    });
    Route::middleware(['role:Seller', 'auth:web'])->group(function () {
        Route::view('/dashboard', 'backend.pages.user.sellerDashboard')->name('sellerDashboard');
        Route::post('/logout', [LoginController::class, 'sellerlogout'])->name('sellerlogout');
        Route::get('/home', [FrontEndController::class, 'views'])->name('home');

        //profile
        Route::get('/profile', [UserController::class, 'profileview'])->name('profileviews');
        Route::get('/profile/edit', [UserController::class, 'editprofile'])->name('editprofile');
        Route::post('/update/profile', [UserController::class, 'storeprofile'])->name('storeprofile');

        //create product
        Route::resource('category', CategoryController::class);
        Route::resource('tag', TagController::class);
        Route::resource('post', PostController::class);
    });
});


//route for Buyer
Route::prefix('users/buyer')->name('buyer.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::get('/register', [RegisterController::class, 'buyerregister'])->name('buyerregister');
        Route::get('/login', [LoginController::class, 'buyerloginshow'])->name('buyerloginshow');
        Route::post('/store', [RegisterController::class, 'buyerstore'])->name('register');
        Route::post('/login/submit', [LoginController::class, 'buyerloginsubmit'])->name('login');
    });
    Route::middleware(['role:Buyer', 'auth:web'])->group(function () {
        Route::view('/dashboard', 'backend.pages.user.buyerDashboard')->name('buyerDashboard');
        Route::post('/logout', [LoginController::class, 'buyerlogout'])->name('buyerlogout');
        Route::get('/home', [FrontEndController::class, 'views'])->name('home');
        Route::get('/profile', [UserController::class, 'profileviews'])->name('profileviews');
        Route::get('/profile/edit', [UserController::class, 'editprofile'])->name('editprofile');
    });
});
