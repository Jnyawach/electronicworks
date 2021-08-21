<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $refunds=Auth::user()->refunds()
        ->paginate(10);
        return view('dashboard.refund.index', compact('refunds'));
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
            'evidence'=>'',
            'evidence.*'=>'max:10000',
            'reason'=>'required',
            'project'=>'required'
        ]);
        $project=Project::findOrFail($validated['project']);
        if ($refund=Refund::where('project_id',$project->id)->get()){
            return redirect()->back()->with('status', 'Return claim exists for this order');
        }else{
            $evidence=$project->refund()->create([
                'reason'=>$validated['reason'],
                'amount'=>$project->client_pay,
                'user_id'=>Auth::id(),
            ]);
            if($files=$request->file('evidence')) {
                $evidence->addMedia($files)->toMediaCollection('evidence');

            }
            return redirect()->back()->with('status', 'Request Successful');
        }



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
        $project=Project::findBySlugOrFail($id);
        return  view('dashboard.refund.show', compact('project'));
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
