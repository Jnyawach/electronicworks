<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;

use App\Models\Bidding;
use App\Models\Citation;
use App\Models\Descipline;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ManagerProjectController extends Controller
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
        return  view('manager.work.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $project=Project::latest()->first();
        $citation=Citation::pluck('name','id')->all();
        $field=Descipline::pluck('name','id')->all();
        $writer=User::permission('activated-writer')->role('Writer')->pluck('name','id')->all();
        return  view('manager.work.create',
            compact('citation', 'field','writer','project'));
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
            'deadline'=>'required',
            'words'=>'required',


        ]);
        $deadlineWriter=$request->deadline*0.75;
        $dead=Carbon::now()->addHour($deadlineWriter);
        $deadline=Carbon::now()->addHour($request->deadline);

        $project=Project::create([
            'title'=>$validated['title'],
            'citation_id'=>$validated['citation_id'],
            'descipline_id'=>$validated['descipline_id'],
            'client_id'=>Auth::id(),
            'instruction'=>$validated['instruction'],
            'writer_id'=>0,
            'writer_delivery'=>$dead,
            'client_delivery'=>$deadline,
            'words'=>$validated['words'],
            'status'=>1,
            'progress_id'=>1,
            'deadline'=>$validated['deadline'],


        ]);
        $project->update(['sku'=>'EL00'.$project->id]);


        if($files=$request->file('materials')) {
            $project->addMedia($files)->toMediaCollection('materials');

        }
        return  redirect('manager/work/manager-select')->with('status','Project created successfully');

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
        return  view('manager.work.show', compact('project'));
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
        $writer=User::permission('activated-writer')->role('Writer')->pluck('name','id')->all();
        return view('manager.work.edit', compact('project','citation', 'field','writer'));
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


        ]);
        $deadlineWriter=$request->deadline*0.75;
        $dead=Carbon::now()->addHour($deadlineWriter);
        $deadline=Carbon::now()->addHour($request->deadline);

        $project=Project::findOrFail($id);
        $invoice=Invoice::where('status', 1)->get()->last();
        $project->update([
            'title'=>$validated['title'],
            'citation_id'=>$validated['citation_id'],
            'descipline_id'=>$validated['descipline_id'],
            'client_id'=>Auth::id(),
            'instruction'=>$validated['instruction'],

            'writer_delivery'=>$dead,
            'client_delivery'=>$deadline,
            'words'=>$validated['words'],
            'status'=>1,
            'deadline'=>$validated['deadline'],
            'invoice_id'=>$invoice->id,
        ]);


        if($files=$request->file('materials')) {
            if ($project->getMedia('materials')->count()>0){
                $project->clearMediaCollection('materials');
                $project->addMedia($files)->toMediaCollection('materials');
            }else{
                $project->addMedia($files)->toMediaCollection('materials');
            }

        }
        return  redirect('manager/homepage/work')->with('status','Project Updated successfully');
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
    public function allocate(Request $request,$id){
        $project=Project::findOrFail($id);
        $bid=Bidding::findOrFail($request->bid);
        $deadlineWriter=$project->deadline*0.75;
        $dead=Carbon::now()->addHour($deadlineWriter);
        $deadline=Carbon::now()->addHour($project->deadline);
        $project->update([
            'writer_id'=>$request->writer,
            'progress_id'=>2,
            'writer_pay'=>$bid->amount,
            'client_pay'=>$bid->cost,
            'earning'=>$bid->cost-$bid->amount,
            'writer_delivery'=>$dead,
            'client_delivery'=>$deadline,
        ]);
        $user=User::findOrfail($request->writer);
        Mail::send('emails.assign', ['user'=> $user], function ($message) use($user){
            $message->to($user->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('Please Proceed');

        });
        return redirect()->back()->with('status','Assigned Successfully');
    }

    public function relocate(Request $request,$id){
        $project=Project::findOrFail($id);
        $deadlineWriter=$project->deadline*0.75;
        $dead=Carbon::now()->addHour($deadlineWriter);
        $deadline=Carbon::now()->addHour($project->deadline);
        $project->update([
            'writer_id'=>0,
            'progress_id'=>1,
            'writer_pay'=>0,
            'client_pay'=>0,
            'earning'=>0,
            'writer_delivery'=>$dead,
            'client_delivery'=>$deadline,
        ]);
        $user=User::findOrfail($request->writer);
        Mail::send('emails.unassigned', ['user'=> $user], function ($message) use($user){
            $message->to($user->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('Project Unassigned');


        });
        return redirect()->back()->with('status','Unassigned Successfully');

    }
    public function managerSelect(){
        $project=Auth::user()->projects()->where('progress_id',1)->latest()->first();

        $writers=User::role('Writer')->permission('activated-writer')->get();
        return  view('manager/work/manager-select', compact('writers','project'));
    }
    public  function managerWriter(Request $request, $id){
        $project=Project::findOrFail($id);
        $project->update([
            'writer_id'=>$request->writer,
            'progress_id'=>8,
        ]);
        $user=User::findOrfail($request->writer);
        Mail::send('emails.pre_assign', ['user'=> $user,'project'=>$project], function ($message) use($user,$project){
            $message->to($user->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('You have a Pre-Assigned Task-'.$project->sku);
        });
        return  redirect('manager/homepage/work')->with('status','Project Created and Pre-assigned to'.$user->name);
    }
}
