<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WriterAssignController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //
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
        return  redirect('dashboard/jobs/assigned')->with('status','Project Created and Pre-assigned to'.$user->name);
    }
}
