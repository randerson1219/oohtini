<?php

namespace App\Http\Controllers;

use App\VariationFrontPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationFrontPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationFrontPosition::latest()->get();

        $columns = Schema::getColumnListing('variation_front_positions');

        return view('admin/variations/variation_front_positions.index', [
            'categories' => $categories,
            'columns' => $columns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/variations/variation_front_positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationFrontPosition();

        $variationFrontPosition = new VariationFrontPosition(request(['name']));
        $variationFrontPosition->save();

        return redirect('admin/variations/variation_front_positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationFrontPosition  $variationFrontPosition
     * @return \Illuminate\Http\Response
     */
    public function show(VariationFrontPosition $variationFrontPosition)
    {
        return view('admin.variations.variation_front_positions.show', ['variationFrontPosition' => $variationFrontPosition]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationFrontPosition  $variationFrontPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationFrontPosition $variationFrontPosition)
    {
        return view('admin.variations.variation_front_positions.edit', compact('variationFrontPosition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationFrontPosition  $variationFrontPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationFrontPosition $variationFrontPosition)
    {
        $variationFrontPosition->update($this->validateVariationFrontPosition());

        return view('admin.variations.variation_front_positions.show', ['variationFrontPosition' => $variationFrontPosition]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationFrontPosition  $variationFrontPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationFrontPosition $variationFrontPosition)
    {
        //
    }

    protected function validateVariationFrontPosition()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
