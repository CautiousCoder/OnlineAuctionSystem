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


Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('guest:web')->group(function(){
        Route::view('/login', 'backend.user.login')->name('login');
        Route::view('/register', 'backend.user.register')->name('register');
        Route::post('/store', [UserController::class, 'dostore'])->name('store');
        Route::post('/login', [UserController::class, 'dologin'])->name('dologin');
    });
    Route::middleware('auth:web')->group(function(){
        Route::view('/dashboard', 'backend.user.dashboard')->name('dashboard');
        Route::post('/logout', [UserController::class, 'dologout'])->name('dologout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
        //Route::post('/store', [AdminController::class, 'store'])->name('store');
        //Admin Login
        Route::post('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login/submit', [AdminLoginController::class, 'login'])->name('login.submit');
    });
    Route::middleware('auth:admin')->group(function(){
        //Admin Dashboard
        Route::view('/dashboard', 'backend.admin.dashboard')->name('dashboard');

        //Admin Logout
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout.submit');

        //Admin Reset Password
        Route::post('/password/reste', [AdminResetPasswordController::class, 'showResetForm'])->name('password.request');
        Route::post('/password/reset/submit', [AdminResetPasswordController::class, 'resetPassword'])->name('password.update');
   
        //
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
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
