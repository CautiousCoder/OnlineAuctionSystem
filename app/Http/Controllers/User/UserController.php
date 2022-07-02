<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        //
        $users = User::orderBy('created_at', 'DESC')->paginate(20);
        return view('backend.pages.user.index', compact('users'));
    }

    public function profileview()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        return view('profile.sellerprofile', compact(['user']));
    }
    public function editprofile()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        return view('profile.editsellerprofile', compact('user'));
    }
    public function storeprofile(Request $request)
    {
        $user = User::find(Auth::guard('web')->user()->id);

        $user->name = $request->name;
        $user->profile()->phone = $request->phone;
        $user->profile()->designation = $request->designation;
        $user->profile()->bio = $request->bio;
        $user->profile()->road_num = $request->road_num;
        $user->profile()->city = $request->city;
        $user->profile()->state = $request->state;
        $user->profile()->country = $request->country;
        $user->profile()->zip_code = $request->zip_code;
        $user->profile()->license_number = $request->license_number;
        $user->profile()->nid_number = $request->nid_number;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/user/', $filename);
            $user->profile()->image = '/storage/user/' . $filename;
        }

        $user->save();
        return redirect()->route('seller.profileviews');
    }
    public function create()
    {
        //
        $roles = Role::all();
        return view('backend.pages.user.create', compact('roles'));
    }
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'phone' => 'nullable|max:15|min:8',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ], [
            'cpassword.required' => 'The Confirm Password field is required.',
            'username.unique' => 'Already Exists. Please try again.',
            'username.required' => 'The Username field is required.',
            'cpassword.same' => 'The Confirm Password and Password must match.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role_name = $request->role_name;
        $user->license_number = $request->license_number;
        $user->nid_number = $request->nid_number;

        //user profile image
        $user->image_name = 'image.jpg';

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $data = $user->save();

        if ($data) {
            return redirect()->back()->with('success', 'User created Successfully.');
        } else {
            return redirect()->back()->with('error', 'User created Failed.');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('backend.pages.user.edit', compact(['user', 'roles']));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|unique:users,email',
            'username' => 'nullable|unique:users,username',
            'phone' => 'nullable|max:15|min:8',
            'password' => 'nullable|min:6|max:15',
            'cpassword' => 'nullable|same:password',
        ], [
            'cpassword.same' => 'The Confirm Password and Password must match.'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_name = $request->role_name;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $data = $user->save();

        if ($data) {
            return redirect()->back()->with('success', 'User created Successfully.');
        } else {
            return redirect()->back()->with('error', 'User created Failed.');
        }
    }

    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
        }
        Session()->flash('success', 'User Deleted Successfully.!');
        return redirect()->back();
    }


    // user signin or register
    public function dostore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ], [
            'cpassword.required' => 'The Confirm Password field is required.',
            'cpassword.same' => 'The Confirm Password and Password must match.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $data = $user->save();

        if ($data) {
            return redirect()->back()->with('success', 'You have registered Successfully.');
        } else {
            return redirect()->back()->with('error', 'Registeration Failed.');
        }
    }

    public function dologin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:15'
        ], [
            'email.exists' => 'This email is not register to our system.'
        ]);
        $check = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($check)) {
            return redirect()->route('user.dashboard')->with('success', 'Welcome to Dashboard.');
        } else {
            return redirect()->back()->with('error', 'Log In Failed.');
        }
    }

    public function dologout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
