<?php

namespace App\Http\Controllers\Admin\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard.index');
    }
}