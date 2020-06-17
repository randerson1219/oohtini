<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationFrontCode extends Model
{
    protected $fillable = ['front_view_code','name'];

    public function path()
    {
        return route('admin.variations.variation_front_codes.show', $this);
    }
}
