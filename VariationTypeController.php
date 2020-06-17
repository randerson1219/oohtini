<?php

namespace App\Http\Controllers;

use App\VariationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class VariationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = VariationType::latest()->get();

        $columns = Schema::getColumnListing('variation_types');

        return view('admin/variations/variation_types.index', [
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
        return view('admin/variations/variation_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateVariationType();

        $variationType = new VariationType(request(['name']));
        $variationType->save();

        return redirect('admin/variations/variation_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationType  $variationType
     * @return \Illuminate\Http\Response
     */
    public function show(VariationType $variationType)
    {
        return view('admin.variations.variation_types.show', ['variationType' => $variationType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariationType  $variationType
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationType $variationType)
    {
        return view('admin.variations.variation_types.edit', compact('variationType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariationType  $variationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VariationType $variationType)
    {
        $variationType->update($this->validateVariationType());

        return view('admin.variations.variation_types.show', ['variationType' => $variationType]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationType  $variationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationType $variationType)
    {
        //
    }

    protected function validateVariationType()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
