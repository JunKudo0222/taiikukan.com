<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function gyms()
    {
        return $this->hasMany('App\Gym');
    }
}
