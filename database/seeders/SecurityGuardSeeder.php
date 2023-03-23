<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecurityGuardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passwordSuffix = '1234567890';
        $securityGuards = [
            [
                'name' => 'Sarah Joe',
                'username' => 'sarah',
                'email' => 'sarah@' . config('app.domain'),
                'password' => bcrypt('sarah' . $passwordSuffix),
            ],
            [
                'name' => 'Max Joe',
                'username' => 'max',
                'email' => 'max@' . config('app.domain'),
                'password' => bcrypt('max' . $passwordSuffix),
            ],
            [
                'name' => 'Pete Joe',
                'username' => 'Pete',
                'email' => 'pete@' . config('app.domain'),
                'password' => bcrypt('pete' . $passwordSuffix),
            ],
        ];
        foreach ($securityGuards as $securityGuard) {
            $user = User::create([
                'name' => $securityGuard['name'],
                'username' => $securityGuard['username'],
                'email' => $securityGuard['email'],
                'password' => $securityGuard['password']
            ]);
            $user->assignRole(RoleEnum::SECURITY_GUARD);
            $user->securityGuard()->create([
                'guard_no' => generateSecurityGuardNo()
            ]);
        }
    }
}