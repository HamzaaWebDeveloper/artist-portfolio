<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $fillable = [
        'name',
        'description',
        'long_description',
        'icon',  
        'thumbnail_image',  
        'status',  
    ];
}