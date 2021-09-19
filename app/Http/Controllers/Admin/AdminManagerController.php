<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;


class AdminManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::role('Manager')->get();
        return  view('admin.administrator.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.administrator.create');
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
        $pass=$request->password;

        $validated=$request->validate([
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
            'sec_cellphone'=>'required|max:16',


        ]);
        $user=User::create([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'email'=>$validated['email'],
            'password' => Hash::make($validated['password']),
            'sec_cellphone'=>$validated['sec_cellphone'],
            'cellphone'=>$validated['cellphone'],
            'status_id'=>1,
        ]);

        $user->assignRole('Manager');
        $user->givePermissionTo('activated-manager');
        Mail::send('emails.manager', ['user'=>$user, 'pass'], function ($message) use($user, $pass){
            $message->to($user->email);
            $message->from('nyawach41@gmail.com');
            $message->subject('Administrator Account setup');


        });
        return  redirect('admin/homepage/administrator')->with('status','Users successfully created');
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
        return  view('admin.administrator.show', compact('user'));
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
        return  view('admin.administrator.edit', compact('user'));

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
        return  redirect('admin/homepage/administrator')->with('status','User updated successfully');
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
        $user=User::findOrFail($id);
        $user->delete();
        return  redirect('admin/homepage/administrator')->with('status','User deleted');
    }
}
