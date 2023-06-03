<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create(['name' => $request->get('title')]);
        return redirect('/backend/roles')->with('message', 'Role Inserted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $role)
    {
        Role::destroy($role);
        return redirect('/backend/roles')->with('status', 'Deleted successfully');
    }
}
