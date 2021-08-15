<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects=Project::where('writer_id',Auth::id())->get();
        $refund=$projects->where('refund','>',0)->sum('refund');
        $total=$projects->where('delivery',1)->sum('writer_pay');
        $unpaid=Project::where('writer_id',Auth::id())->where('progress_id',4)->where('delivery',1)
        ->where('payment',0)->count();
        return  view('freelancer.finances.index',
            compact('projects', 'unpaid','refund','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated=$request->validate([
          'amount'=>'required|max:10'
        ]);
        $amount=number_format($validated['amount'],2);
        if ($amount>Auth::user()->balanceFloat*0.8){
            return redirect()->back()->with('status','Withdrawal greater than the allowed 80% maximum amount. Please edit
            and submit again');
        }
        $withdraw=Withdraw::create([
            'user_id'=>Auth::id(),
            'amount'=>$amount,

        ]);
        return redirect()->back()->with('status','Withdrawal request successfully submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  function writerUnpaid(){
        $projects=Project::where('writer_id', Auth::id())->where('progress_id',4)
            ->where('delivery',1)
            ->where('payment',0)->get();
        $refund=Project::where('writer_id', Auth::id())->where('refund','>',0)->sum('refund');
        $total=Project::where('writer_id', Auth::id())->where('delivery',1)->sum('writer_pay');
        return view('freelancer/finances/writer-unpaid', compact('projects','total','refund'));
    }

    public  function writerPaid(){
        $projects=Project::where('writer_id', Auth::id())->where('progress_id',4)->where('delivery',1)
            ->where('payment',1)->get();
        $unpaid=Project::where('writer_id',Auth::id())->where('progress_id',4)->where('delivery',1)
            ->where('payment',0)->count();
        $refund=Project::where('writer_id', Auth::id())->where('refund','>',0)->sum('refund');
        $total=Project::where('writer_id', Auth::id())->where('delivery',1)->sum('writer_pay');
        return view('freelancer/finances/writer-paid', compact('projects','unpaid','total','refund'));
    }

    public  function writerRefund(){
        $projects=Project::where('writer_id', Auth::id())->where('progress_id',4)->where('delivery',1)
            ->where('payment',2)->where('refund','>',0)->get();
        $unpaid=Project::where('writer_id',Auth::id())->where('progress_id',4)->where('delivery',1)
            ->where('payment',0)->count();
        $refund=Project::where('writer_id', Auth::id())->where('refund','>',0)->sum('refund');
        $total=Project::where('writer_id', Auth::id())->where('delivery',1)->sum('writer_pay');
        return view('freelancer/finances/writer-refund', compact('projects','unpaid','total','refund'));
    }
}
