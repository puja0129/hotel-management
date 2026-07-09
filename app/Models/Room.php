<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'image', 'price', 'stars', 'bed_count', 'bath_count', 'wifi', 'description', 'is_available'];

    protected $casts = [
        'wifi' => 'boolean',
        'is_available' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
