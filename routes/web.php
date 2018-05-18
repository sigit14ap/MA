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
    return redirect('home/pesantren');
});

Route::get('/home', function () {
    return redirect('home/pesantren');
});

Auth::routes();

Route::group(['middleware' => 'IsLogin'], function () {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/getcity','Pusat\PesantrenController@getcity')->name('getcity');
});

Route::group(['prefix' => 'home', 'middleware' => 'IsPusatLembaga'], function () {

    //PESANTREN
    Route::get('pesantren', 'Pusat\PesantrenController@index')->name('pesantren.index');
    Route::get('pesantren/{id}/edit', 'Pusat\PesantrenController@edit')->name('pesantren.edit');
    Route::put('pesantren/{id}/update', 'Pusat\PesantrenController@update')->name('pesantren.update');
    Route::get('pesantren/{id}', 'Pusat\PesantrenController@show')->name('pesantren.show');
    Route::get('/data-pesantren', 'Pusat\PesantrenController@data_index')->name('pesantren.data_index');

    //LEMBAGA
    Route::get('lembaga', 'Lembaga\LembagaController@index')->name('lembaga.index');
    Route::get('lembaga/{id}/edit', 'Lembaga\LembagaController@edit')->name('lembaga.edit');
    Route::put('lembaga/{id}/update', 'Lembaga\LembagaController@update')->name('lembaga.update');
    Route::get('lembaga/{id}', 'Lembaga\LembagaController@show')->name('lembaga.show');
    Route::get('/data-lembaga', 'Lembaga\LembagaController@data_index')->name('lembaga.data_index');
});

Route::group(['prefix' => 'home', 'middleware' => 'IsLembaga'], function () {

    //PESANTREN
    Route::get('create/pesantren', 'Pusat\PesantrenController@create')->name('pesantren.create');
    Route::post('store/pesantren', 'Pusat\PesantrenController@store')->name('pesantren.store');

    //LEMABAGA
    Route::get('create/lembaga', 'Lembaga\LembagaController@create')->name('lembaga.create');
    Route::post('store/lembaga', 'Lembaga\LembagaController@store')->name('lembaga.store');
});