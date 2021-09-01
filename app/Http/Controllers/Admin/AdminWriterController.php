<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Models\WriterDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $writers=User::role('writer')->get();
        $active=$writers->where('status_id', 1);
        return view('admin.writer.index', compact('writers', 'active'));
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

        return  view('admin.writer.create', compact('status', 'role'));
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
            'score'=>'required|max:3',
            'cert'=>'required',
            'cert.*'=>'image|mimes:jpeg,png,jpg,pdf|max:2048',
            'identity'=>'required',
            'identity.*'=>'image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $user=User::create([
            'name'=>$validated['name'],
            'last_name'=>$validated['last_name'],
            'email'=>$validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id'=>$validated['role_id'],
            'cellphone'=>$validated['cellphone'],
            'sec_cellphone'=>$validated['sec_cellphone'],
            'status_id'=>$validated['status_id'],
            'level_id'=>1,
        ]);

        $writerDetails=WriterDetail::create([
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
            'score'=>$validated['score'],
            'user_id'=>$user->id,

        ]);
        $user->assignRole('Writer');
        $user->givePermissionTo('complete-writer');
        if($file=$request->file('cert')) {

            $writerDetails->addMedia($request->cert)->toMediaCollection('cert');
        }

        if($file=$request->file('identity')) {

            $writerDetails->addMedia($request->identity)->toMediaCollection('identity');
        }


        return redirect('admin/homepage/writer')->with('status', 'Writer Added');

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
        return view('admin.writer.show', compact('writer'));
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
        return  view('admin.writer.edit', compact('writer'));
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
            'score'=>'required|max:3',
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
            'score'=>$validated['score'],
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

        return redirect('admin/homepage/writer')->with('status', 'Writer Updated');
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
        $writer=User::findOrFail($id);
        $writer->delete();
        return redirect()->back()->with('status','Writer Successfully deleted');
    }
}
