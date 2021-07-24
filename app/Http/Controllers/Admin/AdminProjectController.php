<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Citation;
use App\Models\Descipline;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProjectController extends Controller
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
        return  view('admin.task.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $citation=Citation::pluck('name','id')->all();
        $field=Descipline::pluck('name','id')->all();
        $writer=User::where('role_id',3)->where('status_id', 1)->pluck('name','id')->all();
        return  view('admin.task.create', compact('citation', 'field','writer'));
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
            'title'=>'required|max:255',
            'citation_id'=>'required',
            'descipline_id'=>'required',
            'instruction'=>'required',
            'materials'=>'',
            'materials.*'=>'max:10000',
            'writer_id'=>'',
            'deadline'=>'required',
            'words'=>'required',
            'cost'=>'required'
        ]);
        $deadline=Carbon::parse($request->deadline);
        $writer_deadline=Carbon::parse($request->deadline)->diffInSeconds(Carbon::now());

        $wret=$writer_deadline*0.3;

        $deadlineWriter=$deadline->subSeconds($wret);



        $project=Project::create([
            'title'=>$validated['title'],
            'citation_id'=>$validated['citation_id'],
            'discipline_id'=>$validated['descipline_id'],
            'client_id'=>Auth::id(),
            'instruction'=>$validated['instruction'],
            'writer_id'=>$validated['writer_id'],
            'writer_delivery'=>$deadlineWriter,
            'client_delivery'=>$deadline,
            'words'=>$validated['words'],
            'cost'=>$validated['cost']
        ]);
        if($files=$request->file('materials')) {
            foreach ($files as $file){

                $project->addMedia($file)->toMediaCollection('materials');
            }
        }
        return  redirect('admin/homepage/task');
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
}
