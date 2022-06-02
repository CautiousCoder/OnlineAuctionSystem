<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $guard_name = 'web';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Find permission group name
    public static function getPermissionNames()
    {
        $permission_group = DB::table('permissions')->select('group_name as name') // after use name
        ->groupBy('group_name')->get();

        return $permission_group;
    }
    //find permission under a group name
    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')->select('name', 'id')->where('group_name', $group_name)->get();
        return $permissions;

    }

    //check all permissions are checked or not under a group
    public static function groupPermission($role, $permissions){
        $haspermission = true;
        foreach($permissions as $p){
            if (!$role->hasPermissionTo($p->name)) {
                $haspermission = false;
                return $haspermission;
            }
        }
        return $haspermission;
    }

}
