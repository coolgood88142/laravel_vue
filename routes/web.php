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

Route::get('/city', function () {
    return view('city');
});

Route::get('/date', function () {
    return view('date');
});

Route::get('/btn', function () {
    return view('button');
});

Route::get('/style', function () {
    return view('style');
});

Route::get('/user', function () {
    return view('user');
});

Route::get('/user','userController@userView');

Route::get('/form','userController@getFormData')->name('getForm');

Route::get('/getUserData','userController@index');

Route::post('/form', 'UserController@addData')->name('add');

Route::get('/editUserData','userController@selectUserData');

Route::post('/deleteUserData','userController@deleteUserData')->name('delete');

