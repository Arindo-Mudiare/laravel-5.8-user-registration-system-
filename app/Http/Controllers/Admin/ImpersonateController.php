<?php

namespace RegistrashunSystem\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RegistrashunSystem\Http\Controllers\Controller;
use RegistrashunSystem\User;

class ImpersonateController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            session()->put('impersonate', $user->id);
        }

        return redirect('/home');
    }
    public function destroy()
    {
        session()->forget('impersonate');

        return redirect('/home');
    }
}
