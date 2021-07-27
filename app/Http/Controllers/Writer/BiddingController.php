<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Bidding;
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


        if($bid=Bidding::where('project_id', $request->project_id)
            ->where('user_id', $request->user_id)->exists()){
            return  redirect()->back()->with('status','Bid already submitted for this project');
        }else{
            $bid=Bidding::create([
                'project_id'=>$request['project_id'],
                'user_id'=>$request['user_id'],
            ]);
            return  redirect()->back()->with('status','Bid submitted successfully');
        }

    }
}
