<?php

namespace App\Http\Controllers\Writer;
use App\Http\Controllers\Controller;

use App\Models\Examination;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Element;

class EnglishTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->test==null){
            $english=Examination::inRandomOrder()->limit(15)->get();
            return view('english_test.index', compact('english'));
        }


        return redirect('essay_test');
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
        $user=Auth::user();

            $collect = []; // empty array for collect customised inputs

            foreach ($request->except('_token') as $input_key => $input_value) { // split input one by one

                $collect[] = array( //customised inputs
                    "id" => $input_key,
                    "value" => $input_value

                );
            }
            $result = json_encode($collect);
            if ($essay = $user->test()->exists()) {
                $user->test()->update([
                    'user_id' => Auth::id(),
                    'test' => $result,
                ]);
            } else {
                $user->test()->create([
                    'user_id' => Auth::id(),
                    'test' => $result,]);
            }

            return redirect('essay_test');

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
}
