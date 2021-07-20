<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResponseController extends Controller
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
        $contact=contact::findOrFail($id);
        $contact->update(['response'=>$request->response]);
        Mail::send('emails.response', ['contact'=> $contact], function ($message) use( $contact){
            $message->to( $contact->email);
            $message->from('nyawach41@gmail.com');
            $message->subject ($contact->subject);

        });
       return redirect()->back()->with('status','Response Sent');
    }
}
