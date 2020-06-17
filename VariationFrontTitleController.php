<?php

namespace App\Http\Controllers;

use App\VariationFrontTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationFrontTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationFrontTitle::latest()->get();

        $columns = Schema::getColumnListing('variation_front_titles');

        return view('admin/variations/variation_front_titles.index', [
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
        return view('admin/variations/variation_front_titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationFrontTitle();

        $variationFrontTitle = new VariationFrontTitle(request(['name']));
        $variationFrontTitle->save();

        return redirect('admin/variations/variation_front_titles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationFrontTitle  $variationFrontTitle
     * @return \Illuminate\Http\Response
     */
    public function show(VariationFrontTitle $variationFrontTitle)
    {
        return view('admin.variations.variation_front_titles.show', ['variationFrontTitle' => $variationFrontTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationFrontTitle  $variationFrontTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationFrontTitle $variationFrontTitle)
    {
        return view('admin.variations.variation_front_titles.edit', compact('variationFrontTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationFrontTitle  $variationFrontTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationFrontTitle $variationFrontTitle)
    {
        $variationFrontTitle->update($this->validateVariationFrontTitle());

        return view('admin.variations.variation_front_titles.show', ['variationFrontTitle' => $variationFrontTitle]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationFrontTitle  $variationFrontTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationFrontTitle $variationFrontTitle)
    {
        //
    }

    protected function validateVariationFrontTitle()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
