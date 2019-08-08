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

Route::auth();

Route::get('/', ['as' => 'home', 'uses' => 'Auth\AppController@showHomePage']);

Route::get('/dashboard', ['as' => 'dashboard',  'uses' => 'Auth\AppController@showHomePage']);

Route::get('/register', 'Auth\RegisterController@showRegisterPage');

Route::get('/login', 'Auth\LoginController@showLoginPage');
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AppController@logoutUser']);

Route::get('/task', ['as' => 'task', 'uses' => 'Auth\TasksController@showTaskPage']);
Route::post('/task', 'TasksController@new');

Route::get('/task/{task}', 'TasksController@edit');
Route::post('/task/{task}', 'TasksController@update');

Auth::routes();

//API routes
Route::post('/api/register', ['as' => '/api/register',  'uses' => 'Auth\RegisterController@create']);
Route::post('/api/login', ['as' => '/api/login', 'uses' => 'Auth\LoginController@UserLogin']);


// Route::get('/home', 'HomeController@index')->name('home');
