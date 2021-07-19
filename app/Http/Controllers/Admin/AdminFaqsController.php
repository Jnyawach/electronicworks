<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\FaqCategory;
use App\Models\Faqs;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class AdminFaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=FaqCategory::all();
        return view('admin.faqs.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=FaqCategory::pluck('name', 'id');
        return  view('admin.faqs.create', compact('category'));
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
            'category_id' => 'required','max:3',
            'question' => 'required', 'max:255',
            'answer' => 'required',
        ]);
        $faq=Faqs::Create([
            'category_id'=>$validated['category_id'],
            'question'=>$validated['question'],
            'answer'=>$validated['answer']

    ]);

        return  redirect('admin/homepage/faqs')->with('status', 'Question Successfully added');
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
        $faq=Faqs::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));

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
