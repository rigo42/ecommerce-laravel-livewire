<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ajustes']);
        Permission::create(['name' => 'log']);
        Permission::create(['name' => 'usuarios']);
        Permission::create(['name' => 'banners']);
        Permission::create(['name' => 'productos']);
        Permission::create(['name' => 'blogs']);
        Permission::create(['name' => 'pedidos']);
        
    }
}
