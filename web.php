<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/variations', function () {
    return view('/admin/variations/index');
});

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/admin/variations', 'VariationController@index');


Route::get('/', 'SeriesViewController@index');
Route::get('/figureview', 'FigureViewController@index');
Route::get('/figureview/{figure}', 'FigureViewController@show');
Route::get('/variationview/{variationList}/{variationType}', 'VariationViewController@show');


Route::group(['middleware' => 'can:admin'], function () {
    Route::resource('/admin/figures', 'FiguresController');
    Route::resource('/admin/series', 'SeriesController');
    Route::resource('/admin/sources', 'SourcesController');
    Route::resource('/admin/regions', 'RegionsController');
    Route::resource('/admin/variations/variation_lists', 'VariationListController');
    Route::resource('/admin/variations/variation_front_codes', 'VariationFrontCodeController');
    Route::resource('/admin/variations/variation_front_descriptions', 'VariationFrontDescriptionController');
    Route::resource('/admin/variations/variation_front_names', 'VariationFrontNameController');
    Route::resource('/admin/variations/variation_front_titles', 'VariationFrontTitleController');
    Route::resource('/admin/variations/variation_back_codes', 'VariationBackCodeController');
    Route::resource('/admin/variations/variation_back_descriptions', 'VariationBackDescriptionController');
    Route::resource('/admin/variations/variation_back_names', 'VariationBackNameController');
    Route::resource('/admin/variations/variation_back_titles', 'VariationBackTitleController');
    Route::resource('/admin/variations/variation_back_positions', 'VariationBackPositionController');
    Route::resource('/admin/variations/variation_front_positions', 'VariationFrontPositionController');
    Route::resource('/admin/date_stamps', 'DateStampController');
    Route::resource('/admin/variations/variation_types', 'VariationTypeController');
});


Auth::routes();

Route::get('/home', 'SeriesViewController@index')->name('home');
