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
        $roleBuyer = Role::create(['guard_name' => 'web', 'name' => 'Buyer']);
        $roleSeller = Role::create(['guard_name' => 'web', 'name' => 'Seller']);

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
                'group_name' => 'Buyer(admin)',
                'permission' => [
                    'buyer.index',
                    'buyer.create',
                    'buyer.edit',
                    'buyer.show',
                    'buyer.delete',
                    'buyer.dashboard',
                    'buyer.profile',
                    'buyer.post',
                ]
            ],
            //seller permission
            [
                'group_name' => 'Seller(admin)',
                'permission' => [
                    'seller.index',
                    'seller.create',
                    'seller.edit',
                    'seller.show',
                    'seller.delete',
                    'seller.dashboard',
                    'seller.profile',
                    'seller.post',
                ]
            ],
        ];

        //create and asign permission admin guard

        for ($i = 0; $i < count($permissions); $i++) { //All permission
            $groupPermission = $permissions[$i]['group_name']; //find group name
            for ($j = 0; $j < count($permissions[$i]['permission']); $j++) {
                $permission = Permission::create(['guard_name' => 'admin', 'name' => $permissions[$i]['permission'][$j], 'group_name' => $groupPermission]);
                $SuperAdmin->givePermissionTo($permission);
                $permission->assignRole($SuperAdmin);
            }
        }

        //web guard permission
        $permissions1 = [
            //Buyer permission
            [
                'group_name' => 'Buyer(web)',
                'permission' => [
                    'buyer.dashboard',
                    'buyer.profile',
                    'buyer.post',
                ]
            ],
            //Seller permission
            [
                'group_name' => 'Seller(web)',
                'permission' => [
                    'seller.dashboard',
                    'seller.profile',
                    'seller.post',
                ]
            ],
        ];

        //create and asign permission web guard

        for ($i = 0; $i < count($permissions1); $i++) { //All permission
            $groupPermission1 = $permissions1[$i]['group_name']; //find group name
            for ($j = 0; $j < count($permissions1[$i]['permission']); $j++) {
                $permission = Permission::create(['guard_name' => 'web', 'name' => $permissions1[$i]['permission'][$j], 'group_name' => $groupPermission1]);
            }
        }
    }
}
