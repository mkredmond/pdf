<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Http\Requests;
use Illuminate\Http\Request;

class ViewCatalogController extends Controller
{
    /**
     * [show description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function show(Request $request, $id)
    {
        $catalog = Catalog::whereId($id)->first();
        
        if( $request->has('view') ){
            return $this->sendCustomView($catalog, $request->input('view'));
        }

        return$this->sendPdfFile($catalog);
    }

    /**
     * [sendPdfFile description]
     * @param  [type] $catalog [description]
     * @return [type]          [description]
     */
    protected function sendPdfFile($catalog)
    {
        $path = public_path('assets') . DIRECTORY_SEPARATOR .  $catalog->id . DIRECTORY_SEPARATOR . $catalog->type . ".pdf";

        return response()->file($path,[
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; ' . $catalog->type . '.pdf'
        ]);
    }

    /**
     * [sendCustomView description]
     * @param  [type] $catalog [description]
     * @param  [type] $q       [description]
     * @return [type]          [description]
     */
    protected function sendCustomView($catalog, $q)
    {
        switch ($q) {
            case "html":
                return \Storage::disk('public')->get($catalog->id . DIRECTORY_SEPARATOR . $catalog->type . ".html");
            case "raw":
                return htmlentities(\Storage::disk('public')->get($catalog->id . DIRECTORY_SEPARATOR . $catalog->type . ".html"));
            default: 
                return response(null, 404);
        }
    }
}
