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

Route::get('/', 'IndexController@index')->name('fe.index');

Route::any('/register', 'UserController@register')->name('user_register');

Route::any('/check-email', 'UserController@checkEmail');

Route::any('/user_login', 'UserController@login')->name('user_login');

Route::any('/step/2', 'UserController@step2')->name('step2');

Route::get('/review', 'UserController@review')->name('review');

Route::get('/user/logout', 'UserController@logout')->name('user_logout');



Route::match(['get', 'post'], '/admin', 'AdminController@login');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/settings', 'AdminController@settings')->name('admin.settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword')->name('chkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');

    // User
    Route::get('/admin/view-users', 'UserController@viewUsers')->name('viewUsers');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'AdminController@logout')->name('admin.logout');
