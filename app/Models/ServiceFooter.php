<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFooter extends Model
{
    protected $fillable = ['service_id', 'text', 'price', 'cta_label', 'cta_url'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
