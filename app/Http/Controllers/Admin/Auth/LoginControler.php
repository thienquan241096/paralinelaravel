<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginControler extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.login');
    }
}