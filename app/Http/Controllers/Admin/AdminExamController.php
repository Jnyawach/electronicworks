<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ExamCategory;
use App\Models\Examination;
use Illuminate\Http\Request;


class AdminExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizes=Examination::paginate(20);
        return  view('admin.exam.index', compact('quizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=ExamCategory::pluck('name', 'id')->all();
        return  view('admin.exam.create', compact('category'));
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
            'quiz' => 'required',
            'choice_a' => 'required',
            'choice_b' => 'required',
            'choice_c' => 'required',
            'answer' => 'required',
            'category_id'=>'required',

        ]);

        $exam=Examination::create([
            'quiz' => $validated['quiz'],
            'choice_a' => $validated['choice_a'],
            'choice_b' => $validated['choice_b'],
            'choice_c' => $validated['choice_c'],
            'answer' => $validated['answer'],
            'category_id'=>$validated['category_id'],
        ]);
        return redirect('admin/homepage/exam')->with('status', 'Question Successfully added');
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
        $exam=Examination::findOrFail($id);
        $category=ExamCategory::pluck('name', 'id')->all();
        return  view('admin.exam.edit', compact('exam', 'category'));
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
        $exam=Examination::findOrFail($id);
        $validated = $request->validate([
            'quiz' => 'required',
            'choice_a' => 'required',
            'choice_b' => 'required',
            'choice_c' => 'required',
            'answer' => 'required',
            'category_id'=>'required',

        ]);

        $exam->update([
            'quiz' => $validated['quiz'],
            'choice_a' => $validated['choice_a'],
            'choice_b' => $validated['choice_b'],
            'choice_c' => $validated['choice_c'],
            'answer' => $validated['answer'],
            'category_id'=>$validated['category_id'],
        ]);
        return redirect('admin/homepage/exam')->with('status', 'Question Successfully updated');

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
        $exam=Examination::findOrFail($id);
        $exam->delete();
        return redirect('admin/homepage/exam')->with('status', 'Question Successfully deleted');
    }
}
