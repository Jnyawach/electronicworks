<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $project=Auth::user()->projects()->latest()->first();
        $recentWriters=Auth::user()->projects()->unique('writer_id')->where('progress_id',4)->latest()->take(5)->get();
        $writers=User::role('Writer')->permission('activated-writer')->get();
        return  view('dashboard/jobs/select-writer', compact('writers','recentWriters','project'));
    }
}
