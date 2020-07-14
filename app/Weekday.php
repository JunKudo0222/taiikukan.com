<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function gyms()
    {
        return $this->belongsToMany('App\Gym')->withTimestamps();
    }
}
