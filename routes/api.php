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
//tampil data
Route::get('/mahasiswa/read', 'mhsAPIcontroller@read');
//menampilkan data
Route::post('/mahasiswa/create', 'mhsAPIcontroller@create');
//edit data
Route::post('/mahasiswa/update/{id}', 'mhsAPIcontroller@update');
//hapus data
Route::delete('/mahasiswa/delete/{id}', 'mhsAPIcontroller@delete');

Route::get('/task/read','TaskController@read');
Route::post('/task/create','TaskController@create');
Route::post('/task/update/{id}','TaskController@update');
Route::delete('/task/delete/{id}','TaskController@delete');