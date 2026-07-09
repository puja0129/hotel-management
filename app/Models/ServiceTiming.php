<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTiming extends Model
{
    protected $fillable = ['service_id', 'label', 'value', 'sort_order'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
