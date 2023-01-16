<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('export-db', 'AppController@exportDB');

Route::prefix('columns')->group(function () {
    Route::get('', 'ColumnController@index');

    Route::post('', 'ColumnController@store');
    Route::get('{id}', 'ColumnController@show');
    Route::put('{id}', 'ColumnController@update');
    Route::delete('{id}', 'ColumnController@destroy');
});

Route::prefix('cards')->group(function () {
    Route::get('', 'CardController@index');

    Route::post('', 'CardController@store');
    Route::get('{id}', 'CardController@show');
    Route::put('{id}', 'CardController@update');
    Route::delete('{id}', 'CardController@destroy');
});
