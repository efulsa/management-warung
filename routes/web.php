<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',function () {
    if(!empty(Auth::user()->role) == 'admin'){
        return redirect()->route('admin.dashboard');
    }if(!empty(Auth::user()->role) == 'customer'){
        return redirect()->route('user.dashboard');
    }else{
        return redirect()->route('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Admin Page
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Backend\Admin',
    // 'middleware' => ['auth']
    ], function () {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('customer', 'UserController@index')->name('user');
    Route::get('customer/dtTableCustomer','UserController@dtTableCustomer')->name('dtTableCustomer');
    Route::post('customer', 'UserController@store')->name('user.store');
    Route::get('customer/show', 'UserController@show')->name('user.show');
    Route::get('customer/show/{id}', 'UserController@show');
    Route::get('customer/detail', 'UserController@detail')->name('user.detail');
    Route::get('customer/detail/{id}', 'UserController@detail');
    Route::get('customer/dtTableDetail', 'UserController@dtTableDetail')->name('dtTableDetail');
    Route::get('customer/dtTableDetail/{id}', 'UserController@dtTableDetail');
    Route::get('customer/edit', 'UserController@edit')->name('user.edit');
    Route::get('customer/edit/{id}', 'UserController@edit');
    Route::post('customer/update', 'UserController@update')->name('user.update');
    Route::post('customer/delete', 'UserController@destroy')->name('user.delete');

    Route::get('transaction', 'TransactionController@index')->name('transaction');
    Route::post('transaction', 'TransactionController@store')->name('transaction.store');
    Route::get('getTrans', 'TransactionController@getTrans')->name('getTrans');
    Route::get('transaction/dtTableTrans', 'TransactionController@dtTableTrans')->name('dtTableTrans');

    Route::get('setting', 'SettingController@edit')->name('setting.edit');
    Route::post('setting', 'SettingController@update')->name('setting.update');

    Route::get('print', 'DashboardController@print')->name('print');
});

// User Page
Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'Backend\User',
    // 'middleware' => ['auth']
    ], function () {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('transaction','TransactionController@index')->name('transaction');
});
