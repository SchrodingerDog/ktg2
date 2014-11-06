<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'root', 'uses'=>'NewsController@index'));
Route::get('/login', array('as'=>'login.loginGET', 'uses'=>'LoginController@loginGET'));
Route::post('/login', array('as'=>'login.loginPOST', 'uses'=>'LoginController@loginPOST'));

Route::get('/register', array('as'=>'login.registerGET', 'uses'=>'LoginController@registerGET'));
Route::post('/register', array('as'=>'login.registerPOST', 'uses'=>'LoginController@registerPOST'));

Route::get('/logout', array('as'=>'logout', 'uses'=>'LoginController@logout'));

Route::resource('news', 'NewsController');
Route::get('/news/{id}/delete', array('as'=>'news.delete', 'uses'=>'NewsController@delete'));