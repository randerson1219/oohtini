<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    protected $fillable = ['name'];

    public function path()
    {
        return route('sources.show', $this);
    }

}
