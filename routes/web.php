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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','TopPageController@show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('scss', function(){
    return view('for-scss');
});
//ユーザー側
Route::group(['middleware' => 'auth'], function(){
	Route::get('/mycart', 'StockController@myCart');
	Route::post('/mycart', 'StockController@addMycart');
	Route::post('/cartdelete','StockController@deleteCart');
	Route::post('/checkout', 'StockController@checkout');
});
Route::get('/stock', 'StockController@index');
//管理側
Route::group(['prefix' => 'admin' , 'middleware' => ['auth.admin']], function () {
	Route::get('/top', 'admin\AdminTopController@show');
	Route::post('/logout', 'admin\AdminLogoutController@logout');
	Route::get('/user_list', 'admin\ManageUserController@showUserList');
	Route::get('/user/{id}', 'admin\ManageUserController@showUserDetail');
});
Route::resource('adminstock', 'admin\AdminStockController',['except' => 'show'])->middleware('auth.admin');
//管理側ログイン
Route::get('/admin/login', 'admin\AdminLoginController@showLoginform');
Route::post('/admin/login', 'admin\AdminLoginController@login');

Auth::routes();

