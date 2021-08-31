<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class DisableUser extends Controller
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
        $client=User::findOrFail($id);
        $client->update(['status_id'=>$request->status_id]);
        return redirect()->back()->with('status', 'User status changed');

    }
}
