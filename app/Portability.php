<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portability extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function old_division() {
        return $this->belongsTo(Division::class, 'old_division_id');
    }

    public function new_division() {
        return $this->belongsTo(Division::class, 'new_division_id');
    }

    protected $fillable = [
        'old_division_approval', 'new_division_approval', 'status', 'user_id', 'old_division_id', 'new_division_id'
    ];
}
