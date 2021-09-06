<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/delete', [ApiController::class, 'delete']);

Route::get('checkGroup', [ApiController::class, 'checkAddGroup']);

Route::get('checkEditGroup', [ApiController::class, 'checkEditGroup']);

Route::get('checkTeam', [ApiController::class, 'checkAddTeam']);

Route::get('checkEditTeam', [ApiController::class, 'checkEditTeam']);

Route::post('checkEmployee', [ApiController::class, 'checkAddEmployee']);

Route::post('checkEditEmployee', [ApiController::class, 'checkEditEmployee']);