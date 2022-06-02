<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


     //show register form
     public function sellerregister(){
        return view('auth.register');
    }
    public function sellerloginsubmit(Request $request){
        // validate data

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|max:100',
            'username' => 'required|max:50|min:4|unique:users,username',
            'password' => 'required|max:16|min:8',
            'password_confirmation' => 'required|same:password',
        ],[
            'email.required' => 'Please enter an email address.',
            'password.required' => 'Please enter a current password.',
            'password_confirmation.same' => 'The Confirm Password and Password must match.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_name = 'Seller';

        //user profile image
        $user->image_name = 'image.jpg';
        //user role assign
        $userPermission = $user->givePermissionTo(['seller.dashboard','seller.edit']);
        $user->assignRole($userPermission);

        $data = $user->save();

        if($data){
            return redirect()->back()->with('success', 'Account created Successfully.');
        }else {
            return redirect()->back()->with('error', 'Account create Failed.');
        }

    }




    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'username' => ['required', 'string', 'max:255', 'unique:users,username'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
