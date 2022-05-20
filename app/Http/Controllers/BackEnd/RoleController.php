<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::orderBy('created_at','DESC')->paginate(20);
        return view('backend.pages.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $all_permissions = Permission::all();
        $permissions_group = User::getPermissionNames();
        return view('backend.pages.role.create', compact(['all_permissions', 'permissions_group']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:100|unique:roles,name',
        ],[
            'name.required' => 'The Role name is required.',
            'name.unique' => 'Already exists this Role.',
        ]);

        $roleAdmin = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');
        if ($permissions) {
            $roleAdmin->syncPermissions($permissions);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::findById($id, 'admin');
        $all_permissions = Permission::all();
        $permissions_group = User::getPermissionNames();
        return view('backend.pages.role.edit', compact(['role', 'all_permissions', 'permissions_group']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:100|unique:roles,name,'.$id,
        ],[
            'name.required' => 'The Role name is required.',
            'name.unique' => 'Already exists this Role.',
        ]);

        $role = Role::findById($id, 'admin');
        $permissions = $request->input('permissions');
        $role->name = $request->name;
        if ($permissions) {
            $role->syncPermissions($permissions);
        }
        $role->save();

        Session()->flash('success', 'Role Deleted Successfully.!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($id) {
            $role = Role::findById($id, 'admin');
            $role->delete();
        }
        Session()->flash('success', 'Role Deleted Successfully.!');
        return redirect()->back();
    }
}
