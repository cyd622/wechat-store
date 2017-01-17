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


/**
 * auth
 */
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


/**
 * pages
 */
Route::get('/', 'FrontPagesController@index')->name('index');
Route::get('/tag/{tagId}', function ($tagId) {
    return redirect('/cate/'.$tagId, 301); // tag 重命名为 cate
});
Route::get('/cate/{tagId}', 'FrontPagesController@tag')->name('tag');
Route::get('/xiaochengxu/{id}', 'FrontPagesController@show')->name('detail');
Route::get('/xiaochengxu/{id}/{name}', 'FrontPagesController@show')->name('wxapp.show');
Route::post('/xiaochengxu/{id}', 'FrontPagesController@comment')->name('wxapp.comment');
Route::get('/search', 'FrontPagesController@search')->name('search');
Route::get('/users', 'FrontPagesController@users')->name('users');
Route::get('/articles', 'FrontPagesController@news')->name('articles');
Route::get('/article/{id}', 'FrontPagesController@article')->name('article');


/**
 * talk
 */
Route::group(['prefix' => 'talk', 'namespace' => 'Talk'], function() {

});


/**
 * home
 */
Route::group(['namespace' => 'Home'], function() {
    Route::resource('user', 'UserController');

    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::resource('apps', 'AppsController');
    });
});


/**
 * sitemaps
 */
Route::get('/sitemap', 'SitemapController@sitemap');
Route::get('/sitemap.xml', 'SitemapController@sitemap');
Route::get('/sitemap', 'SitemapController@sitemap');


/**
 * upload
 */
Route::POST('/upload', 'UploadController@upload')->name('upload');
Route::POST('/upload/check', 'UploadController@check')->name('upload.check');