<?php

namespace App\Http\Controllers;

use App\Http\Services\ClockingService;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class ClockingController extends Controller
{
    protected $clockingService;
    public function __construct(ClockingService $clockingService)
    {
        $this->clockingService = $clockingService;
    }
    public function clock(Checkpoint $checkpoint, Request $request)
    {
        $request->validate([
            "clock_at" => "required",
            "data" => "required",
            "data.latitude" => "required",
            "data.longitude" => "required",
            "data.location" => "required"
        ]);
        $clocking = $this->clockingService->clock($checkpoint, $request->all());
        if ($clocking == null) {
            return apiError("This checkpoint has already being clocked");
        } else {
            return apiSuccess($clocking, "Checkpoint clocked successfully");
        }
    }
}
