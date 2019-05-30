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


//Page Controller
Route::get('/', 'Web\PageController@index')->name('home');
Route::get('/result', 'Web\PostController@index')->name('result');

Route::get('/getRegions/{id}', 'Web\PageController@getRegions')->name('getRegions');

Route::get('/postShow/{country}/{region_id}/{id}', 'Web\PostController@show')->name('postShow');

Route::post('/postboardStoreNewUser','Web\PostBoardController@storeNewUser')->name('PostBoardStoreNewUser');

Route::get('/postboardCreate','Web\PostBoardController@create')->name('PostBoardCreate');

Route::post('/messagesboardStore','Web\MessagesBoardController@store')->name('messageBoardStore');

Route::get('/getSubcategories/{id}','Web\PostBoardController@getSubcategories')->name('getSubcategories');


Route::group(['middleware'=>'auth'],function(){

//Post Board
    Route::get('/postboard/{id}','Web\PostBoardController@index')->name('PostBoardIndex');

    Route::post('/postboardStore','Web\PostBoardController@store')->name('PostBoardStore');

    Route::post('/postboardUpdate','Web\PostBoardController@update')->name('PostBoardUpdate');

    Route::get('/postboardShow/{id}','Web\PostBoardController@show')->name('PostBoardShow');

    Route::delete('/postBoardDestroy','Web\PostBoardController@destroy')->name('postboardDestroy');

//Revisor Board
    Route::get('/revisorboard/','Web\RevisorBoardController@index')->name('RevisorBoardIndex');

    Route::post('/revisorboardStore','Web\PostBoardController@store')->name('PostBoardStore');

    Route::post('/revisorboardUpdate','Web\PostBoardController@update')->name('PostBoardUpdate');

    Route::post('/revisorboardPublicate','Web\RevisorBoardController@publicate')->name('PostBoardPublicate');

    Route::post('/revisorboardDiscarted','Web\RevisorBoardController@discarted')->name('PostBoardDiscarted');

    Route::get('/revisorboardShow/{id}','Web\PostBoardController@show')->name('PostBoardShow');

    Route::delete('/revisorBoardDestroy','Web\PostBoardController@destroy')->name('postboardDestroy');
//Message Board

    Route::get('/messagesboard/{id}','Web\MessagesBoardController@index')->name('messageBoardIndex');

    Route::get('/messagesboardShow/{id}/{tipo}','Web\MessagesBoardController@show')->name('messageBoardShow');

    Route::post('/messagesboardUpdate','Web\MessagesBoardController@update')->name('messageBoardupdate');

    Route::delete('/messagesboardDestroy','Web\MessagesBoardController@destroy')->name('messageBoardDestroy');





});



Route::get('/contacto', function(){
	
	return view('Web.contacto');
});
