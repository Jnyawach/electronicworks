<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Refund;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApproveRefundRequest extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //
        $refund=Refund::findOrFail($id);
        $refund->update([
            'status'=>1,
            'authority_id'=>Auth::id()
        ]);
        $project=Project::findOrFail($refund->project_id);
        $store=Store::first();
        $client=User::findOrfail($project->client_id);
        $writer=User::findOrFail($project->writer_id);
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
            'progress_id'=>7,
        ]);
        Mail::send('emails.refund', ['refund'=> $refund,'project'=> $project,'client'=> $client], function ($message)
        use($refund, $project, $client){
            $message->to( $client->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('Refund Declined-'. $project->sku);


        });

        return  redirect()->back()->with('status','Refund initiated successfully');

    }
}
