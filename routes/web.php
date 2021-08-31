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
    Route::post('/login', [LoginControler::class, 'postLogin'])->name('postLogin');
    Route::get('/logout', [LoginControler::class, 'getLogout'])->name('getLogout');

    Route::name('dashboard.')->middleware('checkLogin')->group(function () {
        Route::get('/dashboard', [DashBoardController::class, 'index'])->name('index');
    });

    Route::prefix('group')->name('group.')->middleware('checkLogin')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('index');
        Route::get('/search', [GroupController::class, 'getSearch'])->name('search');

        Route::get('/view', [GroupController::class, 'view'])->name('view');

        Route::get('/add', [GroupController::class, 'getAdd'])->name('getAdd');
        Route::post('/add_confirm', [GroupController::class, 'postAdd'])->name('postAdd');

        Route::get('/edit/{id}', [GroupController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit_confirm', [GroupController::class, 'postEdit'])->name('postEdit');

        Route::get('/delete', [GroupController::class, 'delete'])->name('getDelete');
    });

    Route::prefix('team')->name('team.')->middleware('checkLogin')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/search', [TeamController::class, 'getSearch'])->name('search');

        Route::get('/view', [TeamController::class, 'view'])->name('view');

        Route::get('/add', [TeamController::class, 'getAdd'])->name('getAdd');
        Route::post('/add_confirm', [TeamController::class, 'postAdd'])->name('postAdd');

        Route::get('/edit/{id}', [TeamController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit_confirm', [TeamController::class, 'postEdit'])->name('postEdit');

        Route::get('/delete', [TeamController::class, 'delete'])->name('getDelete');
    });

    Route::prefix('employee')->name('employee.')->middleware('checkLogin')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::get('/search', [EmployeeController::class, 'getSearch'])->name('search');

        Route::get('/view', [EmployeeController::class, 'view'])->name('view');

        Route::get('/add', [EmployeeController::class, 'getAdd'])->name('getAdd');
        Route::post('/add_confirm', [EmployeeController::class, 'postAdd'])->name('postAdd');

        Route::get('/edit/{id}', [EmployeeController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit_confirm', [EmployeeController::class, 'postEdit'])->name('postEdit');

        Route::get('/delete', [EmployeeController::class, 'delete'])->name('getDelete');
    });
});