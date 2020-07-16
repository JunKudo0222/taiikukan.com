<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name', 'prefecture_id','area_id','openhour','closehour','detail','user_id',
    ];

    public function weekdays()
    {
        return $this->belongsToMany('App\Weekday')->withTimestamps();
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }





}


