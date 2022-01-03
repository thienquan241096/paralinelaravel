<?php

use App\Http\Controllers\Admin\Auth\LoginControler;
use App\Http\Controllers\Admin\DashBoard\DashBoardController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Group\GroupController;
use App\Http\Controllers\Admin\Team\TeamController;
use App\Http\Controllers\Backend\Users\UserController;
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

Route::name('backend.')->group(function () {
    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/', [UserController::class ,'index'])->name('show');
        Route::get('/create', 'App\Http\Controllers\Backend\Users\UserController@create')->name('create');
        Route::post('/store/user', 'App\Http\Controllers\Backend\Users\UserController@store')->name('store');
        Route::get('/view/{id}', 'App\Http\Controllers\Backend\Users\UserController@view')->name('view');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Users\UserController@edit')->name('edit');
        Route::patch('/update/user', 'App\Http\Controllers\Backend\Users\UserController@update')->name('update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Users\UserController@delete')->name('delete');
        Route::delete('/users/delete', 'App\Http\Controllers\Backend\Users\UserController@usersDelete')->name('users.delete');
        Route::get('/search', 'App\Http\Controllers\Backend\Users\UserController@search')->name('search');
    });

    Route::prefix('/role')->name('role.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Role\RoleController@index')->name('show');
        Route::get('/create', 'App\Http\Controllers\Backend\Role\RoleController@create')->name('create');
        Route::post('/store/user', 'App\Http\Controllers\Backend\Role\RoleController@store')->name('store');
        Route::get('/view/{id}', 'App\Http\Controllers\Backend\Role\RoleController@view')->name('view');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Role\RoleController@edit')->name('edit');
        Route::patch('/update/user', 'App\Http\Controllers\Backend\Role\RoleController@update')->name('update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Role\RoleController@delete')->name('delete');
        Route::delete('/users/delete', 'App\Http\Controllers\Backend\Role\RoleController@usersDelete')->name('role.delete');
        Route::get('/search', 'App\Http\Controllers\Backend\Role\RoleController@search')->name('search');
    });

    // Route::prefix('/customers')->name('customers.')->group(function () {
    //     Route::get('/', 'App\Http\Controllers\Backend\Customers\CustomerController@index')->name('show');
    //     Route::get('/create', 'App\Http\Controllers\Backend\Customers\CustomerController@create')->name('create');
    //     Route::post('/store/customer', 'App\Http\Controllers\Backend\Customers\CustomerController@store')->name('store');
    //     Route::get('/view/{id}', 'App\Http\Controllers\Backend\Customers\CustomerController@view')->name('view');
    //     Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Customers\CustomerController@edit')->name('edit');
    //     Route::patch('/update/customer', 'App\Http\Controllers\Backend\Customers\CustomerController@update')->name('update');
    //     Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Customers\CustomerController@delete')->name('delete');
    //     Route::delete('/customers/delete', 'App\Http\Controllers\Backend\Customers\CustomerController@customersDelete')->name('customers.delete');
    //     Route::get('/search', 'App\Http\Controllers\Backend\Customers\CustomerController@search')->name('search');
    // });
});