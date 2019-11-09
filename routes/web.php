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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return 'Hello';
});
/*
Route::get('/{user}', 'UserController@index');
*/

//Route::get('/{user}/registrar', 'UserController@create');
Route::get('/{user}/validar', 'UserController@show');

Route::resource('users', 'UserController');

/*
Route::group(['prefix'=>'{user}'], function($user){
    Route::get('/', ['as' => 'index', 'uses' => 'AccountController@index']);
    Route::get('/registrar', function () {
        return view('productView',array('user' => $user ));
    });
});
*/