<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Essay;
use App\Models\EssayWriting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EssayTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->essay==null){
            $essay=Essay::inRandomOrder()->limit(1)->get();
            return  view('essay_test.index', compact('essay'));
        }
        return redirect('congratulations');

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
        $user=Auth::user();
        if ($user->essay()->exists()){
            return redirect('congratulations');
        }else{


        $validated=$request->validate([
            'essay_body' => 'required|min:3',
            'essay_id' => 'required|min:1|max:5',
        ]);

        $user->update(['condition'=>1,]);

        if($user->essay()->exists()){
            $user->essay()->update([
                'essay_body'=>$validated['essay_body'],
                'essay_id' => $validated['essay_id'],

            ]);

            return redirect('congratulations');
        }

        $user->essay()->create([
            'essay_body'=>$validated['essay_body'],
            'essay_id' => $validated['essay_id'],
        ]);
        $user->revokePermissionTo('incomplete-writer');
        $user->givePermissionTo('complete-writer');
            Mail::send('emails.application', ['mess'=>$user], function ($message) use($user){
                $message->to($user->email);
                $message->from('nyawach41@gmail.com');
                $message->subject('Application Received');

            });
        return redirect('congratulations');
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
