<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariationBackName extends Model
{
    protected $fillable = ['back_view_code_id','title_id', 'description_id', 'position_id'];

    public function backViewCode()
    {
        return $this->belongsTo(VariationBackCode::class);
    }

    public function title()
    {
        return $this->belongsTo(VariationBackTitle::class);
    }

    public function description()
    {
        return $this->belongsTo(VariationBackDescription::class);
    }

}
