<?php

use App\Models\Post\Entity\Post;
use Illuminate\Support\Facades\Auth;
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

/*Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');*/
Auth::routes();
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
Route::post('blog/{slug}/comments', 'App\Http\Controllers\Front\BlogController@storeComment')->middleware('auth')->name('send.comment');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('auth');

/*Route::get('blog/{slug}', function (Post $post) {
    return view('front.blog-details')->with([
        'post' => $post->slug,
        'comments' => $post->getThreadedComments()
    ]);
})->name('blog.single');*/




