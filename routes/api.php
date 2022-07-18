<?php

use App\Http\Controllers\API\ApianimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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
Route::post('login', 'App\Http\Controllers\API\ApianimeController@login');
Route::group(['middleware'=>'auth:sanctum'], function() {
    route::resource('anime', ApianimeController::class);
    route::post('anime/{id}', [ApianimeController::class,'update']);
});
