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

//每個route都要寫name命名
Route::get('/user','userController@userView')->name('getUserView');

Route::get('/form','userController@getFormData')->name('getForm');

Route::get('/getUserData','userController@index')->name('getUserData');

Route::post('/form', 'UserController@addData')->name('add');

Route::get('/editUserData','userController@selectUserData')->name('editUserData');

Route::post('/deleteUserData','userController@deleteUserData')->name('delete');

