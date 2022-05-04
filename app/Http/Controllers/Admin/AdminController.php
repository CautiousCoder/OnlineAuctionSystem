<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    public function dologin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:15'
        ],[
            'email.exists' => 'This email is not register to our system.'
        ]);
        $check = $request->only('email','password');
        if(Auth::guard('admin')->attempt($check)){
            return redirect()->route('admin.dashboard')->with('success', 'Welcome to Dashboard.');
        }else {
            return redirect()->back()->with('error', 'Log In Failed.');
        }
    }

    public function dologout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
