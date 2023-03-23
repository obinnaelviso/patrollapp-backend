<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Checkpoint extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ["name", "checkpoint_no"];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function clockings(): HasMany
    {
        return $this->hasMany(Clocking::class);
    }

    public function getQrcodeUrlAttribute(): string
    {
        return $this->getFirstMediaUrl($this->mediaCollectionName());
    }

    public function mediaCollectionName(): string
    {
        return Str::slug($this->site->securityGuard->user->name);
    }


    protected static function booted(): void
    {
        static::creating(function (Checkpoint $model) {
            $model->checkpoint_no = generateCheckpointNo();
        });
    }
}