<?php

namespace App\Http\Controllers;

use App\VariationBackPosition;
use App\VariationBackDescription;
use App\VariationBackTitle;
use App\VariationBackCode;
use App\VariationBackName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationBackNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationBackName::latest()->get();

        $columns = Schema::getColumnListing('variation_back_names');

        return view('admin/variations/variation_back_names.index', [
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
        return view('admin/variations/variation_back_names.create', [
            'variation_back_codes' => VariationBackCode::all(),
            'titles' => VariationBackTitle::all(),
            'descriptions' => VariationBackDescription::all(),
            'positions' => VariationBackPosition::all(),
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
        $this->validateVariationBackName();

        $variationBackName = new VariationBackName(request(['back_view_code_id','title_id', 'description_id', 'position_id']));
        $variationBackName->save();

        return redirect('admin/variations/variation_back_names');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationBackName  $variationBackName
     * @return \Illuminate\Http\Response
     */
    public function show(VariationBackName $variationBackName)
    {
        return view('admin.variations.variation_back_names.show', ['variationBackName' => $variationBackName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationBackName  $variationBackName
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationBackName $variationBackName)
    {
        return view('admin.variations.variation_back_names.edit', compact('variationBackName'), [
            'variation_back_codes' => VariationBackCode::all(),
            'titles' => VariationBackTitle::all(),
            'descriptions' => VariationBackDescription::all(),
            'positions' => VariationBackPosition::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationBackName  $variationBackName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationBackName $variationBackName)
    {
        $variationBackName->update($this->validateVariationBackName());

        return view('admin.variations.variation_back_names.show', ['variationBackName' => $variationBackName]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationBackName  $variationBackName
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationBackName $variationBackName)
    {
        //
    }

    protected function validateVariationBackName()
    {
        return request()->validate([
            'back_view_code_id' => 'required',
            'title_id' => 'required',
            'description_id' => 'required',
            'position_id' => 'required'
        ]);
    }
}
