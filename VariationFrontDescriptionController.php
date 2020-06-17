<?php

namespace App\Http\Controllers;

use App\VariationFrontDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationFrontDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationFrontDescription::latest()->get();

        $columns = Schema::getColumnListing('variation_front_descriptions');

        return view('admin/variations/variation_front_descriptions.index', [
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
        return view('admin/variations/variation_front_descriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationFrontDescription();

        $variationFrontDescription = new VariationFrontDescription(request(['name']));
        $variationFrontDescription->save();

        return redirect('admin/variations/variation_front_descriptions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationFrontDescription  $variationFrontDescription
     * @return \Illuminate\Http\Response
     */
    public function show(VariationFrontDescription $variationFrontDescription)
    {
        return view('admin.variations.variation_front_descriptions.show', ['variationFrontDescription' => $variationFrontDescription]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationFrontDescription  $variationFrontDescription
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationFrontDescription $variationFrontDescription)
    {
        return view('admin.variations.variation_front_descriptions.edit', compact('variationFrontDescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationFrontDescription  $variationFrontDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationFrontDescription $variationFrontDescription)
    {
        $variationFrontDescription->update($this->validateVariationFrontDescription());

        return view('admin.variations.variation_front_descriptions.show', ['variationFrontDescription' => $variationFrontDescription]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationFrontDescription  $variationFrontDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationFrontDescription $variationFrontDescription)
    {
        //
    }

    protected function validateVariationFrontDescription()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
