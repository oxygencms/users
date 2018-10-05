<?php

use Illuminate\Database\Seeder;
use Oxygencms\Users\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_and_permissions = collect([
            [
                'role' => 'administrator',
                'permissions' => [
                    'manage_back_office',
                ],
            ],
            [
                'role' => 'observer',
                'permissions' => [
                    'view_links',
                    'view_menus',
                    'view_pages',
                    'view_permissions',
                    'view_phrases',
                    'view_blocks',
                    'view_roles',
                    'view_users',
                ],
            ],
        ]);

        $roles_and_permissions->each(function ($item) {
            Role::create(['name' => $item['role']])
                ->givePermissionTo($item['permissions']);
        });
    }
}
