<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationFrontName extends Model
{
    protected $fillable = ['front_view_code_id','title_id', 'description_id', 'position_id'];

    public function frontViewCode()
    {
        return $this->belongsTo(VariationFrontCode::class);
    }

    public function title()
    {
        return $this->belongsTo(VariationFrontTitle::class);
    }

    public function description()
    {
        return $this->belongsTo(VariationFrontDescription::class);
    }

}