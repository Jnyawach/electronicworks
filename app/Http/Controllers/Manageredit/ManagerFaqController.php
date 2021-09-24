<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;

use App\Models\FaqCategory;
use App\Models\Faqs;
use Illuminate\Http\Request;

class ManagerFaqController extends Controller
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
        return view('manager.manager-faqs.index', compact('categories'));

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
        return  view('manager.manager-faqs.create', compact('category'));
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
            'faq_category_id' => 'required','max:3',
            'question' => 'required', 'max:255',
            'answer' => 'required',
        ]);

        $faq=Faqs::create([
            'faq_category_id'=>$validated['faq_category_id'],
            'question'=>$validated['question'],
            'answer'=>$validated['answer']

        ]);

        return  redirect('manager/homepage/manager-faqs')->with('status', 'Question Successfully added');
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
        $category=FaqCategory::pluck('name', 'id');
        $faq=Faqs::findOrFail($id);
        return view('manager.manager-faqs.edit', compact('faq','category'));

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
        $faq=Faqs::findOrFail($id);
        $validated = $request->validate([
            'faq_category_id' => 'required','max:3',
            'question' => 'required', 'max:255',
            'answer' => 'required',
        ]);
        $faq->update([
            'faq_category_id'=>$validated['faq_category_id'],
            'question'=>$validated['question'],
            'answer'=>$validated['answer']

        ]);
        return  redirect('manager/homepage/manager-faqs')->with('status', 'Question Successfully updated');
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
        $faqs=Faqs::findOrFail($id);
        $faqs->delete();
        return  redirect()->back()->with('status','FAQS Deleted Successfully');
    }
}
