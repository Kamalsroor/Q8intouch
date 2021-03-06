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


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('admin', 'AdminController');
    Route::resource('user', 'UserController');
    Route::resource('appointment', 'AppointmentController');
    Route::get('appointments/user', 'AppointmentController@getUser')->name('getUser');
    Route::get('appointments/date', 'AppointmentController@getAppointmentByDate')->name('getAppointmentByDate');

});




Route::get('/migrate-fersh', function () {
    Artisan::call("migrate:fresh");
    Artisan::call("db:seed");
    return 'Hello World';
});


Route::get('/updateapp', function() {
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});
