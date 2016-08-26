<?php

use App\Catalog;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$undergraduate = Catalog::whereType('undergraduate')->orderBy('created_at', 'ASC')->get();
	$graduate = Catalog::whereType('graduate')->orderBy('created_at', 'DESC')->get();

	$message = "<span>Your PDF can be viewed here</span><p><a href='#'>something.pdf</a></p>'";
    flash()->success('PDF created', $message);


    return view('home', compact('undergraduate', 'graduate'));
});

Route::get('create/graduate', 'CreateCatalogController@graduate');
Route::get('create/undergraduate', 'CreateCatalogController@undergraduate');
Route::get('manage', 'LinksController@index');
Route::get('parse', 'HtmlStripController@index');
Route::post('parse', 'HtmlStripController@strip');
Route::get('{id}', 'ViewCatalogController@show');