<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    public $guarded = [];

    public function roles() {

        return $this->belongsToMany(Role::class)->withTimestamps();

    }
}
