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
Route::group(['prefix'=>'back','middleware'=>'auth'],function(){
    Route::get('/','Admin\DashboardController@index')->name('dashbaord');
    Route::get('/category','Admin\CategoryController@index')->name('category');
    Route::get('/category/create','Admin\CategoryController@create');
    Route::get('/category/edit','Admin\CategoryController@edit');
//    Permission
    Route::get('/permission',['uses'=>'Admin\PermissionController@index','as'=>'permission-list','middleware' => 'permission:Permission List|All']);
    Route::get('/permission/create',['uses'=>'Admin\PermissionController@create','as'=>'permission-create', 'middleware' => 'permission:Permission List|All']);
    Route::post('/permission/store',['uses'=>'Admin\PermissionController@store','as'=>'permission-store','middleware' => 'permission:Permission List|All']);
    Route::get('/permission/edit/{id}',['uses'=>'Admin\PermissionController@edit','as'=>'permission-edit','middleware' => 'permission:Permission List|All']);
    Route::post('/permission/update/{id}',['uses'=>'Admin\PermissionController@update','as'=>'permission-update','middleware' => 'permission:Permission List|All']);
    Route::get('/permission/delete/{id}',['uses'=>'Admin\PermissionController@destroy','as'=>'permission-delete','middleware' => 'permission:Permission List|All']);
//    Role
    Route::get('/roles','Admin\RoleController@index');
    Route::get('/roles/create','Admin\RoleController@create');
    Route::post('/roles/store','Admin\RoleController@store');
    Route::get('/roles/edit/{id}',['uses'=>'Admin\RoleController@edit','as'=>'role-edit']);
    Route::post('/roles/update/{id}',['uses'=>'Admin\RoleController@update','as'=>'role-update']);
    Route::get('/roles/delete/{id}',['uses'=>'Admin\RoleController@destroy','as'=>'role-delete']);
    //    Author
    Route::get('/authors','Admin\AuthorController@index');
    Route::get('/author/create','Admin\AuthorController@create');
    Route::post('/author/store','Admin\AuthorController@store');
    Route::get('/author/edit/{id}',['uses'=>'Admin\AuthorController@edit','as'=>'author-edit']);
    Route::post('/author/update/{id}',['uses'=>'Admin\AuthorController@update','as'=>'author-update']);
    Route::get('/author/delete/{id}',['uses'=>'Admin\AuthorController@destroy','as'=>'author-delete']);

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
