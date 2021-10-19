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


/* User route start */

Route::get('/', 'UserController@home')->name('home');
Route::get('/categoryDetails/{cat}', 'UserController@categoryDetails')->name('categoryDetails');
Route::get('/productDetails', 'UserController@productDetails')->name('productDetails');

/* User route end */


/* Admin route start */
Auth::routes();
/* Logout route start */
    Route::get('/logout', 'Auth\LoginController@logout');
/* Logout route end */
Route::group(['middleware'=>'auth'], function () {

    //dashboard
    Route::get('/dashbord', 'AdminController@viewDashboard')->name('dashboard');
    
});
/* Admin route end */


