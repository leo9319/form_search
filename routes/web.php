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

Auth::routes();

Route::get('/', function () {
	$form_name = 'GIC Clients';
    return view('welcome', compact('form_name'));
})->middleware('auth');

Route::resource('admin', 'AdminController');
Route::get('admin/update/forms', 'AdminController@updateForm')->name('admin.update.forms');
Route::post('admin/edit/form', 'AdminController@editForm')->name('admin.edit.form');
Route::post('admin/change/column', 'AdminController@changeColumn')->name('admin.change.column');
Route::post('admin/search', 'AdminController@search')->name('admin.search');
Route::get('admin/reset/column/{form_id}', 'AdminController@resetColumn')->name('admin.reset.column');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('search/form', 'SearchController@form')->name('search.form');
Route::post('search/form/results', 'SearchController@searchFormResults')->name('search.form.results');
