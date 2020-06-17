<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\VariationList;
use App\Figure;
use App\DateStamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DateStampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $categories = DateStamp::latest()->get();

        $columns = Schema::getColumnListing('date_stamps');

        return view('admin/date_stamps.index', [
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
        return view('admin/date_stamps.create', [
            'variation_lists' => VariationList::all()
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
        $this->validateDateStamp();

        $dateStamps = new DateStamp(request(['variation_list_id', 'date_stamp']));
        $dateStamps->save();

        return redirect('admin/date_stamps');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DateStamp  $dateStamp
     * @return \Illuminate\Http\Response
     */
    public function show(DateStamp $dateStamp)
    {
        return view('admin/date_stamps.show', ['dateStamp' => $dateStamp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DateStamp  $dateStamp
     * @return \Illuminate\Http\Response
     */
    public function edit(DateStamp $dateStamp)
    {
        return view('admin.date_stamps.edit', compact('dateStamp'), [
            'variation_lists' => VariationList::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DateStamp  $dateStamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DateStamp $dateStamp)
    {
        $dateStamp->update($this->validateDateStamp());

        return view('admin.date_stamps.show', ['dateStamp' => $dateStamp]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DateStamp  $dateStamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(DateStamp $dateStamp)
    {
        //
    }

    protected function validateDateStamp()
    {
        return request()->validate([
            'variation_list_id' => 'required',
            'date_stamp' => 'required|min:6|max:6'
        ]);
    }



}
