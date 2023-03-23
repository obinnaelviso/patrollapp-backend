<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiteResource;
use App\Http\Services\SiteService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $siteService;
    public function __construct(SiteService $siteService)
    {
        $this->siteService = $siteService;
    }
    public function index()
    {
        $sites = $this->siteService->fetchGuardSites(auth()->user()->securityGuard);
        return apiSuccess($sites, "Sites retrieved successfully!");
    }
}
