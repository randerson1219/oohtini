<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class DateStamp extends Model
{
    protected $fillable = ['variation_list_id', 'date_stamp'];


    public function path()
    {
        return route('admin/variations/date_stamps.show', $this);
    }

    public function variations()
    {
        return $this->belongsTo(VariationList::class);
    }

    public function realDate($dateStamp)
    {
        $productionYear = substr($dateStamp, 0, 2) + 2000;
        $trimmedDateStamp = substr($dateStamp, 2, -1) -1;
        $dateFormat = 'Y z';
        $dateData = $productionYear . " " . $trimmedDateStamp;
        $date = DateTime::createFromFormat($dateFormat, $dateData);
        return $date->format('d F Y');
    }

}
