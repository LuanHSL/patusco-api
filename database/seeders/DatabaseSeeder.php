<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->receptionist('receptionist@receptionist.com')->create();
        User::factory()->doctor('doctor1@doctor.com')->create();
        User::factory()->doctor('doctor2@doctor.com')->create();
        User::factory()->doctor('doctor3@doctor.com')->create();
    }
}
