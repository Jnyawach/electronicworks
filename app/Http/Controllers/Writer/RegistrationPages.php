<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (isset(Auth::user()->name)){
            return  redirect('english_test');
        }else{
            return view('registration/writer_details' );
        }


    }
}
