<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Enums\RoleEnum;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => RoleEnum::ADMIN,
        ]);

        Role::create([
            'name' => RoleEnum::MANAGER
        ]);

        Role::create([
            'name' => RoleEnum::SECURITY_GUARD,
        ]);
    }
}
