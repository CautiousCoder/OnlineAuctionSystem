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
        $roleUser = Role::create(['name' => 'User']);
        $roleBuyer = Role::create(['name' => 'Buyer']);
        $roleSeller = Role::create(['name' => 'Seller']);

        $permissions = [
            
            //Admin permission
            [
                'group_name' => 'Admin',
                'permission' => [
                    'admin.create',
                    'admin.edit',
                    'admin.show',
                    'admin.delete',
                    'admin.dashboard',
                ]
            ],
            

            //user permission
            [
                'group_name' => 'User',
                'permission' => [
                    'user.create',
                    'user.edit',
                    'user.show',
                    'user.delete',
                    'user.dashboard',
                ]
            ],
            
            //buyer permission
            [
                'group_name' => 'Buyer',
                'permission' => [
                    'buyer.create',
                    'buyer.edit',
                    'buyer.show',
                    'buyer.delete',
                ]
            ],
            //seller permission
            [
                'group_name' => 'Seller',
                'permission' => [
                    'seller.create',
                    'seller.edit',
                    'seller.show',
                    'seller.delete',
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
