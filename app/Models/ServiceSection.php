<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = ['service_id', 'title', 'items', 'sort_order'];
    protected $casts = ['items' => 'array'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
