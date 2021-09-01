<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;
use App\Models\Bidding;
use App\Models\Project;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Money\Currency;
use Money\Money;



class PendingProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  __construct()
    {
        $this->middleware(function ($request,$next) {
            if (Auth::user()->status_id==2){
                return  redirect('congratulations');
            }elseif (Auth::user()->status_id==5){
                return  redirect('declined');
            }elseif (Auth::user()->status_id==4){
                return  redirect('deactivated');
            }
            return $next($request);
        });

    }

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
            'comment'=>'',
            'attachment'=>'',
            'attachment.*'=>'max:10000',
        ]);
        if ($submission=Submission::where('project_id',$request->project)->first()){
            $submission->update([
                'project_id'=>$validated['project'],
                'user_id'=>$validated['writer'],
                'comment'=>$validated['comment'],
            ]);
        }else{
            $submission=Submission::create([
                'project_id'=>$validated['project'],
                'user_id'=>$validated['writer'],
                'comment'=>$validated['comment'],
            ]);
        }
        if($files=$request->file('attachment')) {
            if ($submission->getMedia('attachment')->count()>0){
                $submission->clearMediaCollection('attachment');
                $submission->addMedia($files)->toMediaCollection('attachment');
            }else{
                $submission->addMedia($files)->toMediaCollection('attachment');
            }

        }
        Mail::send('emails.assesing', ['mess'=> $submission], function ($message) use( $submission){
            $message->to('nyawach41@gmail.com');
            $message->from(Auth::user()->email);
            $message->subject('Submitted');

        });
        $project->update([
            'progress_id'=>3,
        ]);
        $user=User::findOrFail($project->client_id);
        $amount=$project->client_pay;
        $user->depositFloat($amount,['description'=>$project->sku]);



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
       $project=Project::findOrFail($id);
       $project->update([
           'writer_id'=>0,
           'progress_id'=>0
       ]);
       $bid=Bidding::where('user_id', Auth::id())->where('project_id',$id)->delete();
       return redirect('freelancer/project/pending')->with('status','Project Successfully Unclaimed');
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
