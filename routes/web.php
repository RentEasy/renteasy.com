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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/about/company', 'AboutController@company')->name('about.company');
Route::get('/about/for-renters', 'AboutController@forRenters')->name('about.for-renters');
Route::get('/about/for-landlords', 'AboutController@forLandlords')->name('about.for-landlords');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/rentals', 'DashboardController@index')->name('dashboard.rentals');

Route::resource('rentals', 'RentalController');
