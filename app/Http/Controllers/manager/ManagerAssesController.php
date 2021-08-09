<?php

namespace App\Http\Controllers\manager;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Project;
use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManagerAssesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects=Project::where('progress_id',3)->get();
        return  view('manager.work.manager-asses.index', compact('projects'));
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
        return  view('manager.work.manager-asses.show', compact('project'));
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
            $project->update([
                'progress_id'=>4,
                'delivery'=>1,

            ]);

            Mail::send('emails.submitted', ['mess'=> $submission,'client'=>$client], function ($message) use(
                $submission,
                $client){
                $message->to('nyawach41@gmail.com');
                $message->from('cervekenya@gmail.com');
                $message->subject('Submitted');

            });
            return redirect('manager/homepage/manager-asses')->with('status','Project sent to client successfully');
        }else{
            $writer=User::findOrFail($request->writer);
            $submission->update(
                [
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

            $deadlineWriter=$request->deadline*0.75;
            $dead=Carbon::now()->addHour($deadlineWriter);
            $deadline=Carbon::now()->addHour($request->deadline);
            $project->update([
                'progress_id'=> 5,
                'writer_delivery'=>$dead,
                'client_delivery'=>$deadline,
            ]);
            return redirect('manager/homepage/manager-asses')->with('status','Project sent for revision');
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
