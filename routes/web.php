<?php

use App\Catalog;
use App\Link;

Route::get('/', function () {
    $undergraduate = Catalog::whereType('undergraduate')->orderBy('created_at', 'ASC')->get();
    $graduate      = Catalog::whereType('graduate')->orderBy('created_at', 'DESC')->get();
    $availableCatalogYears = Link::select('start_year')->distinct()->get();
    return view('home', compact('undergraduate', 'graduate', 'availableCatalogYears'));
});

Route::get('create/graduate', 'CreateCatalogController@graduate');
Route::get('create/undergraduate', 'CreateCatalogController@undergraduate');
Route::get('manage', 'LinksController@index');
Route::get('manage/rollover', 'LinksController@rollover');
Route::get('{id}', 'ViewCatalogController@show');
