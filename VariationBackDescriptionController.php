<?php

namespace App\Http\Controllers;

use App\VariationBackDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationBackDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationBackDescription::latest()->get();

        $columns = Schema::getColumnListing('variation_back_descriptions');

        return view('admin/variations/variation_back_descriptions.index', [
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
        return view('admin/variations/variation_back_descriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationBackDescription();

        $variationBackDescription = new VariationBackDescription(request(['name']));
        $variationBackDescription->save();

        return redirect('admin/variations/variation_back_descriptions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationBackDescription  $variationBackDescription
     * @return \Illuminate\Http\Response
     */
    public function show(VariationBackDescription $variationBackDescription)
    {
        return view('admin.variations.variation_back_descriptions.show', ['variationBackDescription' => $variationBackDescription]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationBackDescription  $variationBackDescription
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationBackDescription $variationBackDescription)
    {
        return view('admin.variations.variation_back_descriptions.edit', compact('variationBackDescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationBackDescription  $variationBackDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationBackDescription $variationBackDescription)
    {
        $variationBackDescription->update($this->validateVariationBackDescription());

        return view('admin.variations.variation_back_descriptions.show', ['variationBackDescription' => $variationBackDescription]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationBackDescription  $variationBackDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationBackDescription $variationBackDescription)
    {
        //
    }

    protected function validateVariationBackDescription()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
