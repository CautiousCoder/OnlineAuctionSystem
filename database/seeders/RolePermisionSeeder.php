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
        $SuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'SupperAdmin']);
        $roleAdmin = Role::create(['guard_name' => 'admin', 'name' => 'Admin']);
        $roleUser = Role::create(['guard_name' => 'admin', 'name' => 'User']);
        $roleBuyer = Role::create(['guard_name' => 'admin', 'name' => 'Buyer']);
        $roleSeller = Role::create(['guard_name' => 'admin', 'name' => 'Seller']);

        $permissions = [
            
            //Admin permission
            [
                'group_name' => 'Admin',
                'permission' => [
                    'admin.index',
                    'admin.create',
                    'admin.edit',
                    'admin.show',
                    'admin.delete',
                    'admin.only',
                    'admin.dashboard',
                ]
            ],
            

            //user permission
            [
                'group_name' => 'User',
                'permission' => [
                    'user.index',
                    'user.create',
                    'user.edit',
                    'user.show',
                    'user.delete',
                    'user.dashboard',
                ]
            ],

            //role permission
            [
                'group_name' => 'Role',
                'permission' => [
                    'role.create',
                    'role.edit',
                    'role.show',
                    'role.delete',
                    'role.index',
                    'role.store',
                ]
            ],
            
            //buyer permission
            [
                'group_name' => 'Buyer',
                'permission' => [
                    'buyer.index',
                    'buyer.create',
                    'buyer.edit',
                    'buyer.show',
                    'buyer.delete',
                    'buyer.dashboard',
                ]
            ],
            //seller permission
            [
                'group_name' => 'Seller',
                'permission' => [
                    'seller.index',
                    'seller.create',
                    'seller.edit',
                    'seller.show',
                    'seller.delete',
                    'seller.dashboard',
                ]
            ],
        ];

        //create and asign permission

        for ($i=0; $i < count($permissions); $i++) { //All permission
            $groupPermission = $permissions[$i]['group_name']; //find group name
            for ($j=0; $j < count($permissions[$i]['permission']); $j++) { 
                $permission = Permission::create(['guard_name' => 'admin', 'name' => $permissions[$i]['permission'][$j], 'group_name' => $groupPermission]);
                $SuperAdmin->givePermissionTo($permission);
                $permission->assignRole($SuperAdmin);
            }
        }

    }
}
