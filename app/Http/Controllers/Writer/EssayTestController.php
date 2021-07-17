<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Essay;
use App\Models\EssayWriting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $essay=Essay::inRandomOrder()->limit(1)->get();
        return  view('essay_test.index', compact('essay'));
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
        $validated=$request->validate([
            'essay_body' => 'required|min:3',
            'essay_id' => 'required|min:1|max:5',
        ]);
        $user=Auth::user();

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
        return redirect('congratulations');
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
