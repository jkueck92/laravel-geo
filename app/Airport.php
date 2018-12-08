<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'iata', 'icao', 'country_id', 'user_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
