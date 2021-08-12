<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects=Project::where('client_id', Auth::id())->get();
        return  view('dashboard.client-invoice.index',
            compact('projects'));
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

    public  function client_unpaid(){

        $projects=Project::where('progress_id',4)->where('delivery',1)
            ->where('payment',0)
            ->where('client_id', Auth::id())->get();
        return view('dashboard/client-invoice/client-unpaid', compact('projects'));
    }

    public  function client_paid(){

        $projects=Project::where('progress_id',4)->where('delivery',1)
            ->where('payment',1)
            ->where('client_id', Auth::id())->get();
        return view('dashboard/client-invoice/client-paid', compact('projects'));
    }

    public  function client_refund(){

        $projects=Project::where('progress_id',4)->where('delivery',1)
            ->where('payment',2)->where('refund','>',0)
            ->where('client_id', Auth::id())->get();
        return view('dashboard/client-invoice/client-refund', compact('projects'));
    }

}
