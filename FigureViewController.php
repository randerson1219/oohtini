<?php

namespace App\Http\Controllers;

use App\DateStamp;
use App\Region;
use App\Series;
use App\Figure;
use App\VariationList;
use App\VariationType;
use App\FigureView;
use Illuminate\Http\Request;

class FigureViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FigureView  $figureView
     * @return \Illuminate\Http\Response
     */
    public function show(Figure $figure)
    {
        $series = Series::where('id', $figure->series_id)
            ->first();

        $figures = Figure::with('variation')
            ->where('series_id', $figure->series_id)
            ->get();

        $variations = VariationType::with('variation')
            ->get();

        return view('figureview.show', [
            'series' => $series,
            'figures' => $figures,
            'variations' => $variations,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FigureView  $figureView
     * @return \Illuminate\Http\Response
     */
    public function edit(FigureView $figureView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FigureView  $figureView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FigureView $figureView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FigureView  $figureView
     * @return \Illuminate\Http\Response
     */
    public function destroy(FigureView $figureView)
    {
        //
    }
}
