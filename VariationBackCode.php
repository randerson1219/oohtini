<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationBackCode extends Model
{
    protected $fillable = ['back_view_code','name'];

    public function path()
    {
        return route('admin.variations.variation_backs.show', $this);
    }
}
