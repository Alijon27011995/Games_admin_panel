<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
// use Telegram;
use Telegram\Bot\Laravel\Facades\Telegram as FacadesTelegram;

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

//  Route::post('/dashboard', function() {
//     FacadesTelegram::sendMessage([
//         'chat_id' => '989898566',
//         'text' => 'Hello world!'
//     ]);
//     return;
// });


// Route::post('/bot/getupdates', function() {
//     $updates = FacadesTelegram::getUpdates();
//     return (json_encode($updates));
// });




Route::get('/dashboard','UserController@dashboard')->name('admin.dashboard');

// Route::get('/',function{
// Http::post()
// });

Route::get('/','UserController@main')->name('main.table');
Route::get('/news','UserController@news')->name('new.table');
Route::match(['get', 'post'],'/news/create', 'UserController@newsTable')->name('news.create');


Route::get('/login/form','UserController@login_blade')->name('admin.login');

Route::match(['get', 'post'],'/users/login', 'UserController@login_form')->name('user.login');
Route::get('/logout', 'UserController@logout')->name('logout');

//  product
Route::get('/product/table','UserController@productTable')->name('product.tables');
Route::match(['get', 'post'],'/product/table/create', 'UserController@create')->name('user.create');
Route::get('/product/show/{id}','UserController@productShow')->name('product.show');
Route::get('/product/table/edit/{id}','UserController@productEdit')->name('product.edit');
Route::post('/product/table/update','UserController@productUpdate')->name('product.update');
Route::get('/product/table/destroy/{id}','UserController@productDestroy')->name('product.destroy');


Route::get('/user/table/admin','UserController@productTableForUser')->name('product.tables_for_user');
Route::get('/user/table/user','UserController@productTableForUserNew')->name('product.tables_for_user_new');
Route::get('/user/table/front','UserController@productTableForUserNewFront')->name('product.tables_for_user_new_front');



// order
Route::get('/orders','OrderController@index')->name('orders.list');
Route::get('/order/show/{id}','OrderController@orderShow')->name('order.show');

// category
Route::get('/categories','CategoryController@index')->name('categories.list');
Route::match(['get', 'post'],'/category/table/create', 'CategoryController@create')->name('category.create');
Route::get('/category/table/edit/{id}','CategoryController@edit')->name('category.edit');
Route::post('/category/table/update','CategoryController@update')->name('category.update');
Route::get('/category/table/destroy/{id}','CategoryController@destroy')->name('category.destroy');



Route::get('/order/show/{id}','OrderController@orderShow')->name('order.show');

// Route::get('/order/history','OrderController@games_history')->name('games.history');




Route::get('/user/table/edit/{id}','UserController@edit')->name('customers.edit');
Route::post('/user/table/update','UserController@update')->name('user.update');

Route::get('/user/table/destroy/{id}','UserController@destroy')->name('customers.destroy');
Route::get('/user/table_history/destroy/{id}','UserController@user_history_destroy')->name('customer_history.destroy');







