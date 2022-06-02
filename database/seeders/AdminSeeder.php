<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Admin::where('email','admin@admin.com')->first();
        if(is_null($admin)){
            $admin = new Admin();
            $admin->name = 'Admin';
            $admin->username = 'adminadmin';
            $admin->role_name = 'super_admin';
            $admin->email = 'admin@admin.com';
            $admin->phone = '01734567876';
            $admin->assignRole('SupperAdmin');
            $admin->password = Hash::make('12345678');
            $admin->save();
        }
    }
}
