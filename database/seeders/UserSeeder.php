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

        $buyeruser = User::where('email', 'buyer@buyer.com')->first();
        if (is_null($buyeruser)) {
            $buser = new User();
            $buser->name = 'Buyer';
            $buser->username = 'buyer';
            $buser->role_name = 'Buyer';
            $buser->email = 'buyer@buyer.com';
            $buser->password = Hash::make('12345678');
            $permissions = ['buyer.dashboard', 'buyer.profile', 'buyer.post'];
            $roles = 'Buyer';
            $role_r = Role::where('name', '=', $roles)->firstOrFail();
            $role_r->givePermissionTo($permissions);
            $buser->assignRole($role_r);
            $buser->save();
        }
    }
}
