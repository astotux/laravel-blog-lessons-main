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

Route::group(['namespace' => 'Main'], function () {

    Route::get('/', 'IndexController');

});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'as' => 'personal.', 'middleware' => ['auth', 'verified']], function () {

    Route::group(['namespace' => 'Main', 'prefix' => 'main', 'as' => 'main.'], function () {
        Route::get('/', 'IndexController')->name('index');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked', 'as' => 'liked.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::delete('/{post}', 'DestroyController')->name('destroy');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/{comment}/edit', 'EditController')->name('edit');
        Route::patch('/{comment}', 'UpdateController')->name('update');
        Route::delete('/{comment}', 'DestroyController')->name('destroy');
    });

});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'admin']], function () {

    Route::group(['namespace' => 'Main', 'as' => 'main.'], function () {

        Route::get('/', 'IndexController')->name('index');

    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts', 'as' => 'post.'], function () {

        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{post}', 'ShowController')->name('show');
        Route::get('/{post}/edit', 'EditController')->name('edit');
        Route::patch('/{post}', 'UpdateController')->name('update');
        Route::delete('/{post}', 'DestroyController')->name('destroy');

    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories', 'as' => 'category.'], function () {

        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{category}', 'ShowController')->name('show');
        Route::get('/{category}/edit', 'EditController')->name('edit');
        Route::patch('/{category}', 'UpdateController')->name('update');
        Route::delete('/{category}', 'DestroyController')->name('destroy');

    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags', 'as' => 'tag.'], function () {

        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{tag}', 'ShowController')->name('show');
        Route::get('/{tag}/edit', 'EditController')->name('edit');
        Route::patch('/{tag}', 'UpdateController')->name('update');
        Route::delete('/{tag}', 'DestroyController')->name('destroy');

    });

    Route::group(['namespace' => 'User', 'prefix' => 'users', 'as' => 'user.'], function () {

        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{user}', 'ShowController')->name('show');
        Route::get('/{user}/edit', 'EditController')->name('edit');
        Route::patch('/{user}', 'UpdateController')->name('update');
        Route::delete('/{user}', 'DestroyController')->name('destroy');

    });

});

Auth::routes(['verify' => true]);

