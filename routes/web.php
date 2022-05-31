<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\Auth\AdminLoginController;
use App\Http\Controllers\BackEnd\Auth\AdminResetPasswordController;
use App\Http\Controllers\MailController;

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
Route::get('/dashboard', function () {
    return view('backend.pages.admin.dashboard');
})->middleware(['auth:admin','verified'])->name('dashboard');


// Route::prefix('user')->name('user.')->group(function(){
//     Route::middleware('guest:web')->group(function(){
//         Route::view('/login', 'backend.user.login')->name('login');
//         Route::view('/register', 'backend.user.register')->name('register');
//         Route::post('/store', [UserController::class, 'dostore'])->name('store');
//         Route::post('/login', [UserController::class, 'dologin'])->name('dologin');
//     });
//     Route::middleware('auth:web')->group(function(){
//         Route::view('/dashboard', 'backend.user.buyerDashboard')->name('dashboard');
//         Route::post('/logout', [UserController::class, 'dologout'])->name('dologout');
//     });
// });

Route::prefix('users/admins')->name('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
        //Route::post('/store', [AdminController::class, 'store'])->name('store');
        //Admin Login
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login/submit', [AdminLoginController::class, 'login'])->name('login.submit');

        //Admin Reset Password
        Route::get('/password/reste', [AdminResetPasswordController::class, 'showResetForm'])->name('password.request');
        Route::post('/password/reset/submit', [AdminResetPasswordController::class, 'resetPassword'])->name('password.update');
   
    });
    Route::middleware('auth:admin')->group(function(){
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

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('send-mail', function () {
   
//     $details = [
//         'title' => 'Mail from Online Web Tutor',
//         'body' => 'Test mail sent by Laravel 9 using SMTP.'
//     ];
   
//     Mail::to('zahidul.cse.brur@gmail.com')->send(new mailTemplate($details));
   
//     dd("Email is Sent, please check your inbox.");
//   });
Route::get('send-mail', [MailController::class, 'index']);
