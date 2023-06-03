<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // if (auth()->check() && auth()->user()->hasRoles(3)) {
        //     $roles = Role::all();
        //     $users = User::query()->filter(request(['members', 'staffs', 'search', 'roles']))->orderBy('name', 'asc')->get();
        // } else {
        //     $roles = Role::all();
        //     $users = User::query()->filter(request(['members', 'staffs', 'search', 'roles']))->orderBy('name', 'asc')->get();
        // }


        $currentUser = auth()->user();
        $isCeo = $currentUser->hasRole(3);
        if ($isCeo) {
            // Current user is CEO, fetch all users
            $users = User::query()->filter(request(['members', 'staffs', 'search', 'roles']))->orderBy('name', 'asc')->get();
            $roles = Role::all();
        } else {
            // Current user is not CEO, fetch users excluding the CEO role
            $ceoRoleId = Role::where('name', 'ceo')->first()->id;
            $users = User::whereDoesntHave('roles', function ($query) use ($ceoRoleId) {
                $query->where('role_id', $ceoRoleId);
            })
                ->orderBy('name', 'asc')
                ->filter(request(['members', 'staffs', 'search', 'roles']))
                ->get();
            $ceoRoleName = 'ceo';

            $roles = Role::whereNotIn('name', [$ceoRoleName])->get();
        }
        return view('backend/users/index', compact('users', 'roles'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        $seletedRoles =  $user->roles->pluck('id')->toArray();
        return view('backend/users/edit', compact('roles', 'user', 'seletedRoles'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->syncRoles($request->get('roles'));

        return redirect('/backend/users')->with('message', 'Updated Successfully');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return view('/backend/users')->with('message', 'Deleted A User.');
    }
}
