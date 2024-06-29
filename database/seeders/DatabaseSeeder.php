<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Poli::factory(8)->create();
        // \App\Models\Dokter::factory()->create();
        // \App\Models\Jadwal::factory(2)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'email' => 'test@example.com',
            'password' => 'admin',
        ]);
    }
}