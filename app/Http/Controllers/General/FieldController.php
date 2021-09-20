<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Descipline;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $fields=Descipline::all();
        return  view('field.index', compact('fields'));
    }
}
