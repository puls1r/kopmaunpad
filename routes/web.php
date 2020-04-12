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

Route::get('/', 'HomeController@index');

//penjualan
Route::get('/penjualan', 'PenjualanController@index');
Route::get('/penjualan/input' , 'PenjualanController@dataDiri');
Route::post('/penjualan/input', 'PenjualanController@barang');
Route::post('/saveTunai', 'PenjualanController@storeTunai');
Route::post('/saveKredit', 'PenjualanController@storeKredit');
Route::get('/invoice', 'PenjualanController@showInvoice');
Route::get('/checkout','PenjualanController@checkout');
Auth::routes();