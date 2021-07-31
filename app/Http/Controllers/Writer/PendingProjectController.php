<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PendingProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects=Project::where('status', 1)->where('progress_id', 2)
            ->where('writer_id', Auth::id())->paginate(10);
        return  view('freelancer.project.pending.index', compact('projects'));
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

        $project=Project::findOrFail($request->project);
        $validated=$request->validate([
            'project'=>'required|max:50',
            'writer'=>'required|max:50',
            'comment'=>'required',
            'attachment'=>'',
            'attachment.*'=>'max:10000',
        ]);
        $submission=Submission::create([
            'project_id'=>$validated['project'],
            'user_id'=>$validated['writer'],
            'comment'=>$validated['comment'],
        ]);
        if($files=$request->file('attachment')) {
            $submission->addMedia($files)->toMediaCollection('attachment');
        }
        Mail::send('emails.assesing', ['mess'=> $submission], function ($message) use( $submission){
            $message->to('nyawach41@gmail.com');
            $message->from(Auth::user()->email);
            $message->subject('Submitted');

        });
        $project->update([
            'progress_id'=>3,
        ]);
        return redirect('freelancer/project/evaluation');
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
        return  view('freelancer.project.pending.show', compact('project'));
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