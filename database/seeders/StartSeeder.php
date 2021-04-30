<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Start::factory()->count(5)->create();
    }
}
