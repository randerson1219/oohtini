<?php

namespace App\Http\Controllers;

use App\VariationBackTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationBackTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationBackTitle::latest()->get();

        $columns = Schema::getColumnListing('variation_back_titles');

        return view('admin/variations/variation_back_titles.index', [
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
        return view('admin/variations/variation_back_titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationBackTitle();

        $variationBackTitle = new VariationBackTitle(request(['name']));
        $variationBackTitle->save();

        return redirect('admin/variations/variation_back_titles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationBackTitle  $variationBackTitle
     * @return \Illuminate\Http\Response
     */
    public function show(VariationBackTitle $variationBackTitle)
    {
        return view('admin.variations.variation_back_titles.show', ['variationBackTitle' => $variationBackTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationBackTitle  $variationBackTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationBackTitle $variationBackTitle)
    {
        return view('admin.variations.variation_back_titles.edit', compact('variationBackTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationBackTitle  $variationBackTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationBackTitle $variationBackTitle)
    {
        $variationBackTitle->update($this->validateVariationBackTitle());

        return view('admin.variations.variation_back_titles.show', ['variationBackTitle' => $variationBackTitle]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationBackTitle  $variationBackTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationBackTitle $variationBackTitle)
    {
        //
    }

    protected function validateVariationBackTitle()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
