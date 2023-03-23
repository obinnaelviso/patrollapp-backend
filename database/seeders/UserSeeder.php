<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'John Doe',
            'username' => 'admin',
            'email' => 'admin@'.config('app.domain'),
            'password' => bcrypt('admin1234567890'),
        ]);
        $admin->assignRole(RoleEnum::ADMIN);

        $manager = User::create([
            'name' => 'Jane Doe',
            'username' => 'manager',
            'email' => 'manager@'.config('app.domain'),
            'password' => bcrypt('manager1234567890'),
        ]);
        $manager->assignRole(RoleEnum::MANAGER);
    }
}
