<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationType extends Model
{
    protected $fillable = ['name'];

    public function variation()
    {
        return $this->hasMany(VariationList::class);
    }

    public function variationType($variation_type_id = 'variation_type_id', $figure_id = 'figure_id')
    {
        return $this->variation()
            ->where($variation_type_id,  $figure_id)
            ->get();
    }

}
