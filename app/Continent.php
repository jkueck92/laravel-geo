<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Continent extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'code', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function countries()
    {
        return $this->hasMany(Country::class);
    }

}
