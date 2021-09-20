<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::create(['name' => 'Administrador']);
        $copywriter = Role::create(['name' => 'Copywriter']);

        $permissions = Permission::all();
        foreach($permissions as $permission){
            $administrador->givePermissionTo($permission->name);
        }

        $copywriter->givePermissionTo(['blogs']);
    }
}
