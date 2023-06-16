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
    return view('home');
});

Route::group(['middleware' => ['auth']], function () {
Route::get('/home', 'PageController@home');
Route::get('/profile', 'PageController@profile');
Route::get('/student', 'PageController@student');
Route::get('/contact', 'PageController@contact');
Route::get('/student/formadd', 'PageController@formadd');
Route::get('/student/search', 'PageController@search');
Route::post('/student/save', 'PageController@save');
Route::get('/student/formedit/{id}', 'PageController@formedit');
Route::put('/student/update/{id}', 'PageController@update');
Route::get('/student/delete/{id}', 'AuthController@delete');
Route::get('/logout', 'AuthController@logout');


});

Route::group(['middleware' => ['guest']], function () {
Route::get('/register', 'AuthController@register');
Route::post('/simpan', 'AuthController@simpan');
Route::get('/', 'AuthController@login')->middleware('guest')->name('login');
Route::post('/ceklogin', 'AuthController@ceklogin');
});

Route::get('/task', function () {
    return view('task');
    });
    

Route::get('/index', function () {
    return view('index');
});