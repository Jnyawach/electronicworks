<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminAssignController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //
        $role=Role::findOrFail($request->role);
        $permission=Permission::findOrFail($id);
        $role->givePermissionTo($permission);
        return  redirect()->back()->with('status','Permission assigned successfully');

    }
}
