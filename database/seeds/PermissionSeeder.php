<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'List All Roles'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Update Role',
                'description' => 'Update Role Information'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            
            [
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'List All Users'
            ],

            [
                'name' => 'client-list',
                'display_name' => 'Display Client Listing',
                'description' => 'List All Clients'
            ],
            [
                'name' => 'client-update',
                'display_name' => 'Update Client',
                'description' => 'Update Client Information'
            ],
            [
                'name' => 'client-delete',
                'display_name' => 'Delete Client',
                'description' => 'Delete Client Information'
            ]
            
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
