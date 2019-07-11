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

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

/**
 * Receipts.
 */
Route::name('receipt.')->group(function () {
    Route::get('/receipt/create', 'ReceiptController@create')->name('create');
    Route::post('/receipt', 'ReceiptController@store')->name('store');
});

/**
 * Company.
 */
Route::name('company.')->group(function () {
    Route::get('/company/{company}/edit', 'CompanyController@edit')->name('edit');
    Route::patch('/company/{company}', 'CompanyController@update')->name('update');
});

/**
 * Ledgers.
 */
Route::name('ledger.')->group(function () {
    Route::get('/ledger', 'LedgerController@index')->name('index');
    Route::get('/ledger/create', 'LedgerController@create')->name('create');
    Route::get('/ledger/{ledger}/edit', 'LedgerController@edit')->name('edit');
    Route::get('/ledger/{ledger}/delete', 'LedgerController@destroy')->name('destroy');
    Route::post('/ledger', 'LedgerController@store')->name('store');
    Route::patch('/ledger/{ledger}', 'LedgerController@update')->name('update');
});
