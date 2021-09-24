<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManagerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $writers=User::role('Writer')->where('status_id',2)->get();
        return  view('manager/writer_application.index', compact('writers'));
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
        $client=User::findOrFail($id);
        return  view('manager.writer_application.show', compact('client'));
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
        $writer=User::findOrFail($id);
        $writer->update([
            'status_id'=>$request->status,

        ]);

        $writer->detail()->update([
            'score'=>$request->score,
        ]);
        if ($request->status==4){
            Mail::send('emails.rejected', ['mess'=>$writer], function ($message) use($writer){
                $message->to($writer->email);
                $message->from('nyawach41@gmail.com');
                $message->subject('Rejected');


            });
            return  redirect('manager/homepage/writer_application')->with('status', 'Writer Successfully Rejected');
        }elseif($request->status==1){
            $writer->update([
                'level_id'=>1,
            ]);
            $writer->givePermissionTo('activated-writer');

            Mail::send('emails.approved', ['mess'=>$writer], function ($message) use($writer){
                $message->to($writer->email);
                $message->from('nyawach41@gmail.com');
                $message->subject('Approved');
            });
            return  redirect('manager/homepage/writer_application')->with('status', 'Writer Successfully Approved');
        }else{
            return  redirect('manager/homepage/writer_application')->with('status', 'Please Recheck Application');
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
