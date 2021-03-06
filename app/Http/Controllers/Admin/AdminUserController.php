<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins=User::role('Admin')->get();
        $client=User::role('Client')->get()->count();
        $writer=User::role('Writer')->get()->count();
        return view('admin.user.index', compact('admins','client','writer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return  view('admin.user.create');
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
            'cellphone'=>'required|max:16',
            'sec_cellphone'=>'required|max:16'

        ]);

        $user=User::create([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'email'=>$validated['email'],
            'password' => Hash::make($validated['password']),
            'status_id'=>1,
            'sec_cellphone'=>$validated['sec_cellphone'],
            'cellphone'=>$validated['cellphone'],
        ]);
        $user->assignRole('Admin');
        return redirect('admin/homepage/user')->with('status', 'Admin User Created');

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
        return  view('admin.user.show', compact('user'));
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
        $user= User::findOrFail($id);

        return  view('admin.user.edit', compact('user'));
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
        $validated=$request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'cellphone'=>'required|max:16',
            'sec_cellphone'=>'required|max:16'


        ]);
        $user->update([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'sec_cellphone'=>$validated['sec_cellphone'],
            'cellphone'=>$validated['cellphone'],

        ]);
        return redirect('admin/homepage/user')->with('status', 'Admin User updated');
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
        $user= User::findOrFail($id);
        $user->delete();
        return redirect('admin/homepage/user')->with('status', 'Admin User Deleted');

    }
}
