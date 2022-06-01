<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index(){
        //
        $admins = Admin::orderBy('created_at','DESC')->paginate(20);
        return view('backend.pages.admin.index', compact('admins'));
    }

    public function create(){
        //
        $roles = Role::all();
        return view('backend.pages.admin.create', compact('roles'));
    }
    //
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'username' => 'required|unique:admins,username',
            'phone' => 'nullable|max:15|min:8',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ],[
            'username.required' => 'Please Choose your UserName.',
            'username.unique' => 'Already Exists. Please try again.',
            'cpassword.required' => 'The Confirm Password field is required.',
            'cpassword.same' => 'The Confirm Password and Password must match.',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->role_name = $request->role_name;
        $admin->license_number = $request->license_number;
        $admin->nid_number = $request->nid_number;

        //user profile image
        $admin->image_name = 'image.jpg';

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        $data = $admin->save();

        if($data){
            return redirect()->back()->with('success', 'Admin created Successfully.');
        }else {
            return redirect()->back()->with('error', 'Admin created Failed.');
        }
        
    }

    public function edit(Admin $admin){
        $roles = Role::all();
        return view('backend.pages.admin.edit', compact(['admin','roles']));
    }

    public function update(Request $request, Admin $admin){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,'. $admin->id,
            'password' => 'nullable|min:6|max:15',
            'username' => 'required|unique:admins,username,'. $admin->id,
            'phone' => 'nullable|max:15|min:8',
            'cpassword' => 'nullable|same:password',
        ],[
            'username.required' => 'Please Choose your UserName.',
            'username.unique' => 'Already Exists. Please try again.',
            'cpassword.same' => 'The Confirm Password and Password must match.',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->role_name = $request->role_name;
        $admin->license_number = $request->license_number;
        $admin->nid_number = $request->nid_number;

        //user profile image
        $admin->image_name = 'image.jpg';

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        $data = $admin->save();

        if($data){
            return redirect()->back()->with('success', 'Admin created Successfully.');
        }else {
            return redirect()->back()->with('error', 'Admin created Failed.');
        }
    }

    public function destroy(Admin $admin){
        if($admin){
            $admin->delete();
        }
        Session()->flash('success', 'Admin Deleted Successfully.!');
        return redirect()->back();
    }

}
