<?php

namespace App\Http\Controllers;

use App\VariationFrontCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationFrontCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationFrontCode::latest()->get();

        $columns = Schema::getColumnListing('variation_front_codes');

        return view('admin/variations/variation_front_codes.index', [
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
        return view('admin/variations/variation_front_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationFrontCode();

        $variationFrontCode = new VariationFrontCode(request(['front_view_code','name']));
        $variationFrontCode->save();

        return redirect('admin/variations/variation_front_codes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationFrontCode  $variationFrontCode
     * @return \Illuminate\Http\Response
     */
    public function show(VariationFrontCode $variationFrontCode)
    {
        return view('admin.variations.variation_front_codes.show', ['variationFrontCode' => $variationFrontCode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationFrontCode  $variationFrontCode
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationFrontCode $variationFrontCode)
    {
        return view('admin.variations.variation_front_codes.edit', compact('variationFrontCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationFrontCode  $variationFrontCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationFrontCode $variationFrontCode)
    {
        $variationFrontCode->update($this->validateVariationFrontCode());

        return view('admin.variations.variation_front_codes.show', ['variationFrontCode' => $variationFrontCode]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationFrontCode  $variationFrontCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationFrontCode $variationFrontCode)
    {
        //
    }

    protected function validateVariationFrontCode()
    {
        return request()->validate([
            'front_view_code' => 'required',
            'name' => 'required',
        ]);
    }
}
