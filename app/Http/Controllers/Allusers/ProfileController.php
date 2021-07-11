<?php

namespace App\Http\Controllers\Allusers;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $validated = $request->validate([
            'avatar'=>'required',
            'avatar.*'=>'image|mimes:jpeg,png,jpg,|max:2048',
            'user_id'=>'required',
        ]);
        $user=User::findOrFail($validated['user_id']);

        if($file=$request->file('avatar')) {
            if ($user->getMedia('avatar')->count()>0){
                $user->clearMediaCollection('avatar');
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }else{
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }


        }
        return redirect()->back();
    }
}
