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

Auth::routes(['verify' => true]);


Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::group(['middleware' => 'checkstatus'], function(){

        Route::get('/', function () {
            return response()->redirectTo('/home');
        });

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/profile', 'ProfileController@index');

        //Edit own profile
        Route::get('/profile/edit', 'ProfileController@edit');

        Route::post('images/upload', 'CommunsController@image_uploader');

        Route::resource('users', 'UsersController');

        Route::resource('roles', 'RolesController');

        Route::get('/audits', 'Audit\AuditController@index');

    });
});



