<?php

namespace App\Http\Services;

use App\Http\Resources\SiteResource;
use App\Models\SecurityGuard;

class SiteService
{
    public function fetchGuardSites(SecurityGuard $securityGuard)
    {
        return SiteResource::collection($securityGuard->sites);
    }
}