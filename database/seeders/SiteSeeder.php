<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::factory()
            ->count(10)
            ->hasCheckpoints(
                5, function (array $attributes, Site $site) {
                    return ['name' => $site->name . " #" . fake()->buildingNumber()];
                }
            )->create();
    }
}
