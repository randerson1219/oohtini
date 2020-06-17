<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FigureView extends Model
{
    public function getRouteKeyName()
{
    return 'series_id';
}
}
