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

Route::get('/', function () {
    return redirect('clients');
});

Route::get('/home', function () {
    return redirect('clients');
});

Route::resource('clients', 'ClientsController')->middleware('auth');

Route::resource('bills', 'BillsController')->middleware('auth');

Route::get('pdf/bill/{id}', 'BillsController@generatePDF')->middleware('auth');