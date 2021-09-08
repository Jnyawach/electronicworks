<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;

use App\Models\Refund;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DeclineRefundRequest extends Controller
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
        $user=User::findOrFail($refund->user_id);
        $validated=$request->validate([
           'reason'=>'required'
        ]);
        $refund->update([
           'reject_reason'=>$validated['reason'],
            'authority_id'=>Auth::id(),
            'status'=>2,
        ]);
        Mail::send('emails.refund_decline', ['refund'=> $refund,'client'=> $user], function ($message)
        use($refund,  $user){
            $message->to( $user->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('Refund Approved-'. $refund->project->sku);


        });
        return redirect()->back()->with('status','Refund Decline Initiated Successfully');
    }
}
