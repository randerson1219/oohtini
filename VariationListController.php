<?php

namespace App\Http\Controllers;

use App\Source;
use App\VariationType;
use App\VariationBackCode;
use App\VariationFrontCode;
use App\Figure;
use App\Region;
use App\VariationList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VariationList::latest()->get();

        $columns = Schema::getColumnListing('variation_lists');

        return view('admin/variations/variation_lists.index', [
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
        return view('admin/variations/variation_lists.create', [
            'figures' => Figure::all(),
            'variationTypes' => VariationType::all(),
            'regions' => Region::all(),
            'variationFronts' => VariationFrontCode::all(),
            'variationBacks' => VariationBackCode::all(),
            'sources' => Source::all()
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
        $this->validateVariationList();

        $variationList = new VariationList(request(['figure_id','front_id', 'back_id', 'variation_type_id', 'region_id', 'source_id']));
        $variationList->save();

        return redirect('admin/variations/variation_lists');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationList  $variationList
     * @return \Illuminate\Http\Response
     */
    public function show(VariationList $variationList)
    {
        return view('admin.variations.variation_lists.show', ['variationList' => $variationList]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationList  $variationList
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationList $variationList)
    {
        return view('admin.variations.variation_lists.edit', compact('variationList'), [
            'figures' => Figure::all(),
            'variationTypes' => VariationType::all(),
            'regions' => Region::all(),
            'variationFronts' => VariationFrontCode::all(),
            'variationBacks' => VariationBackCode::all(),
            'source' => Source::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationList  $variationList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationList $variationList)
    {
        $variationList->update($this->validateVariationList());

        return view('admin.variations.variation_lists.show', ['variationList' => $variationList]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationList  $variationList
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationList $variationList)
    {
        //
    }

    protected function validateVariationList()
    {
        return request()->validate([
            'figure_id' => 'required',
            'front_id' => 'required',
            'back_id' => 'required',
            'variation_type_id' => 'required',
            'region_id' => 'required',
            'source_id' => 'required'
        ]);
    }
}
