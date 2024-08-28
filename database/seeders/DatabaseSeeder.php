<?php

namespace Database\Seeders;

use App\Models\Creator;

//use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Creator::factory()->count(10)->create();
    }
}
