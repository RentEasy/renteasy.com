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

Route::middleware(['auth'])->namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('/rentals', 'RentalController');
    Route::post('/rentals/{rental}/approve/{app}', 'RentalController@approveApplication')->name('rentals.application.approve');
    Route::post('/rentals/{rental}/reject/{app}', 'RentalController@rejectApplication')->name('rentals.application.reject');
});

Route::resource('/rentals', 'RentalController', [
    'only' => ['index', 'show']
]);
Route::post('/rentals/{rental}/apply', 'RentalController@apply')->name('rentals.apply');
