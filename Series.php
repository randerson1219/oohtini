<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{

    protected $fillable = ['name', 'acronym'];

    public function path()
    {
        return route('series.show', $this);
    }

    public function figure()
    {
        return $this->hasMany(Figure::class);
    }

    public function cardbackVariation()
    {
        return $this->figure()
        ->join('variation_lists', 'variation_lists.figure_id', 'figures.id') 
        ->where('variation_lists.variation_type_id', 1)
        ->get();
    }

    public function figureVariation()
    {
        return $this->figure()
        ->join('variation_lists', 'variation_lists.figure_id', 'figures.id') 
        ->where('variation_lists.variation_type_id', 2)
        ->get();
    }

}
