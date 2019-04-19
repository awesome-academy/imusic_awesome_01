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
});

Route::group([
    'middleware' => [], 
    'prefix' => 'admin', 
    'namespace' => 'Admin',
    'as' => 'admin.'
    ], function () {
        Route::get('/', function () {
            return view('admin/modules/dashboard');
        });

        Route::resource('singers', 'SingerController');
        Route::resource('authors', 'AuthorController');
        Route::resource('categories', 'CategoryController');
});
