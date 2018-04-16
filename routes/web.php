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

Route::redirect('/home', '/');
Route::redirect('/','/');

Auth::routes();



Route::get('/', 'Web\PageController@index')->name('home');
Route::get('/contacto', function(){
	
	return view('Web.contacto');
});
