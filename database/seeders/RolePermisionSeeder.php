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
            [
                'group_name' => 'Admin',
                'permission' => [
                    'admin.create',
                    'admin.edit',
                    'admin.show',
                    'admin.delete',
                ]
            ],
            

            //user permission
            [
                'group_name' => 'GuestUser',
                'permission' => [
                    'user.create',
                    'user.edit',
                    'user.show',
                    'user.delete',
                ]
            ],
            
            //editor permission
            [
                'group_name' => 'Editor',
                'permission' => [
                    'editor.create',
                    'editor.edit',
                    'editor.show',
                    'editor.delete',
                ]
            ],
        ];

        //create and asign permission

        for ($i=0; $i < count($permissions); $i++) { //All permission
            $groupPermission = $permissions[$i]['group_name']; //find group name
            for ($j=0; $j < count($permissions[$i]['permission']); $j++) { 
                $permission = Permission::create(['name' => $permissions[$i]['permission'][$j], 'group_name' => $groupPermission]);
                $roleAdmin->givePermissionTo($permission);
                $permission->assignRole($roleAdmin);
            }
        }

    }
}
