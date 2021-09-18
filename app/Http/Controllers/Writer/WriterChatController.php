<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WriterChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $projects=$user->jobs()->where('progress_id',2)
         ->orWhere('progress_id',5)->get();
        $activeChat=$user->jobs()->where('progress_id',2)
            ->orWhere('progress_id',5)->latest()->first();
        return  view('freelancer.chat.index', compact('projects','activeChat'));
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
            'body'=>'required',
            'project'=>'required|numeric',
            'receiver'=>'required'
        ]);
        $project=Project::findOrfail($validated['project']);
      $message=Message::create([
          'project_id'=>$validated['project'],
          'body'=>$validated['body'],
          'sender_id'=>Auth::id(),
          'receiver_id'=>$validated['receiver'],

      ]);
      return redirect()->back();
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
