<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{

    protected $fillable=[
        "status"
    ];


    public function projectImages(){
        return $this->hasMany(projectImages::class,'project_id');
    }

    public function niche(){
        return $this->belongsTo(niches::class,'niche_id');
    }
}
