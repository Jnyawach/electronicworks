<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;


use App\Models\Project;
use App\Models\Store;
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
        $store=Store::first();
        $client=User::findOrfail($project->client_id);
        $writer=User::findOrFail($project->writer_id);

        if($request->action==1){
            $client->forcetransferFloat($store,$project->client_pay);
            $store->forcetransferFloat($writer,$project->writer_pay);
            $project->update([
                'delivery'=>1,
                'payment'=>1,
                'refund'=>0,
                'earning'=>$project->client_pay-$project->writer_pay
            ]);


        }elseif ($request->action==0){
            $writer->forcetransferFloat($store,$project->writer_pay);
            $store->forcetransferFloat($client,$project->client_pay);
            $project->update([
                'delivery'=>1,
                'payment'=>0,
                'refund'=>0,
                'earning'=>0,
            ]);

        }elseif ($request->action==2){
            $writer->forcetransferFloat($store,$project->writer_pay);
            if ($wallet=$client->getWallet('refund')==null)
            {
                $name = 'refund';
                $client->createWallet(compact('name'));
            }
            $wallet=$client->getWallet('refund');
            $store->forcetransferFloat($wallet,$project->client_pay);
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
