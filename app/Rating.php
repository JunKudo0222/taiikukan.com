<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'rate', 'user_id', 'gym_id'
    ];

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gym()
    {
        return $this->belongsTo('App\Gym');
    }
}
