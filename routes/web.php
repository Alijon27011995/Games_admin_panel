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




 //================= User Controller =======================
 
Route::get('/dashboard','UserController@dashboard')->name('admin.dashboard');


Route::get('/','UserController@login_blade')->name('admin.login');

Route::match(['get', 'post'],'/users/login', 'UserController@login_form')->name('user.login');



Route::match(['get', 'post'],'/user/table/create', 'UserController@create')->name('user.create');


Route::get('/games/table','UserController@games_table')->name('user.tables');
Route::get('/games/history','UserController@games_history')->name('games.history');



Route::get('/user/table/edit/{id}','UserController@edit')->name('customers.edit');
Route::post('/user/table/update','UserController@update')->name('user.update');

Route::get('/user/table/destroy/{id}','UserController@destroy')->name('customers.destroy');
Route::get('/user/table_history/destroy/{id}','UserController@user_history_destroy')->name('customer_history.destroy');







