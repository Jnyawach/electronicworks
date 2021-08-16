<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders=Project::all();
        $store=Store::first();
        $writers=User::where('role_id', 3)
            ->where('condition',1)->get();
        return view('admin.accounts.index', compact('orders','store','writers'));
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
            'amount'=>'required|max:25',
            'trans_code'=>'required|max:25',
            'writer'=>'required|max:25'
        ]);
        $user=User::findOrFail($validated['writer']);

        $user->payment()->create([
            'amount'=>$validated['amount'],
           'trans_code'=>$validated['trans_code'],
           'authorized_by_id'=>Auth::id(),
       ]);
       $user->withdrawFloat($validated['amount']);
       //Send email to user
       return redirect()->back()->with('status','Writer Paid Successfully');
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
        $writer=User::findOrFail($id);
        return view('admin.accounts.show', compact('writer'));
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
}
