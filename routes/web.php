<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


Route::get('/', 'PagesController@index')->name('index');
Route::get('/tag/{tagId}', 'PagesController@tagList')->name('tag');
Route::get('/cate/{tagId}', 'PagesController@tagList')->name('tag');
Route::get('/xiaochengxu/{id}', 'PagesController@show')->name('detail');


Route::group(['prefix' => 'talk', 'namespace' => 'Talk'], function() {

});

Route::group(['prefix' => 'user', 'namespace' => 'Home'], function() {
    Route::resource('apps', 'AppsController');
});
