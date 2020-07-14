<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name', 'prefecture_id',
    ];

    public function gyms()
    {
        return $this->hasMany('App\Gym');
    }
}
