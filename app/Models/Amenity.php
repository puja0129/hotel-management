<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'name', 'category', 'description', 'icon',
        'price', 'is_available', 'timings', 'capacity',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function getCategoryLabelAttribute(): string
    {
        return match($this->category) {
            'food'   => 'Food & Dining',
            'gym'    => 'Fitness & Gym',
            'sports' => 'Sports',
            'games'  => 'Games & Entertainment',
            'spa'    => 'Spa & Wellness',
            default  => 'Other',
        };
    }

    public function getCategoryColorAttribute(): string
    {
        return match($this->category) {
            'food'   => 'warning',
            'gym'    => 'danger',
            'sports' => 'success',
            'games'  => 'primary',
            'spa'    => 'info',
            default  => 'secondary',
        };
    }
}
