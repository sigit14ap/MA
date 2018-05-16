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
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'home/pusat', 'middleware' => 'IsPusatLembaga'], function () {
    Route::get('/', function () {
        return redirect('home/pusat/pesantren');
    });
    Route::resource('pesantren', 'Pusat\PesantrenController',
                    ['only' => [
                        'edit', 'index', 'update'
    ]]);
    Route::get('/data-pesantren', 'Pusat\PesantrenController@data_index')->name('pesantren.data_index');
});

Route::group(['prefix' => 'home/pusat', 'middleware' => 'IsLembaga'], function () {
    Route::resource('pesantren', 'Pusat\PesantrenController');
});