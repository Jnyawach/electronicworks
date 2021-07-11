<?php

namespace App\Http\Controllers\Allusers;
use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //

        $writer=User::findOrFail($id);
        $validated = $request->validate([
            'password' => 'required|min:8|max:16|confirmed',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            'password_confirmation' => 'required|max:16|min:8',

        ]);
        $writer->update([
            'password' => Hash::make($validated['password']),

        ]);
        return redirect()->back()->with('status', 'Password Successfully Changed');


    }
}
