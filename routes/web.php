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
Route::get('/allProducts/{id}', 'UserController@allProducts')->name('allProducts');
Route::get('/productDetails/{id}', 'UserController@productDetails')->name('productDetails');

Route::get('/about', 'UserController@about')->name('about');
Route::get('/contact', 'SendEmailController@contact')->name('contact');
Route::post('/contact/sendmail', 'SendEmailController@sendmail')->name('sendmail');

Route::get('/pbcevent', 'EventController@pbcevent')->name('pbcevent');
Route::post('/pbceventreg', 'EventController@pbceventreg')->name('pbceventreg');



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
    echo 'clear-cache complete';

});
Route::get('/updateapp', function() {
    system('composer dump-autoload');
    // return what you want
    echo 'composer dump-autoload complete';

});
Route::get('/composerUpdate', function() {
    system('composer update');
    // return what you want
    echo 'composer update complete';

});
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

    //--sales--//
    Route::get('/sales', 'SalesController@salesView')->name('sales');
    Route::get('/sealProductDetails/{id}', 'SalesController@sealProductDetails')->name('sealProductDetails');
    Route::post('/printInvoice', 'SalesController@printInvoice')->name('printInvoice');

    //--events--//
    Route::get('/eventDataView', 'EventController@eventDataView')->name('eventDataView');
    Route::get('/viewSingleData/{id}', 'EventController@viewSingleData')->name('viewSingleData');
    Route::get('/deleteTeam/{id}', 'EventController@deleteTeam')->name('deleteTeam');
    
    Route::get('/test', 'SalesController@test')->name('test');

    
});
/* Admin route end */


