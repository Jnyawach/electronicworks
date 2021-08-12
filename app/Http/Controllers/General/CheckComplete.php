<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;


use App\Models\Project;
use App\Models\User;
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
        $super_wallet=User::findOrFail(1);
        $client=User::findOrfail($project->client_id);
        $writer=User::findOrFail($project->writer_id);

        if($request->action==1){
            $project->update([
                'delivery'=>1,
                'payment'=>1,
                'refund'=>0,
                'earning'=>$project->client_pay-$project->writer_pay
            ]);
            $client->transferFloat($super_wallet,$project->client_pay);
            $super_wallet->transferFloat($writer,$project->writer_pay);

        }elseif ($request->action==0){
            $project->update([
                'delivery'=>1,
                'payment'=>0,
                'refund'=>0,
                'earning'=>0,
            ]);
        }elseif ($request->action==2){
            $project->update([
                'delivery'=>1,
                'payment'=>2,
                'refund'=>$project->writer_pay,
                'earning'=>0,
            ]);
        }

        return redirect()->back()->with('status','Successfully marked as paid');
    }
}
