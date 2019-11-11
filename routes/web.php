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
//    Category
    Route::get('/categories',['uses'=>'Admin\CategoryController@index','as'=>'category-list','middleware' => 'permission:Category List|All']);
    Route::get('/category/create',['uses'=>'Admin\CategoryController@create','as'=>'category-create','middleware' => 'permission:Category Create|All']);
    Route::post('/category/store',['uses'=>'Admin\CategoryController@store','as'=>'category-store','middleware' => 'permission:Category Store|All']);
    Route::put('/category/status/{id}',['uses'=>'Admin\CategoryController@status','as'=>'category-status','middleware' => 'permission:Category Store|All']);
    Route::get('/category/edit/{id}',['uses'=>'Admin\CategoryController@edit','as'=>'category-edit','middleware' => 'permission:Category Edit|All']);
    Route::put('/category/update/{id}',['uses'=>'Admin\CategoryController@update','as'=>'category-update','middleware' => 'permission:Category Update|All']);
    Route::get('/category/delete/{id}',['uses'=>'Admin\CategoryController@destroy','as'=>'category-delete','middleware' => 'permission:Category Update|All']);
//Posts
    Route::get('/posts',['uses'=>'Admin\PostController@index','as'=>'post-list','middleware' => 'permission:Post List|All']);
    Route::get('/post/create',['uses'=>'Admin\PostController@create','as'=>'post-create','middleware' => 'permission:Post Create|All']);
    Route::post('/post/store',['uses'=>'Admin\PostController@store','as'=>'post-store','middleware' => 'permission:Post Create|All']);
    Route::put('/post/status/{id}',['uses'=>'Admin\PostController@status','as'=>'post-status','middleware' => 'permission:Post Create|All']);
    Route::put('/post/hot/news/{id}',['uses'=>'Admin\PostController@hot_news','as'=>'post-hot-news','middleware' => 'permission:Post Create|All']);
    Route::get('/post/edit/{id}',['uses'=>'Admin\PostController@edit','as'=>'post-edit','middleware' => 'permission:Post Edit|All']);
    Route::post('/post/update/{id}',['uses'=>'Admin\PostController@update','as'=>'post-update','middleware' => 'permission:Post Update|All']);
    Route::get('/post/delete/{id}',['uses'=>'Admin\PostController@destroy','as'=>'post-delete','middleware' => 'permission:Post Delete|All']);

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
