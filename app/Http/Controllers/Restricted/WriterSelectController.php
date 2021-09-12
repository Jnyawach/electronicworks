<?php

namespace App\Http\Controllers\Restricted;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WriterSelectController extends Controller
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
        $writer=User::findOrFail($request->writer_id);
        session('writer',$writer);
        return  redirect()->back();

    }
}
