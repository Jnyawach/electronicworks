<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $submissions=Submission::where('evaluation_id',1)->get();
        return  view('admin.task.asses.index', compact('submissions'));
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
        $project=Project::findBySlugOrFail($id);
        return  view('admin.task.asses.show', compact('project'));
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
          $submission=Submission::findOrFail($id);
          $project=Project::findOrFail($request->project);
        if (is_null($request->reason)){
            $client=User::findOrFail($request->client);
            $submission->update(['evaluation_id'=>$request['evaluation_id']]);
            Mail::send('emails.submitted', ['mess'=> $submission,'client'=>$client], function ($message) use( $submission,
                $client){
                $message->to($client->email);
                $message->from(Auth::user()->email);
                $message->subject('Submitted');

            });
            return redirect()->back();
        }else{
            $writer=User::findOrFail($request->writer);
            $submission->update(
                [
                    'evaluation_id'=>$request['evaluation_id'],
                    'reason'=>$request['reason'],
                ]);
            Mail::send('emails.revise',
                ['mess'=> $submission,'client'=>$writer,'project'=>$project],
                function ($message) use( $submission,$project,
                $writer){
                $message->to($writer->email);
                $message->from('nyawach41@gmail.com');
                $message->subject($project->sku.':Revision');

            });
            return redirect()->back();
        }


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
