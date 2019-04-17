<?php

use Illuminate\Database\Seeder;
use Oxygencms\Users\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage_back_office', // can do everything!
            'access_back_office', // can only access the back office (/admin)
        ];

        $resource_permissions = array_flatten([
            $this->resourcePermissions('link'),
            $this->resourcePermissions('menu'),
            $this->resourcePermissions('page'),
            $this->resourcePermissions('permission'),
            $this->resourcePermissions('phrase'),
            $this->resourcePermissions('role'),
            $this->resourcePermissions('user'),
            $this->resourcePermissions('block'),
        ]);

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($resource_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    /**
     * @param string $model
     *
     * @return array
     */
    private function resourcePermissions(string $model)
    {
        return [
            'manage_' . str_plural($model), // can do all them
            "view_" . str_plural($model), // index (back office)
            "create_$model", // create
            "update_$model", // update
            "delete_$model", // delete
        ];
    }
}
