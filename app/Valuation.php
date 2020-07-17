<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Valuation extends Model
{
    protected $fillable = [
        'calculated_rate','gym_id'
    ];
    public function gym()
    {
        return $this->belongsTo('App\Gym');
    }
}
