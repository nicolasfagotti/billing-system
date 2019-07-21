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
    return redirect('login');
});

Route::get('/home', function () {
    return redirect('clients');
});

Route::resource('clients', 'ClientsController');

Route::resource('bills', 'BillsController');

Route::get('pdf/bill/{id}', 'BillsController@generatePDF');
