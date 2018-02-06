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

/**
* Main page route 'middleware' => 'web'
*/
Route::group([], function (){
	//pages menu z regUserSender
	Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
 
    Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);
    //Route::match(['get'],'/',['uses'=>'IndexController@execute','as'=>'home']);
 
     //admin
     // Route::auth();
	});
/**
* AdminPanel page route
*/

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

//Route::get('/', 'IndexController@execute')->name('home');
// Route::get('call-request/form', 'CallRequestController@form')->name('call_request_form');
//Route::get('/', ['uses'=>'HomeController@index','as'=>'admin'])->name('home'); 

		
/**
* Admin page route
*/

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){

 	 	
/**
* WITH RESOURCE
*/
Route::resource('pages', 'PagesController');
Route::resource('logos', 'LogosController');
Route::resource('socials', 'SocialysController');
Route::resource('socialPeoples', 'SocialPeoplesController');
Route::resource('portfolios', 'PortfoliosController');	
Route::resource('services', 'ServicesController');
Route::resource('peoples', 'PeoplesController');	    
	 
});	
