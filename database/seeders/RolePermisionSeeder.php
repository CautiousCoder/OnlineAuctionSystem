<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleUser = Role::create(['name' => 'GuestUser']);
        $roleEditor = Role::create(['name' => 'Editor']);

        $permissions = [
            //Admin permission
            'admin.create',
            'admin.edit',
            'admin.show',
            'admin.delete',

            //user permission
            'user.create',
            'user.edit',
            'user.show',
            'user.delete',
            
            //editor permission
            'editor.create',
            'editor.edit',
            'editor.show',
            'editor.delete',
        ];

        //create and asign permission

        for ($i=0; $i < count($permissions); $i++) { 
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleAdmin->givePermissionTo($permission);
            $permission->assignRole($roleAdmin);
        }

    }
}
