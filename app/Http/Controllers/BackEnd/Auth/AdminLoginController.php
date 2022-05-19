<?php

namespace App\Http\Controllers\BackEnd\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    //login function
    public function showLoginForm(){
        return view('backend.pages.auth.login');
    }

     //login function
     public function login(HttpRequest $request){
        // validate data

        $this->validate($request,[
            'email' => 'required|email|max:100',
            'password' => 'required',
        ],[
            'email.required' => 'Please enter an email address.',
            'password.required' => 'Please enter a current password.',
        ]);

        //attemp to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication passed...
            Session()->flash('success', 'LogIn Successfully.!');
            return redirect()->intended(route('admin.dashboard'));
        }else{
            Session()->flash('error', 'LogIn Failed.! Please Correct Email and Password.');
            return back();
        }
    }

    //logout
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
