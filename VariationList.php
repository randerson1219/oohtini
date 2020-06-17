<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use DateTime;

class VariationList extends Model
{
    protected $fillable = ['figure_id','front_id', 'back_id', 'variation_type_id', 'region_id', 'source_id'];

    public function path()
    {
        return route('admin.variations.variation_lists.show', $this);
    }

    public function figure()
    {
        return $this->belongsTo(Figure::class);
    }

    public function front()
    {
        return $this->belongsTo(VariationFrontCode::class);
    }

    public function back()
    {
        return $this->belongsTo(VariationBackCode::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function figureView()
    {
        return $this->belongsToMany(FigureView::class);
    }

    public function variationBackName()
    {
        return $this->belongsTo(VariationBackName::class);
    }

    public function variationFrontName()
    {
        return $this->belongsTo(VariationFrontName::class);
    }

    public function dateStamp()
    {
        return $this->hasMany(DateStamp::class);
    }

    public function dateStamptest2($variation_list_id = 'variation_list_id')
    {
        return $this->dateStamp()
        ->where($variation_list_id)
            ->get();
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function variationType()
    {
        return $this->belongsTo(VariationType::class);
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

