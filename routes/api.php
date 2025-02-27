<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
   
});


Route::post('/login','App\Http\Controllers\apiController@login');
Route::get('/getData','App\Http\Controllers\apiController@index');

Route::get('/phpfirebase_sdk','App\Http\Controllers\FirebaseController@index');