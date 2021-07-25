<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Citation;
use App\Models\Descipline;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Madnest\Madzipper\Madzipper;
use Spatie\MediaLibrary\Support\MediaStream;
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
            'cost'=>'required',

        ]);
      $deadlineWriter=$request->deadline*0.75;
      $dead=Carbon::now()->addHour($deadlineWriter);
      $deadline=Carbon::now()->addHour($request->deadline);

      if($request->writer_id !==0){
          $progress=2;
      }else{
          $progress=1;
      }


      $project=Project::create([
            'title'=>$validated['title'],
            'citation_id'=>$validated['citation_id'],
            'descipline_id'=>$validated['descipline_id'],
            'client_id'=>Auth::id(),
            'instruction'=>$validated['instruction'],
            'writer_id'=>$validated['writer_id'],
            'writer_delivery'=>$dead,
            'client_delivery'=>$deadline,
            'words'=>$validated['words'],
            'cost'=>$validated['cost'],
           'status'=>1,
          'progress_id'=>$progress
        ]);

      if($files=$request->file('materials')) {
          $project->addMedia($files)->toMediaCollection('materials');

        }
        return  redirect('admin/homepage/task')->with('status','Project created successfully');
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
        return  view('admin.task.show', compact('project'));
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
        $project=Project::findOrFail($id);
        $citation=Citation::pluck('name','id')->all();
        $field=Descipline::pluck('name','id')->all();
        $writer=User::where('role_id',3)->where('status_id', 1)->pluck('name','id')->all();
        return view('admin.task.edit', compact('project','citation', 'field','writer'));
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
            'cost'=>'required',

        ]);
        $deadlineWriter=$request->deadline*0.75;
        $dead=Carbon::now()->addHour($deadlineWriter);
        $deadline=Carbon::now()->addHour($request->deadline);

        if($request->writer_id ==0){
            $progress=1;
        }else{
            $progress=2;
        }
        $project=Project::findOrFail($id);
        $project->update([
            'title'=>$validated['title'],
            'citation_id'=>$validated['citation_id'],
            'descipline_id'=>$validated['descipline_id'],
            'client_id'=>Auth::id(),
            'instruction'=>$validated['instruction'],
            'writer_id'=>$validated['writer_id'],
            'writer_delivery'=>$dead,
            'client_delivery'=>$deadline,
            'words'=>$validated['words'],
            'cost'=>$validated['cost'],
            'status'=>1,
            'progress_id'=>$progress
        ]);

        if($files=$request->file('materials')) {
            if ($project->getMedia('materials')->count()>0){
                $project->clearMediaCollection('materials');
                $project->addMedia($files)->toMediaCollection('materials');
            }else{
                $project->addMedia($files)->toMediaCollection('materials');
            }

        }
        return  redirect('admin/homepage/task')->with('status','Project Updated successfully');


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

        $project=Project::findOrFail($id);
        $project->delete();
        return  redirect()->back()->with('Status','Project deleted successfully');


    }
}
