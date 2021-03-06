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

Route::get('/api', function () {
    return view('api');
});

Route::get('/vueSelect', function () {
    return view('vueSelect');
});

Route::get('/validation', function () {
    return view('validation');
});

Route::get('/card', function () {
    return view('card');
});

Route::get('/user','userController@userView')->name('getUserView');

Route::get('/form','userController@getFormData')->name('getForm');

Route::get('/getUserData','userController@index')->name('getUserData');

Route::post('/form', 'UserController@addData')->name('add');

Route::get('/editUserData','userController@selectUserData')->name('editUserData');

Route::post('/deleteUserData','userController@deleteUserData')->name('delete');

Route::post('/updateUserData','userController@updateUserData')->name('update');

Route::get('/channel','userController@getChannelData')->name('getChannelData');

Route::post('/saveChannel','userController@saveChannelData')->name('saveChannelData');

Route::get('/text','userController@getTextLength')->name('getTextLength');

Route::get('/test','userController@TestCode');

Route::get('/formUserData','FormController@getFormUserData')->name('getFormUserData');

Route::get('/courseSubChannels','ChannelsController@selectCourseSubChannels')->name('getCourseSubChannelsData');

Route::get('/getKeyWord','ChannelsController@getKeyWordChannelsData')->name('getKeyWordChannelsData');

Route::get('/testFunction','userController@testFunction');

Route::get('/elastic','sqlController@testElastic');

Route::get('/testCode','FormController@laravelTestCode');

Route::POST('/sendValidation','FormController@validationUser')->name('sendValidation');

Route::get('/getAppScript','AppScriptController@addChannelData');

Route::get('/ie', 'IeController@getData');

Route::post('/save', 'IeController@saveData')->name('save');

Route::get('/radio', 'FormController@getRadioData');