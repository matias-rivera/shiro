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
    return redirect('/home');
}); 
 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/s/{forum}','ForumsController@show')->name('forums.show');
Route::resource('/users','UsersController');
//Route::get('/u/{user}', 'UsersController@show')->name('users.show');
Route::resource('s/{forum}/posts','PostsController');
Route::resource('s/{forum}/posts/{post}/comments', 'CommentsController');
Route::get('s/{forum}/posts/{post}/comments/{comment}/reply','CommentsController@reply')->name('comments.reply');


//Route::get('/s/{forum}/posts/{post}','PostsController@show')->name('posts.show');
//Route::get('/s/{forum}/posts/create','ForumsController@create')->name('posts.create');
//Route::get('/s/{forum}/posts/create','PostsController@create')->name('posts.create');
//Route::put('/s/{forum}/posts/store','PostsController@store')->name('posts.store');
//Route::resource('forums','ForumsController');