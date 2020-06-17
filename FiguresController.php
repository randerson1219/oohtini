<?php

namespace App\Http\Controllers;

use App\DateStamp;
use App\Series;
use App\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class FiguresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Figure::latest()->get();

        $columns = Schema::getColumnListing('figures');

        return view('admin/figures.index', [
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
        return view('admin/figures.create', [
            'series' => Series::all()
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
        $this->validateFigure();

        $figure = new Figure(request(['name', 'reference', 'series_id']));
        $figure->save();

        return redirect('admin/figures');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function show(Figure $figure)
    {
        return view('admin/figures/show', ['figure' => $figure]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function edit(Figure $figure)
    {
        return view('admin.figures.edit', compact('figure'), [
            'series' => Series::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Figure $figure)
    {
        $figure->update($this->validateFigure());

        return redirect($figure->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Figure  $figure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Figure $figure)
    {
        //
    }

    protected function validateFigure()
    {
        return request()->validate([
            'name' => 'required',
            'reference' => 'required',
            'series_id' => 'required'
        ]);
    }
}
