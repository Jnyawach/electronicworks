<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\WriterDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
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

    public function index()
    {
        //
        $user=User::findOrFail(Auth::id());

        return view('freelancer.index', compact('user'));


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
        $writer=User::findOrFail($id);
        return  view('freelancer.show', compact('writer'));
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
        $writer=User::findOrFail($id);
        return  view('freelancer.edit', compact('writer'));
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
        $user=User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|',
            'role_id'=>'required',
            'cellphone'=>'max:12',
            'sec_cellphone'=>'max:12',
            'status_id'=>'required',
            'gender'=>'required|max:255',
            'language'=>'required|max:255',
            'night_calls'=>'required|max:10',
            'country'=>'required|max:255',
            'city'=>'required|max:255',
            'zip'=>'required|max:50',
            'university'=>'required|max:255',
            'department'=>'required|max:255',
            'course'=>'required|max:255',
            'graduation'=>'required|max:5',
            'cert'=>'',
            'cert.*'=>'image|mimes:jpeg,png,jpg,pdf|max:2048',
            'identity'=>'',
            'identity.*'=>'image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
        $user->update([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'email'=>$validated['email'],
            'role_id'=>$validated['role_id'],
            'cellphone'=>$validated['cellphone'],
            'sec_cellphone'=>$validated['sec_cellphone'],
            'status_id'=>$validated['status_id']
        ]);

        $user->detail()->update([
            'gender'=>$validated['gender'],
            'language'=>$validated['language'],
            'night_calls'=>$validated['night_calls'],
            'country'=>$validated['country'],
            'city'=>$validated['city'],
            'zip'=>$validated['zip'],
            'university'=>$validated['university'],
            'department'=>$validated['department'],
            'course'=>$validated['course'],
            'graduation'=>$validated['graduation'],
            'user_id'=>$user->id,
        ]);
        $detail=WriterDetail::where('user_id', $id)->first();


        if($file=$request->file('cert')) {
            if ($detail->getMedia('cert')->count()>0){
                $detail->clearMediaCollection('cert');
                $detail->addMedia($request->cert)->toMediaCollection('cert');
            }else{
                $detail->addMedia($request->cert)->toMediaCollection('cert');
            }

        }
        if($file=$request->file('identity')) {
            if ($detail->getMedia('identity')->count()>0){
                $detail->clearMediaCollection('identity');
                $detail->addMedia($request->identity)->toMediaCollection('identity');
            }else{
                $detail->addMedia($request->identity)->toMediaCollection('identity');
            }

        }

        return redirect('freelancer')->with('status', 'Writer Updated');
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
