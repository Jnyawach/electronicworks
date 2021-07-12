<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Examination;
use App\Models\User;
use App\Models\WriterDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WriterRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($user = Auth::user()){
            return  redirect()->back();
        }
        return view('registration.index');
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
        $validated=$request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16|',
        ]);

        $user=User::create([
            'email'=>$validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id'=>3,
            'status_id'=>2,
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('regisration/writer_details');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


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
        return  view('registration.show');

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
        $user= User::findOrFail($id);


            $validated = $request->validate([
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'cellphone'=>'max:12',
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
                'cellphone'=>$validated['cellphone'],

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

            return redirect('english_test');

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
