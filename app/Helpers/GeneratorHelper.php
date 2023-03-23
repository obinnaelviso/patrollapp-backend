<?php

use App\Models\Checkpoint;
use App\Models\SecurityGuard;
use App\Models\Site;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

function generateSiteNo(int $currentCount = -1)
{
    if ($currentCount == -1) {
        $currentCount = Site::count();
    }
    return generateId("PATSIT-", $currentCount + 1, );
}

function generateSecurityGuardNo()
{
    return generateId("PATGRD-", SecurityGuard::count() + 1);
}

function generateCheckpointNo(int $currentCount = -1)
{
    if ($currentCount == -1) {
        $currentCount = Checkpoint::count();
    }
    return generateId("PATCHK-", Checkpoint::count() + 1);
}

function generateId(string $prefix, int $count)
{
    return $prefix . str_pad($count, 6, "0", STR_PAD_LEFT);
}

function generateQRCode(array $data): string
{
    $storageLocal = Storage::disk("local");
    if (!$storageLocal->exists("qrcode-temp")) {
        $storageLocal->makeDirectory("qrcode-temp");
    }

    $storagePath = $storageLocal->path("qrcode-temp/" . Str::slug($data['name']) . ".png");
    QrCode::format('png')
        ->size(300)
        ->generate(json_encode($data), $storagePath);
    return $storagePath;
}
