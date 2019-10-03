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
	
	Auth::routes(['register' => false]);
	
	Route::get(
	  '/', function () {
		
		//TODO to be replace with ottica mancini index
		return view('welcome');
	});
	
	Route::middleware('auth')->group(
	  function () {
		  
		  //dashboard start
		  Route::get(
			'/dashboard', function () {
			  
			  return view('home');
			  
		  })->name('dashboard');
		  
		  //news index
		  Route::get('/news', 'NewsController@index')->name('news_index');
		  
		  //news create
		  Route::get('/news/create', 'NewsController@create')->name('news_create');
		  
		  //news store
		  Route::post('/news', 'NewsController@store')->name('news_store');
		  
		  //news edit
		  Route::get('/news/{news}/edit', 'NewsController@edit')->name('news_edit');
		  
		  //news update
		  Route::put('/news/{news}/edit', 'NewsController@update')->name('news_update');
		  
		  //news destroy
		  Route::delete('/news/{news}', 'NewsController@destroy')->name('news_destroy');
	  });
	
	

