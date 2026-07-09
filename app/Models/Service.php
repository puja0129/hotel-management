<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    protected $fillable = [
        'name', 'slug', 'tag', 'tagline',
        'hero_image', 'icon_svg', 'card_image',
        'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ─── Relationships ───────────────────────────────────────────

    public function sections(): HasMany
    {
        return $this->hasMany(ServiceSection::class)->orderBy('sort_order');
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(ServiceGallery::class)->orderBy('sort_order');
    }

    public function timings(): HasMany
    {
        return $this->hasMany(ServiceTiming::class)->orderBy('sort_order');
    }

    public function highlights(): HasMany
    {
        return $this->hasMany(ServiceHighlight::class)->orderBy('sort_order');
    }

    public function footer(): HasOne
    {
        return $this->hasOne(ServiceFooter::class);
    }

    // ─── Scopes ─────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    // ─── Route Model Binding ─────────────────────────────────────

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
