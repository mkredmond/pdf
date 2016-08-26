<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index(Request $request)
    {
    	if($request->has('year')){
    		$year = $request->input('year');
    	} else {
	    	$year = date("Y") . " - " . (date("Y") + 1);
    	}

    	$links = Link::where('year', '=', $year)->get();

    	return view('manage', compact('links'));
    }
}
