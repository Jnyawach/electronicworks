<?php

namespace App\Http\Controllers;


use App\Models\Descipline;
use App\Models\Project;
use App\Models\Review;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fields=Descipline::inRandomOrder()->take(25)->get();
        $users=User::role('writer')->count();
        $project=Project::all()->count();
        if (Auth::check()){
            if (Auth::user()->hasRole('Writer')){
                if (Auth::user()->hasPermissionTo('incomplete-writer')){
                    return  redirect('registration/writer_details');
                }
            }

        }
        return  view('welcome', compact('fields', 'users','project'));
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

    public  function about(){
        $writer_count=User::role('Writer')->count();
        $projects=Project::all();
        $fields=Descipline::all();
        $reviews=Review::latest()->take(4)->get();
        $review_stats=Review::all();
        return view('about-us', compact('writer_count','projects','fields','reviews','review_stats'));
    }

}
