<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $projects=Project::all();
        $store=Store::first();
        $users=User::role('Writer')->get();
        $unpaid=Project::where('progress_id',4)->where('payment',0)->sum('client_pay');
        $earning=$projects->sum('client_pay');
        return  view('admin.accounts.order.index',
            compact('projects','store','users', 'unpaid','earning'));
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

    public  function unpaid(){
        $projects=Project::where('progress_id',4)->where('delivery',1)
            ->where('payment',0)->get();
        $store=Store::first();
        $unpaid=Project::where('progress_id',4)->where('delivery',0)->sum('client_pay');
        $earning=$projects->sum('client_pay');
        return view('admin/accounts/order/unpaid', compact('projects','store','unpaid','earning'));
    }

    public  function paid(){
        $projects=Project::where('progress_id',4)->where('delivery',1)
            ->where('payment',1)->get();
        $store=Store::first();
        $unpaid=Project::where('progress_id',4)->where('delivery',0)->sum('client_pay');
        $earning=$projects->sum('client_pay');
        return view('admin/accounts/order/paid', compact('projects','store','unpaid','earning'));
    }

    public  function refund(){
        $projects=Project::where('progress_id',4)->where('delivery',1)
            ->where('payment',2)->where('refund','>',0)->get();
        $store=Store::first();
        $unpaid=Project::where('progress_id',4)->where('delivery',0)->sum('client_pay');
        $earning=$projects->sum('client_pay');
        return view('admin/accounts/order/refund', compact('projects','store','unpaid','earning'));
    }
}
