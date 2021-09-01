<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public  function  __construct()
    {
        $this->middleware(function ($request,$next) {
            if (Auth::user()->status_id==2){
                return  redirect('congratulations');
            }elseif (Auth::user()->status_id==5){
                return  redirect('declined');
            }elseif (Auth::user()->status_id==4){
                return  redirect('deactivated');
            }
            return $next($request);
        });

    }
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
