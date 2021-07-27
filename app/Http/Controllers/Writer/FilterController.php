<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class FilterController extends Controller
{
    //
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $projects=QueryBuilder::for(Project::class)
            ->allowedFilters(['title'])
            ->where('writer_id',0)
            ->where('status',1)
            ->paginate(10);
        return view('freelancer/project/filtered', compact('projects'));
    }
}
