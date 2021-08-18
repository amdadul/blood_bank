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
    return redirect()->route('login');
});

//Auth::routes();

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@loginAttempt')->name('login.attempt');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/register', 'UserController@registerStore')->name('register.store');
Route::group(['prefix' => 'admin/'], function () {
    Route::get('/login', 'UserController@adminLogin')->name('admin.login');
});

Route::group(['middleware' => ['auth:web']], function () {

});

Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('user.dashboard');
});
