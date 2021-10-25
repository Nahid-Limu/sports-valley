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
Route::get('/productDetails/{id}', 'UserController@productDetails')->name('productDetails');

/* User route end */


/* Admin route start */
Auth::routes();
/* Logout route start */
    Route::get('/logout', 'Auth\LoginController@logout');
/* Logout route end */
Route::group(['middleware'=>'auth'], function () {

    // dashboard
    Route::get('/dashbord', 'AdminController@viewDashboard')->name('dashboard');

    //--settings--// (businessSettings)
    Route::get('/businessSettings', 'BusinessController@businessSettings')->name('businessSettings');
    Route::post('/addBusinessCat', 'BusinessController@addBusinessCat')->name('addBusinessCat');
    Route::get('/editBusinessCat/{id}', 'BusinessController@editBusinessCat')->name('editBusinessCat');
    Route::post('/updateBusinessCat', 'BusinessController@updateBusinessCat')->name('updateBusinessCat');
    Route::get('/deleteCat/{id}', 'BusinessController@deleteCat')->name('deleteCat');
    
    //--settings--// (categorySettings)
    Route::get('/categorySettings', 'CategoryController@categorySettings')->name('categorySettings');
    Route::post('/addCategory', 'CategoryController@addCategory')->name('addCategory');
    Route::get('editCategory/{id}','CategoryController@editCategory')->name('editCategory');
    Route::post('/updateCategory', 'CategoryController@updateCategory')->name('updateCategory');
    Route::get('/deleteCategory/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');

    //--settings--// (brandsSettings)
    Route::get('/brandSettings', 'BrandController@brandSettings')->name('brandSettings');
    Route::post('/addBrand', 'BrandController@addBrand')->name('addBrand');
    Route::get('/editBrand/{id}', 'BrandController@editBrand')->name('editBrand');
    Route::post('/updateBrand', 'BrandController@updateBrand')->name('updateBrand');
    Route::get('/deleteBrand/{id}', 'BrandController@deleteBrand')->name('deleteBrand');

    //--settings--// (productSettings)
    Route::get('/productSettings', 'ProductController@productSettings')->name('productSettings');
    Route::post('/addProduct', 'ProductController@addProduct')->name('addProduct');
    // Route::get('/editBrand/{id}', 'BrandController@editBrand')->name('editBrand');
    // Route::post('/updateBrand', 'BrandController@updateBrand')->name('updateBrand');
    Route::get('/deleteProduct/{id}', 'ProductController@deleteProduct')->name('deleteProduct');

});
/* Admin route end */


