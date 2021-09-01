<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Bidding;
use App\Models\Costing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiddingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public  function  __construct()
    {
        $this->middleware(function ($request,$next) {
            if (Auth::user()->status_id==2){
                return  redirect('congratulations');
            }elseif (Auth::user()->status_id==5){
                return  redirect('declined');
            }elseif (Auth::user()->status_id==4){
                return  redirect('deactivated');
            }
            return $next($request);
        });

    }
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
        $amount=number_format($validated['amount'],2);


        if($bid=Bidding::where('project_id', $request->project_id)
            ->where('user_id', $request->user_id)->exists()){
            $bidding=Bidding::where('project_id', $request->project_id)
                ->where('user_id', $request->user_id)->first();
            $bidding->update([
                'amount'=>$amount,
                'cost'=>$cost,
            ]);
            return  redirect()->back()->with('status','Bid edited succesfully');
        }else{
            $bid=Bidding::create([
                'project_id'=>$validated['project_id'],
                'user_id'=>$validated['user_id'],
                'amount'=>$amount,
                'cost'=>$cost
            ]);
            return  redirect()->back()->with('status','Bid completed successfully');
        }

    }
}
