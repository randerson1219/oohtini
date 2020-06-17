<?php

namespace App\Http\Controllers;

use App\VariationBackPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationBackPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationBackPosition::latest()->get();

        $columns = Schema::getColumnListing('variation_back_positions');

        return view('admin/variations/variation_back_positions.index', [
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
        return view('admin/variations/variation_back_positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationBackPosition();

        $variationBackPosition = new VariationBackPosition(request(['name']));
        $variationBackPosition->save();

        return redirect('admin/variations/variation_back_positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationBackPosition  $variationBackPosition
     * @return \Illuminate\Http\Response
     */
    public function show(VariationBackPosition $variationBackPosition)
    {
        return view('admin.variations.variation_back_positions.show', ['variationBackPosition' => $variationBackPosition]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationBackPosition  $variationBackPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationBackPosition $variationBackPosition)
    {
        return view('admin.variations.variation_back_positions.edit', compact('variationBackPosition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationBackPosition  $variationBackPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationBackPosition $variationBackPosition)
    {
        $variationBackPosition->update($this->validateVariationBackPosition());

        return view('admin.variations.variation_back_positions.show', ['variationBackPosition' => $variationBackPosition]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationBackPosition  $variationBackPosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationBackPosition $variationBackPosition)
    {
        //
    }

    protected function validateVariationBackPosition()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
