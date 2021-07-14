<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
Route::post('/auth/login', [AuthController::class, 'login']);
Route::group(['middleware'=> ['apiJwt']], function() {
    Route::get('/users', [UserController::class, 'index']);
});


//Route::post('/users', [UserController::class, 'store']);

//Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
//
////    Route::post('logout', 'AuthController@logout');
////    Route::post('refresh', 'AuthController@refresh');
////    Route::post('me', 'AuthController@me');
//});

//Route::middleware('auth:api')->get('/users', function (Request $request) {
//    return $request->user();
//});
