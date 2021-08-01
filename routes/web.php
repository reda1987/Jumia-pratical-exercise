<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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
    return view('welcome');
});
Route::get('/datatable' ,[CustomerController::class, 'dataTable'])->name('Customer.datatable');
Route::get('/index'     , [CustomerController::class, 'index'])->name('Customer.index');

// Route::any('Search'		 ,array('as'=>'Search'		    ,'uses'=>'AjaxController@Search'));