<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Notification;
use Illuminate\Http\Request;

class NoteController extends Controller
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
        $note=Notification::findOrFail($id);

        $note->update([
            'status'=>$request['status'],
        ]);
        return redirect()->back()->with('status','Successfully Updated');

    }
}
