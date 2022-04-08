<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.all-users.index', compact('users'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.all-users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }
    public function isBlock(User $user)
    {
        if(auth()->user()->id == $user->id){
            return back()->with('error', 'You can not kill yourself!');
        }
        $user->is_block = $user->is_active? 0 : 1;
        $user->save();
        return back()->with('success', 'User Status Changed Successfuly!');

    }
    public function changeRole(Request $request, User $user)
    {
        if(auth()->user()->id == $user->id){
            return back()->with('error', 'you are not allow to do this!');
        }

        // if($user->role_id !=1){
        //     return back()->with('error', 'you are not allow to do this!');
        // }
        $request->validate([
            'role_id'=> 'required'
        ]);
        // return [' $request'=> $request->all(), '$user' => $user];
        $user->role_id = $request->role_id;
        $user->save();
        return back()->with('success', 'Role Changed Successfuly!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
