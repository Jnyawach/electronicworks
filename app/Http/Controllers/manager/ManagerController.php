<?php

namespace App\Http\Controllers\Manager;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        $projects=Project::all();
        $store=Store::first();
        $delayed=Project::where('writer_delivery','<',Carbon::now())->where('delivery',0)
            ->where('writer_id','>',0)->get();
        $writers=User::role('Writer')->permission('complete-writer')->where('status_id',2)->get()->count();

        $chart_options = [
            'chart_title' => 'Order By Months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Project',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'filter_field' => 'created_at',
            'filter_days' => 30,
        ];
        $chart1 = new LaravelChart($chart_options);
        return  view('manager.index',
            compact('users','projects','store'
                ,'delayed','writers','chart1'));

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
        $user=User::findOrFail($id);
        return  view('manager.show', compact('user'));
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
        $user=User::findOrFail($id);
        return  view('manager.edit',compact('user'));
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
        $validated=$request->validate([
            'name'=>'required|max:25',
            'last_name'=>'required|max:25',
            'cellphone'=>'required|max:25',
            'sec_cellphone'=>'required|max:25'
        ]);
        $user=User::findOrFail($id);
        $user->update([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'cellphone'=>$validated['cellphone'],
             'sec_cellphone'=>$validated['sec_cellphone']

        ]);

        return  redirect('manager')->with('status', 'Profile Updated Successfully');
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
