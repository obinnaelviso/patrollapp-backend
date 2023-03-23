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
        $this->call([
            ConfigSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SecurityGuardSeeder::class,
            SiteSeeder::class,
            CheckpointSeeder::class,
        ]);
    }
}