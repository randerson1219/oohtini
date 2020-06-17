<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesViewController extends Controller
{
    public function index()
    {
        $series = Series::with('figure.variation')
        ->get();
       
        return view('index', ['series' => $series]);
    }
}
