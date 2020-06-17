<?php

namespace App\Http\Controllers;

use App\VariationBackCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationBackCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationBackCode::latest()->get();

        $columns = Schema::getColumnListing('variation_back_codes');

        return view('admin/variations/variation_back_codes.index', [
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
        return view('admin/variations/variation_back_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationBackCode();

        $variationBackCode = new VariationBackCode(request(['back_view_code','name']));
        $variationBackCode->save();

        return redirect('admin/variations/variation_back_codes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationBackCode  $variationBackCode
     * @return \Illuminate\Http\Response
     */
    public function show(VariationBackCode $variationBackCode)
    {
        return view('admin.variations.variation_back_codes.show', ['variationBackCode' => $variationBackCode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationBackCode  $variationBackCode
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationBackCode $variationBackCode)
    {
        return view('admin.variations.variation_back_codes.edit', compact('variationBackCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationBackCode  $variationBackCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationBackCode $variationBackCode)
    {
        $variationBackCode->update($this->validateVariationBackCode());

        return view('admin.variations.variation_back_codes.show', ['variationBackCode' => $variationBackCode]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationBackCode  $variationBackCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationBackCode $variationBackCode)
    {
        //
    }

    protected function validateVariationBackCode()
    {
        return request()->validate([
            'back_view_code' => 'required',
            'name' => 'required',
        ]);
    }
}
