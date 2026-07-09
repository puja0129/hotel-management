<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'image', 'subtitle', 'title', 
        'button1_text', 'button1_link', 
        'button2_text', 'button2_link', 
        'is_active', 'sort_order'
    ];
}
