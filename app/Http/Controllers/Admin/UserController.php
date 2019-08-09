<?php

namespace RegistrashunSystem\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RegistrashunSystem\Http\Controllers\Controller;
use RegistrashunSystem\User;
use Illuminate\Support\Facades\Auth;
use RegistrashunSystem\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            Alert::warning('Warning Title', 'You are not allowed to edit yourself Nwanne!!');
            return redirect()->route('admin.users.index');
        }

        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
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
        if (Auth::user()->id == $id) {
            Alert::warning('Kaii', 'You are not allowed to edit yourself Nwanne!!');
            return redirect()->route('admin.users.index');
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);
        Alert::success('Success Title', 'User role has been updated')->position('top-left')->showConfirmButton('Oya', 'red');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            Alert::warning('Kaii', 'You are not allowed to Delete yourself Nwanne!!');
            return redirect()->route('admin.users.index');
        }

        User::destroy($id);
        Alert::success('Success Title', 'User has been Deleted!!');
        return redirect()->route('admin.users.index');
    }
}
