<?php

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

Route::get('/', [ 'as' => 'login', 'uses' => 'ViewController@index']);
Route::get('logout','ViewController@getLogout');
Route::post('signing','ViewController@signin');
Route::get('view','Users\UsersController@view');
Route::post('create','Users\UsersController@create');

Route::prefix('users')->middleware('auth')->group(function () {

    Route::post('/','Users\UsersController@index');
    Route::post('/check','Users\UsersController@Users');
    Route::get('/view/details','Users\UsersController@Viewuser');
    Route::get('/update','Users\UsersController@updateuser');
    Route::post('/create','Users\UsersController@create');
    Route::post('/create2','Users\UsersController@create2');
    Route::get('/delete','Users\UsersController@delete');
    Route::post('/items','Users\UsersController@view_item');
    Route::get('/item/particular','Users\UsersController@particular_item');
    Route::get('/tokens','Users\UsersController@alltokens');

});

Route::prefix('election')->middleware('auth')->group(function () {

    Route::post('/','Election\ElectionController@view');
    Route::post('/check','Election\ElectionController@results');
    Route::get('/view/details','Election\ElectionController@Viewelectionpose');
    Route::get('/update','Election\ElectionController@updateelection');
    Route::post('/create','Election\ElectionController@createelection');
    Route::get('/winner','Election\ElectionController@winner');
    Route::get('/candidatevotes','Election\ElectionController@candidatevotes');
    Route::get('/item/particular','Users\UsersController@particular_item');

});