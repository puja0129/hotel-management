<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    protected $fillable = ['service_id', 'image_url', 'caption', 'sort_order'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
