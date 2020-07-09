<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gyms extends Model
{
    protected $fillable = [
        'name', 'prefecture_id','area_id','openhour','closehour','detail'
    ];
}
