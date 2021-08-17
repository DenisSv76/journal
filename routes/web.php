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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::match(['get', 'post'],'/', 'JournalController@showJournal');
Route::get('/delnewentry/id_del_entry/{id}', 'JournalController@delEntry')->where(['id' => '[0-9]+']);




