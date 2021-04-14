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

\Illuminate\Support\Facades\Auth::routes();

/*Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');*/
\Illuminate\Support\Facades\Auth::routes();
Route::get('/home', 'App\Http\Controllers\Admin\HomeController@index')->name('home');



Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/home', 'App\Http\Controllers\Admin\HomeController@index')->name('home');
    Route::resource('users', 'App\Http\Controllers\Admin\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
    Route::put('profile/thumbnail', ['as' => 'profile.thumbnail', 'uses' => 'App\Http\Controllers\Admin\ProfileController@thumbnail']);
    Route::resource('posts','App\Http\Controllers\Admin\PostController', ['except' => ['show']]);
    Route::resource('categories','App\Http\Controllers\Admin\CategoryController', ['except' => ['show']]);
    Route::resource('tags','App\Http\Controllers\Admin\TagController', ['except' => ['show']]);
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
});

Route::get('/', 'App\Http\Controllers\Front\HomeController@index')->name('home.front');
Route::get('/gallery', 'App\Http\Controllers\Front\GalleryController@index')->name('gallery');
Route::get('/blog', 'App\Http\Controllers\Front\BlogController@index')->name('blog');
Route::get('/blog/{slug}', 'App\Http\Controllers\Front\BlogController@show')->name('blog.single');

