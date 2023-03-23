<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
use App\Models\SecurityGuard;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Site::class;

    public function definition(): array
    {
        $securityGuard = SecurityGuard::inRandomOrder()->first();
        return [
            'security_guard_id' => $securityGuard->id,
            'name' => fake()->streetName(),
            'site_no' => generateSiteNo()
        ];
    }
}