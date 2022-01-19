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


Route::get('/',function () {
    return view('admin.tables.basic_table');
});

// Route::match(['get', 'post'], '/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');



Route::get('/games/table','UserController@table')->name('user.tables');
Route::get('/user/table/create','UserController@create')->name('user_table.create');
Route::get('/user/table/update/{id}','UserController@update')->name('customers.update');
Route::get('/user/table/destroy/{id}','UserController@destroy')->name('customers.destroy');




// function () {

// })


Route::get('/new/user', function () {
    return view('admin.tables.basic_table_history');
})->name('add_new.user');
