<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ],[
            'cpassword.required' => 'The Confirm Password field is required.',
            'cpassword.same' => 'The Confirm Password and Password must match.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $data = $user->save();

        if($data){
            return redirect()->back()->with('success', 'You have registered Successfully.');
        }else {
            return redirect()->back()->with('error', 'Registeration Failed.');
        }
        
    }

    public function dologin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:15'
        ],[
            'email.exists' => 'This email is not register to our system.'
        ]);
        $check = $request->only('email','password');
        if(Auth::guard('web')->attempt($check)){
            return redirect()->route('user.dashboard')->with('success', 'Welcome to Dashboard.');
        }else {
            return redirect()->back()->with('error', 'Log In Failed.');
        }
    }

    public function dologout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
