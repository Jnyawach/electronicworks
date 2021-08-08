<?php

namespace App\Http\Controllers\manager;
use App\Http\Controllers\Controller;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManagerNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notifications=Notification::paginate(10);
        return  view('manager.manager-notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('manager.manager-notification.create');
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
            'status'=>'required|max:5',
            'title'=>'required|max:255',
            'body'=>'required'
        ]);

        $notification=Notification::create($validated);
        if(isset($request->email)){
            $users=User::where('status_id',1)->where('role_id', $request->email)->get();
            foreach ($users as $user){
                Mail::send('emails.notification', ['mess'=>$notification,'user'=>$user], function ($message) use
                ($notification,$user){
                    $message->to($user->email);
                    $message->from('nyawach41@gmail.com');
                    $message->subject($notification->title);


                });
            }
        }
        return redirect('manager/homepage/manager-notification')->with('status','Notification successfully created');
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
        $notification=Notification::findOrFail($id);
        return view('manager.manager-notification.edit', compact('notification'));
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
            'status'=>'required|max:5',
            'title'=>'required|max:255',
            'body'=>'required'
        ]);

        $note=Notification::findOrFail($id);
        $notification=$note->update();
        if(isset($request->email)){
            $users=User::where('status_id',1)->where('role_id', $request->email)->get();
            foreach ($users as $user){
                Mail::send('emails.notification', ['mess'=>$notification,'user'=>$user], function ($message) use
                ($notification,$user){
                    $message->to($user->email);
                    $message->from('nyawach41@gmail.com');
                    $message->subject($notification->title);


                });
            }
        }
        return redirect('manager/homepage/manager-notification')->with('status','Notification successfully created');
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
