<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','HomeController@login_blade')->name('admin.login');

Route::get('/dashboard','HomeController@dashboard')->name('admin.dashboard');

Route::match(['get', 'post'],'/users/login', 'HomeController@login_form')->name('user.login');


Route::match(['get', 'post'],'/user/table/create', 'UserController@create')->name('user.create');


Route::get('/games/table','UserController@table')->name('user.tables');
// Route::get('/user/table/create','UserController@create')->name('user.create');
Route::get('/user/table/edit/{id}','UserController@edit')->name('customers.edit');
Route::post('/user/table/update','UserController@update')->name('user.update');

Route::get('/user/table/destroy/{id}','UserController@destroy')->name('customers.destroy');






Route::get('/games/history','HomeController@games_history')->name('games.history');
