<?php

namespace App\Http\Controllers;

use App\VariationList;
use App\VariationType;
use App\VariationView;
use Illuminate\Http\Request;

class VariationViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\VariationView  $variationView
     * @return \Illuminate\Http\Response
     */
    public function show(VariationList $variationList, VariationType $variationType )
    {
        $variations = VariationList::where('figure_id', $variationList->id)
            ->where('variation_type_id', $variationType->id)
            ->get();

         return view('variationview.show', [
            'variations' => $variations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationView  $variationView
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationView $variationView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationView  $variationView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationView $variationView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationView  $variationView
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationView $variationView)
    {
        //
    }
}
