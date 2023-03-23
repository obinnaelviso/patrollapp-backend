<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'site_no'];

    public function checkpoints(): HasMany
    {
        return $this->hasMany(Checkpoint::class);
    }

    public function securityGuard(): BelongsTo
    {
        return $this->belongsTo(SecurityGuard::class);
    }

    protected static function booted(): void
    {
        static::creating(function (Site $model) {
            $model->site_no = generateSiteNo();
        });
    }
}