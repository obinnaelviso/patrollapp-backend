<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clocking extends Model
{
    use HasFactory;

    protected $fillable = ["data", "clock_at"];

    protected $casts = [
        'data' => Json::class
    ];

    public function scopeClockedToday(Builder $query): void
    {
        $startTime = now()->setTime(0, 0);
        $endTime = now()->setTime(23, 59, 59);
        $query->whereDate("clock_at", ">=", $startTime)
            ->whereDate("clock_at", "<=", $endTime);
    }
}
