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

Route::get('/', function () {
    return redirect('home/pusat');
});

Route::get('/home', function () {
    return redirect('home/pusat');
});

Auth::routes();

Route::group(['prefix' => 'home/pusat', 'middleware' => 'IsPusat'], function () {
    Route::get('/', 'Pusat\PesantrenController@index')->name('pesantren.index');
    Route::get('/data-pesantren', 'Pusat\PesantrenController@data_index')->name('pesantren.data_index');
});