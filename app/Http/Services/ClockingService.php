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
        $startTime = now()->setTime(0, 0);
        $endTime = now()->setTime(23, 59, 59);
        $previousClockingDate =
            $checkpoint->clockings()->whereDate("clock_at", ">=", $startTime)
                ->whereDate("clock_at", "<=", $endTime)->first();

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