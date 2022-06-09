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

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/school/{id}/detail', 'Front\HomeController@schoolDetail')->name('school.detail');
Route::get('/school', 'Front\SchoolController@index')->name('school');
Route::get('/coming-soon', 'Front\HomeController@comingSoon')->name('coming.soon');

require __DIR__.'/auth.php';
