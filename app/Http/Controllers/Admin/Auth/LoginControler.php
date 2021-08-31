<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControler extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.login');
    }

    public function postLogin(UserFormRequest $request)
    {
        $info = $request->only('email', 'password');

        if (Auth::attempt($info)) {
            return redirect()->route('admin.dashboard.index')->with('messages', 'Login success !!!');
        } else {
            return redirect()->route('admin.getLogin')->with('messages', 'Login failed !!!');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.getLogin')->with('messages', 'Logout success !!!');
    }
}