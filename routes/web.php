<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class);

//route resource for Rekanan
Route::resource('/rekanans', \App\Http\Controllers\RekananController::class);

//route resource for faktur/invoice
Route::resource('/fakturs', \App\Http\Controllers\FakturController::class);

// Route::group(['prefix' => 'faktur'], function() {
//     Route::get('/', 'FakturController@index')->name('faktur.index');
//     Route::get('/new', 'FakturController@create')->name('faktur.create');
//     Route::post('/', 'FakturController@save')->name('faktur.store');
//     Route::get('/{id}', 'FakturController@edit')->name('faktur.edit');
//     Route::put('/{id}', 'FakturController@update')->name('faktur.update');
//     Route::delete('/{id}', 'FakturController@deleteProduct')->name('faktur.delete_product');
//     Route::delete('/{id}/delete', 'FakturController@destroy')->name('faktur.destroy');
//     Route::get('/{id}/print', 'FakturController@generateInvoice')->name('faktur.print');
// });