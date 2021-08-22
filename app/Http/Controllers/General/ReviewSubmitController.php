<?php

namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewSubmitController extends Controller
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
        $validated=$request->validate([
            'stars'=>'required|max:1',
            'comment'=>'',
            'project'=>'required|max:25',
            'writer'=>'required|max:25',
        ]);
        $review=Review::create([
            'user_id'=>Auth::id(),
            'project_id'=>$validated['project'],
            'stars'=>$validated['stars'],
            'comment'=>$validated['comment'],
            'writer_id'=>$validated['writer'],
        ]);
        return redirect()->back()->with('status', 'Thank you for your Review');
    }
}
