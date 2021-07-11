<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=User::where('role_id', 2)->get();
        $active=$clients->where('status_id', 1);
        return view('admin.client.index', compact('clients','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status=Status::pluck('name', 'id')->all();
        $role=Role::pluck('name', 'id')->all();

        return  view('admin.client.create', compact('status', 'role'));
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
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16|confirmed',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            'password_confirmation' => 'required|max:16|min:8',
            'role_id'=>'required',
            'cellphone'=>'max:12',
            'sec_cellphone'=>'max:12',
            'status_id'=>'required',
        ]);


        $user=User::create([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'email'=>$validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id'=>$validated['role_id'],
            'cellphone'=>$validated['cellphone'],
            'sec_cellphone'=>$validated['sec_cellphone'],
            'status_id'=>$validated['status_id']
        ]);
        return redirect('admin/homepage/client')->with('status', 'Client Added');

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
        $client=User::findOrFail($id);
        return  view('admin.client.show', compact('client'));
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
        $status=Status::pluck('name', 'id')->all();
        $role=Role::pluck('name', 'id')->all();
        $client=User::findOrFail($id);

        return  view('admin.client.edit', compact('status', 'role','client'));
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

        //
        $user= User::findOrFail($id);
        if(trim($request->password)==''){
            $input=$request->except('password');
        }else{
            $input=$request->all();
            $input['password']=Hash::make($request->password);
        }
        $user->update($input);
        return redirect('admin/homepage/client')->with('status', 'Client updated');
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
         $client=User::findOrFail($id);
         $client->delete();
        return redirect('admin/homepage/client')->with('status', 'Client deleted');
    }


}
