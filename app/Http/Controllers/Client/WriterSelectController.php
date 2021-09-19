<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        $project=Auth::user()->projects()->where('progress_id',1)->latest()->first();

        $writers=User::role('Writer')->permission('activated-writer')->get();
        return  view('dashboard/jobs/select-writer', compact('writers','project'));
    }
}
