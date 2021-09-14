<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rigoberto = User::create([
            'name' => 'Rigoberto',
            'email' => 'rigoberto@brandbean.mx',
            'position' => 'Programador',
            'password' => Hash::make('12345678'),
        ]);

      
        $rigoberto->assignRole('Administrador');
      
    }
}
