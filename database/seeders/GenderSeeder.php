<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name' => 'Hombre',
        ]);

        Gender::create([
            'name' => 'Mujer',
        ]);

        Gender::create([
            'name' => 'Niño',
        ]);

        Gender::create([
            'name' => 'Niña',
        ]);

        Gender::create([
            'name' => 'Unisex',
        ]);
    }
}
