<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $fillable = ['name'];

    public function path()
    {
        return route('regions.show', $this);
    }

    

}
