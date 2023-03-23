<?php

namespace App\Http\Services;

use App\Http\Resources\CheckpointResource;
use App\Models\Site;

class CheckpointService
{
    public function fetchSiteCheckpoints(Site $site)
    {
        return CheckpointResource::collection($site->checkpoints);
    }
}
