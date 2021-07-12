<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RegistrationPages extends Controller
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
        return view('registration/writer_details' );

    }
}
