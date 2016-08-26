<?php

namespace App\Http\Controllers;

use App\Classes\HtmlUtil;
use App\Http\Requests;
use Illuminate\Http\Request;

class HtmlStripController extends Controller
{
    public function index()
    {
    	return view('strip');
    }

    public function strip(Request $request)
    {
    	$html = new HtmlUtil($request->input('html-raw'), $request->input('tags'));

    	dd($html->stripTags());
    }


}
