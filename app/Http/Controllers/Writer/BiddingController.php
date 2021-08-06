<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Bidding;
use App\Models\Costing;
use Illuminate\Http\Request;

class BiddingController extends Controller
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
        $validated=$request->validate([
            'amount'=>'required',
            'project_id'=>'required',
             'user_id'=>'required',
        ]);
        $percentile=Costing::latest()->first();
        $cost=number_format($validated['amount']*(100/$percentile->percentage),2);


        if($bid=Bidding::where('project_id', $request->project_id)
            ->where('user_id', $request->user_id)->exists()){
            $bidding=Bidding::where('project_id', $request->project_id)
                ->where('user_id', $request->user_id)->first();
            $bidding->update([
                'amount'=>$validated['amount'],
                'cost'=>$cost,
            ]);
            return  redirect()->back()->with('status','Bid edited succesfully');
        }else{
            $bid=Bidding::create([
                'project_id'=>$validated['project_id'],
                'user_id'=>$validated['user_id'],
                'amount'=>$validated['amount'],
                'cost'=>$cost
            ]);
            return  redirect()->back()->with('status','Bid completed successfully');
        }

    }
}
