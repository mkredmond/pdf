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
        $name = $request->input('catalog-name') || "default";
        $year = $request->input('catalog-year') || date('Y');

        $pdf = new PdfCreator('graduate', $year);
        $pdf->generateHtmlFile()->createPdf()->save($name);

        $message = "<span>Your PDF can be viewed here</span><p><a href='" . $pdf->getUid() . "/$name.pdf>$name.pdf</a></p>'";
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
        $name = $request->input('catalog-name') || "default";

        $pdf = new PdfCreator('undergraduate');
        $pdf->generateHtmlFile()->createPdf()->save($name);

        return back();
    }
}
