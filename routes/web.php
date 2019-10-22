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

Auth::routes();
Route::group(['prefix'=>'back'],function(){
    Route::get('/','Admin\DashboardController@index')->name('dashbaord');
    Route::get('/category','Admin\CategoryController@index')->name('category');
    Route::get('/category/create','Admin\CategoryController@create');
    Route::get('/category/edit','Admin\CategoryController@edit');


});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function(){
    return view('frontend.layouts.master');
});
;
//Frontend Controllers
Route::get('/','HomePageController@index');
Route::get('/listing','ListingPageController@index');
Route::get('/details','DetailsPageController@index');
