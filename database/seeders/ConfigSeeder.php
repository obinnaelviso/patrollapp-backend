<?php

namespace Database\Seeders;

use App\Enums\ConfigEnum;
use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::create([
            "key" => ConfigEnum::ADMIN_CONTACT,
            "value" => "+61288399940"
        ]);
    }
}
