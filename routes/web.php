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
Route::post('/logout', 'UserController@logout')->name('logout');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/register-store', 'UserController@registerStore')->name('register.store');


Route::group(['prefix' => 'api'], function () {
    Route::post('/police-station', 'PoliceStationController@getPoliceStationName')->name('police.station.name');
    Route::post('/post-office', 'PostOfficeController@getPostOfficeName')->name('post.office.name');
    Route::post('/union', 'UnionController@getUnionName')->name('union.name');
});


Route::group(['prefix' => 'admin/'], function () {
    Route::get('/login', 'UserController@adminLogin')->name('admin.login');
});

Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('user.dashboard');
    Route::get('/blood-request', 'BloodRequestController@bloodRequest')->name('user.blood.request');
    Route::post('/blood-request-store', 'BloodRequestController@bloodRequestStore')->name('user.blood.request.store');
    Route::get('/{id}/blood-request-view', 'BloodRequestController@bloodRequestView')->name('request.view');
    Route::get('/{id}/blood-request-accept', 'BloodRequestController@bloodRequestAccept')->name('request.accept');
});
