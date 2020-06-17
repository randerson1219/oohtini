<?php

namespace App\Http\Controllers;

use App\VariationFrontPosition;
use App\VariationFrontDescription;
use App\VariationFrontTitle;
use App\VariationFrontCode;
use App\VariationFrontName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationFrontNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationFrontName::latest()->get();

        $columns = Schema::getColumnListing('variation_front_names');

        return view('admin/variations/variation_front_names.index', [
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
        return view('admin/variations/variation_front_names.create', [
            'variation_front_codes' => VariationFrontCode::all(),
            'titles' => VariationFrontTitle::all(),
            'descriptions' => VariationFrontDescription::all(),
            'positions' => VariationFrontPosition::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationFrontName();

        $variationFrontName = new VariationFrontName(request(['front_view_code_id','title_id', 'description_id', 'position_id']));
        $variationFrontName->save();

        return redirect('admin/variations/variation_front_names');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationFrontName  $variationFrontName
     * @return \Illuminate\Http\Response
     */
    public function show(VariationFrontName $variationFrontName)
    {
        return view('admin.variations.variation_front_names.show', ['variationFrontName' => $variationFrontName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationFrontName  $variationFrontName
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationFrontName $variationFrontName)
    {
        return view('admin.variations.variation_front_names.edit', compact('variationFrontName'), [
            'variation_front_codes' => VariationFrontCode::all(),
            'titles' => VariationFrontTitle::all(),
            'descriptions' => VariationFrontDescription::all(),
            'positions' => VariationFrontPosition::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationFrontName  $variationFrontName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationFrontName $variationFrontName)
    {
        $variationFrontName->update($this->validateVariationFrontName());

        return view('admin.variations.variation_front_names.show', ['variationFrontName' => $variationFrontName]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationFrontName  $variationFrontName
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationFrontName $variationFrontName)
    {
        //
    }

    protected function validateVariationFrontName()
    {
        return request()->validate([
            'front_view_code_id' => 'required',
            'title_id' => 'required',
            'description_id' => 'required',
            'position_id' => 'required'
        ]);
    }
}
