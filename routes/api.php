<?php

use Illuminate\Http\Request;

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

Route::resource('rss', 'RsController');
Route::get('token', 'IndexController@token');
Route::group(['middleware' => ['jwt.auth']], function () {
    Route::resource('projects', 'ProjectController');
    Route::resource('tree', 'TreeController');
    Route::resource('items', 'ItemController');
    Route::resource('versions', 'VersionController');
    Route::resource('documents', 'DocumentController');
});