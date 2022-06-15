<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email', 'seller@seller.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = 'Seller';
            $user->username = 'seller';
            $user->role_name = 'Seller';
            $user->email = 'seller@seller.com';
            $user->password = Hash::make('12345678');
            $permissions = ['seller.dashboard', 'seller.profile', 'seller.post'];
            $roles = 'Seller';
            $role_r = Role::where('name', '=', $roles)->firstOrFail();
            $role_r->givePermissionTo($permissions);
            $user->assignRole($role_r);
            $user->save();
        }
    }
}
