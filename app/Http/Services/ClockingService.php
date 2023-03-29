<?php

namespace App\Http\Services;

use App\Http\Resources\ClockingResource;
use App\Models\Checkpoint;
use App\Models\Clocking;
use Carbon\Carbon;

class ClockingService
{
    public function clock(Checkpoint $checkpoint, array $clockingData)
    {
        $previousClockingDate =
            $checkpoint->clockings()->clockedToday()->first();

        if ($previousClockingDate == null) {
            $currentClockingDate = $checkpoint->clockings()->create([
                "data" => $clockingData["data"],
                "clock_at" => Carbon::parse($clockingData["clock_at"])
            ]);
            return new ClockingResource($currentClockingDate);
        } else {
            return null;
        }
    }
}
