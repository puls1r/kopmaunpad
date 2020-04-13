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
Route::post('/checkout','PenjualanController@checkout');

//pembayaran
Route::get('/pembayaran', 'PembayaranController@index');
Route::post('/submitPembayaran', 'PembayaranController@submitPembayaran');
Auth::routes();

//print
Route::get('/suratPerjanjian/{no_transaksi}', [ 'as' => 'suratPerjanjian', 'uses' => 'PrintPDF@suratPerjanjian']);
Route::get('printEx', function(){
    return view('surat_perjanjian');
});

//barang
Route::get('/listBarang','BarangController@index');
Route::get('/listBarang/input', 'BarangController@input');
Route::post('/listBarang/input', 'BarangController@store');