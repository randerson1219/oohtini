<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $guarded = [];

    public function abilities() {

        return $this->belongsToMany(Ability::class)->withTimestamps();

    }

    public function allowTo($ability){

        if(is_string($ability)) {
            $ability = Ability::wherename($ability)->firstOrFail();
        }

        $this->abilities()->sync($ability, false);

    }
}
