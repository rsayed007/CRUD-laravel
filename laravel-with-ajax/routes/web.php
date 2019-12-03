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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/create', 'HomeController@createUser')->name('create.user');
Route::get('/get/user/data', 'HomeController@getData')->name('user.data');

// ajax url
Route::get('/view/user/data', 'HomeController@viewData')->name('view.data');
Route::get('/edit/user/data', 'HomeController@editData')->name('edit.data');
Route::get('/delete/user/data', 'HomeController@deleteData')->name('view.data');
Route::post('/update/user/data', 'HomeController@updateData')->name('update.user');


Route::get('/hello', 'UserInfoController@index')->name('hello');
Route::post('import/data', 'UserInfoController@importData')->name('import');
