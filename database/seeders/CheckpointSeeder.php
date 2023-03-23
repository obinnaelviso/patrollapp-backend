<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CheckpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkpoints = Checkpoint::all(["id", "site_id", "name", "checkpoint_no"]);
        foreach($checkpoints as $checkpoint) {
            $qrcode = generateQRCode($checkpoint->toArray());
            $checkpoint->addMedia($qrcode)->toMediaCollection(Str::slug($checkpoint->site->securityGuard->user->name));
        }
    }
}
