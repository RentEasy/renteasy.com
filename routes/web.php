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
Route::get('/about/privacy', 'AboutController@privacy')->name('about.privacy');
Route::get('/about/terms', 'AboutController@terms')->name('about.terms');
Route::get('/about/cookie', 'AboutController@cookie')->name('about.cookie');
Route::post('/about/newsletter', 'AboutController@newsletter')->name('about.newsletter');

Route::middleware(['auth'])->namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('/rentals', 'RentalController');
    Route::post('/rentals/{rental}/approve/{app}', 'RentalController@approveApplication')->name('rentals.application.approve');
    Route::post('/rentals/{rental}/reject/{app}', 'RentalController@rejectApplication')->name('rentals.application.reject');
    Route::get('/rentals/{rental}/lease/{tenancy}', 'RentalController@lease')->name('rentals.application.lease');
});

Route::resource('/rentals', 'RentalController', [
    'only' => ['index', 'show']
]);
Route::get('/rentals/{rental}/apply', 'RentalController@apply')->name('rentals.apply');
Route::post('/rentals/{rental}/submit-application', 'RentalController@submitApplication')->name('rentals.submitApplication');

Route::middleware(['auth'])->group(function() {
    Route::post('/rentals/{rental}/simple-apply', 'RentalController@simpleApply')->name('rentals.simple-apply');
});

