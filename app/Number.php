<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{

    protected $fillable = [
        'number', 'deactivated', 'note', 'user_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
