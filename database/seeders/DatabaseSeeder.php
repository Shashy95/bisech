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
        // User::factory(10)->create();

         User::updateOrCreate(['email' => 'admin@bisech.com'],
          [
            'name' => 'Bisech Administrator',
            'email' => 'admin@bisech.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
