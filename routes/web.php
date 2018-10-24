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

Route::get('/', 'HomeController@index');

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@check');
Route::get('/logout', 'HomeController@logout');
Route::get('/register', 'HomeController@register');
Route::post('/register', 'HomeController@store');
Route::get('/resetpassword', 'ForgotPasswordController@showLinkRequestForm');
Route::post('/resetpassword', 'ForgotPasswordController@sendResetLinkEmail');
Route::get('/reset /{token}', 'ResetPasswordController @showResetForm');
Route::post('/reset', 'ResetPasswordController@reset');
Route::get('post/category/{id}','HomeController@getPostByCate');
Route::get('post/{id}','PostsController@show');



Route::resource('/profile', 'UserController')->only('show');

Route::group(['middleware' => 'createPost'], function() {
    Route::resource('post', 'PostsController');
    Route::resource('/account', 'UserController');
});


Route::group(['prefix' => 'admin'], function() {
    
    Route::get('/login','Admin\AdminController@login');
    Route::post('/login','Admin\AdminController@check');
    Route::get('/logout', 'Admin\AdminController@logout');

    Route::get('/register','Admin\AdminController@register');
    Route::post('/register','Admin\AdminController@store');
    
    Route::group(['middleware' => 'AdminLogin',], function() {
        Route::get('home', function() {
            return view('admin.home');
        });
        Route::resource('category', 'Admin\AdminCategoryController');
        Route::resource('post', 'Admin\AdminPostsController');
        Route::get('post/public', 'Admin\AdminPostsController@getPostPublic');
        Route::get('post/unpublic', 'Admin\AdminPostsController@getPostUnpublic');
        Route::resource('author', 'Admin\AdminAuthorController');
    });
    
});