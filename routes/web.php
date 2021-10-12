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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');


/* User route start */

Route::get('/', 'UserController@home')->name('home');
// Route::get('/', 'UserController@product')->name('product');
// Route::get('/viewPost/{id}', 'UserViewController@viewPost')->name('viewPost');

/* User route end */

Auth::routes();
/* Logout route start */
// Route::get('/logout', 'Auth\LoginController@logout');
/* Logout route end */


