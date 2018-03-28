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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Admin */

Route::prefix('admin/manage')->group(function() {
    Route::resource('/admins', 'Admin\Manage\AdminController');
    Route::resource('/roles', 'Admin\Manage\RoleController');
    Route::resource('/permissions', 'Admin\Manage\PermissionController');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
});
