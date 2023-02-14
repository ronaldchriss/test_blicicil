<?php

use App\Http\Controllers\printNota;
use App\Http\Controllers\Transaction;
use App\Http\Controllers\transactionDetail;
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

Route::get('/', function () {
    return view('app');
});

Route::controller(Transaction::class)->prefix('transaction')->group(function(){
    Route::get('/', 'index')->name('transaction');
    Route::get('/{code}', 'get')->name('transaction.get');
    Route::post('/store','store')->name('transaction.store');
    Route::post('/update/{code}','update')->name('transaction.update');
    Route::get('/delete/{code}','delete')->name('transaction.delete');
});

Route::controller(transactionDetail::class)->prefix('transactionDetail')->group(function(){
    Route::get('/{code}', 'index')->name('transactionDetail');
    Route::get('/get/{code}', 'get')->name('transactionDetail.get');
    Route::post('/store','store')->name('transactionDetail.store');
    Route::post('/update/{code}','update')->name('transactionDetail.update');
    Route::get('/delete/{code}','delete')->name('transactionDetail.delete');
});

Route::controller(printNota::class)->prefix('printNota')->group(function(){
    Route::get('/{code}', 'print')->name('printNota');
});
