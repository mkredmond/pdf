<?php

namespace App\Http\Controllers;

use App\Classes\PdfCreator;
use Illuminate\Http\Request;

class CreateCatalogController extends Controller
{
    /**
     * Creates a graduate catalog
     * @param  Request $request
     * @return redirect
     */
    public function graduate(Request $request)
    {
        $name = $request->input('catalog-name');
        $year = $request->input('catalog-year');

        $pdf = new PdfCreator('graduate', $year);
        $pdf->generateHtmlFile()->createPdf()->save($name);

        $message = "<span>Your PDF can be viewed here</span><p><a target='_blank' href='" . $pdf->getUid() . "/$name.pdf'>$name.pdf</a></p>'";
        flash()->success('PDF created', $message);

        return back();
    }

    /**
     * Creates an undergraduate catalog
     * @param  Request $request
     * @return redirect
     */
    public function undergraduate(Request $request)
    {
        $name = $request->input('catalog-name');
        $year = $request->input('catalog-year');

        $pdf = new PdfCreator('undergraduate', $year);
        $pdf->generateHtmlFile()->createPdf()->save($name);

        $message = "<span>Your PDF can be viewed here</span><p><a target='_blank' href='" . $pdf->getUid() . "/$name.pdf'>$name.pdf</a></p>'";
        flash()->success('PDF created', $message);

        return back();
    }
}
