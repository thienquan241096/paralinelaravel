<?php

use App\Http\Controllers\Admin\Auth\LoginControler;
use App\Http\Controllers\Admin\DashBoard\DashBoardController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Group\GroupController;
use App\Http\Controllers\Admin\Team\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginControler::class, 'index'])->name('getLogin');

    Route::name('dashboard.')->group(function () {
        Route::get('/dashboard', [DashBoardController::class, 'index'])->name('index');
    });

    Route::prefix('group')->name('group.')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('index');
    });

    Route::prefix('team')->name('team.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
    });

    Route::prefix('employee')->name('employee.')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
    });
});