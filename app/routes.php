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


Route::get('/login', array('as'=>'user.loginGET', 'uses'=>'UsersController@loginGET'));
Route::post('/login', array('as'=>'user.loginPOST', 'uses'=>'UsersController@loginPOST'));
Route::get('/authenticate/{id}/{code}', array('as'=>'user.auth', 'uses'=>'UsersController@auth'));
Route::get('/profile', array('as'=>'user.edit', 'uses'=>'UsersController@edit'));
Route::put('/profile', array('as'=>'user.update', 'uses'=>'UsersController@update'));
Route::get('/register', array('as'=>'user.registerGET', 'uses'=>'UsersController@registerGET'));
Route::post('/register', array('as'=>'user.registerPOST', 'uses'=>'UsersController@registerPOST'));
Route::get('/logout', array('as'=>'user.logout', 'uses'=>'UsersController@logout'));
Route::get('/members', array('as'=>'user.index', 'uses'=>'UsersController@index'));

Route::resource('news', 'NewsController');
Route::get('/news/{id}/delete', array('as'=>'news.delete', 'uses'=>'NewsController@delete'));