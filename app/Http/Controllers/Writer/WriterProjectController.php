<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Descipline;
use App\Models\Project;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class WriterProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects=Project::where('status', 1)->where('progress_id', 1)->paginate(10);
        return  view('freelancer.project.index', compact('projects'));
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
        $project=Project::findBySlugOrFail($id);
        $clientProject=Project::where('client_id', $project->client_id)->get()->count();
        $active=Project::where('client_id', $project->client_id)->where('status', 1)->where('writer_id', 0)
                ->get()->count();
        return view('freelancer.project.show', compact('project', 'clientProject', 'active'));
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

    public  function filters($id){
        $category=Descipline::findBySlugOrFail($id);
        $projects=Project::where('descipline_id',$category->id)->where('status', 1)->where('writer_id', 0)
            ->paginate(10);

        return view('freelancer/project/categories', compact('projects','category'));

    }
}
