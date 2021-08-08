<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;

use App\Models\Ledger;
use App\Models\Project;
use Illuminate\Http\Request;

class CheckComplete extends Controller
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
        ]);
        $account=Ledger::latest()->first();
        $account->update([
            'balance'=>$project->client_pay+$account->balance,
            'writer'=>$project->writer_pay+$account->writer,
            'client'=>$project->client_pay+$account->client
        ]);
        return redirect()->back()->with('Successfully marked as complete');
    }
}
