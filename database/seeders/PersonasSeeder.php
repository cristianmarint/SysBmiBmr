<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\persona;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        persona::factory()->times(20)->create();
    }
}
