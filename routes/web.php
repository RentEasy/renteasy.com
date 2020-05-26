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

Route::get('/about/contact', 'AboutController@contact')->name('about.contact');
Route::get('/about/company', 'AboutController@company')->name('about.company');
Route::get('/about/for-renters', 'AboutController@forRenters')->name('about.for-renters');
Route::get('/about/for-landlords', 'AboutController@forLandlords')->name('about.for-landlords');
Route::get('/about/privacy', 'AboutController@privacy')->name('about.privacy');
Route::get('/about/terms', 'AboutController@terms')->name('about.terms');
Route::get('/about/cookie', 'AboutController@cookie')->name('about.cookie');
Route::post('/about/newsletter', 'AboutController@newsletter')->name('about.newsletter');

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{article:slug}', 'BlogController@show')->name('blog.show');

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
Route::get('/rentals/{rental}/form-options', 'RentalController@getFormOptions')->name('rentals.getFormOptions');
Route::post('/rentals/{rental}/submit-application', 'RentalController@submitApplication')->name('rentals.submitApplication');
//
//Route::prefix('/rentals/{rental}/apply')->group(function() {
//    Route::get('/about', 'ApplyController@about')->name('rentals.apply');
//    Route::get('/employment', 'ApplyController@employment')->name('rentals.apply.employment');
//    Route::get('/residence', 'ApplyController@residence')->name('rentals.apply.residence');
//    Route::get('/occupants', 'ApplyController@occupants')->name('rentals.apply.occupants');
//    Route::get('/final', 'ApplyController@final')->name('rentals.apply.final');
//
//    Route::post('/about', 'ApplyController@saveAbout')->name('rentals.apply.saveAbout');
//    Route::post('/employment', 'ApplyController@saveEmployment')->name('rentals.apply.saveEmployment');
//    Route::post('/residence', 'ApplyController@saveResidence')->name('rentals.apply.saveResidence');
//    Route::post('/occupants', 'ApplyController@saveOccupants')->name('rentals.apply.saveOccupants');
//    Route::post('/final', 'ApplyController@saveFinal')->name('rentals.apply.saveFinal');
//});

Route::middleware(['auth'])->group(function() {
    Route::post('/rentals/{rental}/simple-apply', 'RentalController@simpleApply')->name('rentals.simple-apply');
});

