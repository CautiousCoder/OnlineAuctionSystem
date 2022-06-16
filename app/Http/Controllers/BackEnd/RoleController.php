<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public $usr;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->usr = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.index'))) {
            abort(403, 'Unauthorized action.');
        }
        $roles = Role::orderBy('created_at', 'DESC')->where('guard_name', 'admin')->paginate(20);
        return view('backend.pages.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.create'))) {
            abort(403, 'Unauthorized action.');
        }
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
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.store'))) {
            abort(403, 'Unauthorized action.');
        }

        $this->validate($request, [
            'name' => 'required|max:100|unique:roles,name',
        ], [
            'name.required' => 'The Role name is required.',
            'name.unique' => 'Already exists this Role.',
        ]);

        $roleAdmin = Role::create(['guard_name' => 'admin', 'name' => $request->name]);
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
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.show'))) {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.edit'))) {
            abort(403, 'Unauthorized action.');
        }

        $role = Role::findById($id, 'admin');
        $all_permissions = Permission::all()->where('guard_name', 'admin');
        //dd($all_permissions);
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
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.uptate'))) {
            abort(403, 'Unauthorized action.');
        }

        $this->validate($request, [
            'name' => 'required|max:100|unique:roles,name,' . $id,
        ], [
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
        //checking whether you have permission or not to access this route
        if (is_null($this->usr || !$this->usr->can('role.delete'))) {
            abort(403, 'Unauthorized action.');
        }

        if ($id) {
            $role = Role::findById($id, 'admin');
            $role->delete();
        }
        Session()->flash('success', 'Role Deleted Successfully.!');
        return redirect()->back();
    }
}
