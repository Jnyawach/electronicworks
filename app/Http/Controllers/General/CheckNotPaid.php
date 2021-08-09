<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;

class CheckNotPaid extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //
        $project=Project::findOrFail($id);
        $project->update([
            'delivery'=>1,
            'payment'=>0,
        ]);
        return redirect()->back()->with('status','Successfully marked as unpaid');

    }
}
