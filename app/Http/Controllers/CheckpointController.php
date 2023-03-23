<?php

namespace App\Http\Controllers;

use App\Http\Services\CheckpointService;
use App\Models\Site;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    public $checkpointService;
    public function __construct(CheckpointService $checkpointService)
    {
        $this->checkpointService = $checkpointService;
    }
    public function index(Site $site)
    {
        $checkpoints = $this->checkpointService->fetchSiteCheckpoints($site);
        return apiSuccess($checkpoints, "Checkpoints fetched successfully!");
    }
}
