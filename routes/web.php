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
})->middleware('auth');

Route::resource('admin', 'AdminController');
Route::get('admin/update/forms', 'AdminController@updateForm')->name('admin.update.forms');
Route::post('admin/edit/form', 'AdminController@editForm')->name('admin.edit.form');
Route::post('admin/change/column', 'AdminController@changeColumn')->name('admin.change.column');
Route::post('admin/search', 'AdminController@search')->name('admin.search');
Route::get('admin/reset/column/{form_id}', 'AdminController@resetColumn')->name('admin.reset.column');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
