<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Division extends Authenticatable
{

    public function users() {
        return $this->hasMany(User::class);
    }

    public function portabilities() {
        return $this->hasMany(Portability::class, 'old_division_id');
    }

    protected $guard = 'division';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'prefix', 'division_name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
