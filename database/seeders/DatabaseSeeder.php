<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Office;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed one admin user using the AdminUserSeeder
        $this->call(AdminUserSeeder::class);

        // Seed 10 offices using the OfficeFactory
        Office::factory()->count(10)->create();

        // Seed 10 tasks using the TaskFactory
        Task::factory()->count(10)->create();
    }
}
