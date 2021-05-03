<?php

use GuzzleHttp\Middleware;
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
})->name('home');

####admin login and register
Route::get('/adminlogin','Admin\AdminController@login')->name('login');

Route::get('/createadmin','Admin\AdminController@createadmin')->name('createadmin');
Route::post('/adminloginsubmit','Admin\AdminController@adminloginsubmit')->name('adminloginsubmit');

Route::group(
    [
    'middleware' => 'admin'
],function(){
    Route::get('/admindashboard','Admin\AdminController@admindashboard')->name('admindashboard');
####posttype
Route::get('/createposttype','Admin\AdminController@createposttype')->name('createposttype');
Route::post('/posttypesubmit','Admin\AdminController@posttypesubmit')->name('posttypesubmit');

######add blog with post type
Route::get('/addblog/{slug}','Admin\BlogController@addblog')->name('admin.addblog');
Route::post('/blogsubmit/{slug}','Admin\BlogController@blogsubmit')->name('blogsubmit');
Route::get('/allblogs/{slug}','Admin\BlogController@allblogs')->name('allblogs');
Route::get('/edit/{pslug}/{gslug}','Admin\BlogController@editblog')->name('admin.post.edit');
Route::post('/editpostsubmit/{gslug}','Admin\BlogController@editpostsubmit')->name('admin.post.editsubmit');
Route::get('/delete/{pslug}/{gslug}','Admin\BlogController@deletepost')->name('admin.post.delete');

Route::get('/logout','Admin\AdminController@logout')->name('logout');

});

