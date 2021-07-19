<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqStatus extends Controller
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

        $faq=Faqs::findOrFail($id);

        $faq->update([
            'status'=>$request['status'],
        ]);
        return redirect()->back()->with('status','Successfully Updated');
    }
}
