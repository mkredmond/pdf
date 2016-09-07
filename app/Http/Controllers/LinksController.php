<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Return the selected years links. Defaults to most recent.
     * @param  Request $request
     * @return view  
     */
    public function index(Request $request)
    {
    	if($request->has('year')){
    		$selectedYear = trim($request->input('year'));
    	} else {
	    	$selectedYear = Link::max('start_year');
    	}
    	$links = Link::where('start_year', '=', $selectedYear)->get();
        $availableLinkYears = Link::select('start_year')->distinct()->get();

    	return view('manage', compact('links', 'availableLinkYears'));
    }

    /**
     * Makes a copy of the most recent year's links and 
     * updates the years in the URL
     * @param  Request $request
     * @return App\Classes\Flash
     */
    public function rollover(Request $request)
    {
        $templateYear = Link::max('start_year');

        $links = Link::where('start_year', '=', $templateYear)->get();

        foreach ($links as $link) {
            Link::rolloverLink($templateYear + 1, $link);
        }

        flash()->success('Rollover Successfule', "Links have been updated from $templateYear-" . ($templateYear+1) . " to " . ($templateYear + 1) . "-". ($templateYear+2));

        return back();
    }
}
