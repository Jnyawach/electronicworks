<?php

namespace App\Http\Controllers\manager;
use App\Http\Controllers\Controller;

use App\Models\Essay;
use Illuminate\Http\Request;

class ManagerEssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $essays=Essay::all();
        return  view('manager.test.manager-essay.index',compact('essays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('manager.test.manager-essay.create');
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
        $validated = $request->validate([
            'words' => 'required','max:255',
            'delivery' => 'required', 'max:255',
            'title' => 'required',
        ]);
        $essay=Essay::create([
            'words'=>$validated['words'],
            'delivery'=>$validated['delivery'],
            'title'=>$validated['title'],
        ]);
        return redirect('manager/test/manager-essay')->with('status', 'Task Successfully added');
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
        $essay=Essay::findOrFail($id);
        return  view('manager.test.manager-essay.edit', compact('essay'));
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
        $essay=Essay::findOrFail($id);
        $validated = $request->validate([
            'words' => 'required','max:255',
            'delivery' => 'required', 'max:255',
            'title' => 'required',
        ]);
        $essay->update([
            'words'=>$validated['words'],
            'delivery'=>$validated['delivery'],
            'title'=>$validated['title'],
        ]);
        return redirect('manager/test/manager-essay')->with('status', 'Task Successfully updated');
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
