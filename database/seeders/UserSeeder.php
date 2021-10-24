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
        $user1 = User::create([
            'name' => 'Rigoberto',
            'email' => 'rigoberto.villa42@gmail.com',
            'position' => 'CEO',
            'password' => Hash::make('12345678'),
        ]);

        $user2 = User::create([
            'name' => 'Beto',
            'email' => 'rigo.villa52@gmail.com',
            'position' => 'CEO',
            'password' => Hash::make('12345678'),
        ]);

      
        $user1->assignRole('Administrador');
        $user2->assignRole('Administrador');
      
    }
}
