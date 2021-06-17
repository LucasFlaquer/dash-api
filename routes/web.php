<?php

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
//    return view('welcome');
    $a = 'hi';
    $b = 2;
    $c = 3;
    $d = $b + $c;
    return response()->json(['hello'=> 'world', 'sum'=>$d]);
});
