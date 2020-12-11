<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('admin/login', 'Auth\LoginController@login')->name('login');
    Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');
   
    Route::get('admin/home', 'DashboardController@index')->name('home');
    
        Route::get('admin/products', 'ProductController@index')->name('products');
         Route::get('admin/stock', 'ProductController@stock')->name('stock');
          Route::get('admin/opening_stock', 'ProductController@opening_stock')->name('opening_stock');
          Route::get('admin/track_stock', 'ProductController@track_stock')->name('track_stock');
       Route::get('admin/products/create', 'ProductController@create')->name('products.create');
       Route::post('admin/products/update', 'ProductController@update')->name('products.update');
       Route::post('admin/products/update1', 'ProductController@update1')->name('update1');
       Route::post('admin/track_stock', 'ProductController@track')->name('track');
         Route::post('admin/products/update2', 'ProductController@update2')->name('update2');
        Route::post('admin/products/store', 'ProductController@store')->name('products.store');
        Route::post('admin/products/destroy', 'ProductController@destroy')->name('products.destroy');
        Route::get('admin/products/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::get('admin/category', 'CategoryController@index')->name('category');
       Route::get('admin/category/create', 'CategoryController@create')->name('category.create');
       Route::post('admin/category/update', 'CategoryController@update')->name('category.update');
        Route::post('admin/category/store', 'CategoryController@store')->name('category.store');
        Route::post('admin/category/destroy', 'CategoryController@destroy')->name('category.destroy');
        Route::get('admin/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::get('admin/branch', 'BranchController@index')->name('branch');
       Route::get('admin/branch/create', 'BranchController@create')->name('branch.create');
       Route::post('admin/branch/update', 'BranchController@update')->name('branch.update');
        Route::post('admin/branch/store', 'BranchController@store')->name('branch.store');
        Route::post('admin/branch/destroy', 'BranchController@destroy')->name('branch.destroy');
        Route::get('admin/branch/edit/{id}', 'BranchController@edit')->name('branch.edit');
        Route::get('admin/company', 'CompanyController@index')->name('company');
       Route::get('admin/company/create', 'CompanyController@create')->name('company.create');
       Route::post('admin/company/update', 'CompanyController@update')->name('company.update');
        Route::post('admin/company/store', 'CompanyController@store')->name('company.store');
        Route::post('admin/company/destroy', 'CompanyController@destroy')->name('company.destroy');
        Route::get('admin/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
        Route::get('admin/user', 'UserController@index')->name('user');
       Route::get('admin/user/create', 'UserController@create')->name('user.create');
       Route::post('admin/user/update', 'UserController@update')->name('user.update');
        Route::post('admin/user/store', 'UserController@store')->name('user.store');
        Route::post('admin/user/destroy', 'UserController@destroy')->name('user.destroy');
        Route::get('admin/user/edit/{id}', 'UserController@edit')->name('user.edit');

