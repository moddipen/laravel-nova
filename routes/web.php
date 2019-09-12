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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace'=>'Admin',
    'prefix'=>'admin',
    'as'=>'admin.',
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('impersonate/leave', 'ImpersonateController@impersonateleave')->name('impersonateLeave');
    Route::group(['middleware' => ['role:Super Admin']], function () {
        Route::resource('genders', 'GenderController')->except(['show']);
        Route::resource('admins', 'AdminController')->except(['show']);
        Route::get('impersonate/{user_id}', 'ImpersonateController@impersonate')->name('impersonate');
        Route::resource('countries', 'CountryController')->except(['show']);
        Route::resource('languages', 'LanguageController')->except(['show']);
        Route::resource('clients', 'ClientController')->except(['show']);
    });
});
