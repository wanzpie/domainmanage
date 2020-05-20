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
    return redirect(route('listdomain.index'));
});

    Route::resource('listdomain', 'domainController', ['except' => 'show']);
    Route::get('listdomain/variation', ['as' => 'listdomain.variation', 'uses' => 'domainController@variation']);
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);
