<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //show login form
    public function sellerloginshow(){
        return view('auth.login');
    }

     //login function
     public function sellerloginsubmit(Request $request){
        // validate data

        $this->validate($request,[
            'email' => 'required|email|max:100',
            'password' => 'required|max:16|min:8',
        ],[
            'email.required' => 'Please enter an email address.',
            'password.required' => 'Please enter a current password.',
        ]);

        //attemp to login
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication passed...
            Session()->flash('success', 'LogIn Successfully.!');
            return redirect()->intended(route('seller.dashboard'));
        }else{
            Session()->flash('error', 'LogIn Failed.! Please Correct Email and Password.');
            return back();
        }
    }

    //logout
    public function sellerlogout(){
        Auth::guard('web')->logout();
        return redirect()->route('seller.sellerloginshow');
    }
}
