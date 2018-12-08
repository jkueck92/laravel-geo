<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLoginActivity extends Model
{

    protected $fillable = [
        'ip', 'user_agent', 'user_id'
    ];

}
