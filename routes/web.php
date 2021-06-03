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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/member-list', 'MyworkController@index')->name('member-list');
Route::match(['get','post'], '/member-add', 'MyworkController@add')->name('member-add');
Route::match(['get','post'], '/member-edit/{id}', 'MyworkController@edit')->name('member-edit');
Route::get('/member-delete/{sid}', 'MyworkController@memberDelete');


Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('second', 'FacebookController@second');
Route::get('facebook', 'FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'FacebookController@handleFacebookCallback');
