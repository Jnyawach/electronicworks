<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('contact.index');
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
        if (is_null($request->filter)){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'issue'=>'required|max:25',
                'subject'=>'required|max:255',
                'body'=>'required',
            ]);
            $mess=Contact::create([
                'name'=>$validated['name'],
                'status'=>0,
                'email'=>$validated['email'],
                'issue'=>$validated['issue'],
                'subject'=>$validated['subject'],
                'body'=>$validated['body'],
            ]);


            Mail::send('emails.contact', ['mess'=>$mess], function ($message) use($mess){
                $message->to($mess->email);
                $message->from('nyawach41@gmail.com');
                $message->subject($mess->subject);


            });

            return  redirect()->back()->with('status', 'Successfully received, we will get back to you');

        }else{
            return redirect()->back();
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
