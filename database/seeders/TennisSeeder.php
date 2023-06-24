<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TennisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tennis::factory(5)->create();

    }
}
