<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TennisSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Tennis::factory(5)->create();

    }
}
