<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'alpha2', 'alpha3', 'alphaNumeric', 'continent_id', 'user_id'
    ];

    public function continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function airports()
    {
        return $this->hasMany(Airport::class);
    }

}
