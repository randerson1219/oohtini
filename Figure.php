<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    protected $fillable = ['name', 'reference', 'series_id', 'id'];


    public function path()
    {
        return route('figures.show', $this);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function variation()
    {
        return $this->hasMany(VariationList::class);
    }

    public function cardbackVariation($variation_type_id = 'variation_type_id', $figure_id = 'figure_id')
    {
        return $this->variation()
        ->where($variation_type_id,  $figure_id)
        ->where('variation_type_id', 1)
            ->get();
    }

    public function figureVariation($variation_type_id = 'variation_type_id', $figure_id = 'figure_id', $id = 'id')
    {
        return $this->variation()
        ->where($variation_type_id,  $figure_id, $id)
        ->where('variation_type_id', 2)
            ->get();
    }

    public function dateStamp()
    {
        return $this->hasMany(DateStamp::class);

    }

    public function regions()
    {
        return $this->belongsTo(Region::class);
    }

    public function front()
    {
        return $this->belongsTo(VariationFrontCode::class);
    }

    public function back()
    {
        return $this->belongsTo(VariationBackCode::class);
    }

}
