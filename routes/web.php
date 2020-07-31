<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
Route::get('/s/{server}','ServersController@show')->name('servers.show');
Route::get('users/notifications',[UsersController::class,'notifications'])->name('users.notifications');
Route::get('users/posts',[UsersController::class,'posts'])->name('users.posts');
Route::get('users/comments',[UsersController::class,'comments'])->name('users.comments');

Route::resource('/users','UsersController');

//Route::get('/u/{user}', 'UsersController@show')->name('users.show');
Route::resource('s/{server}/posts','PostsController');
Route::resource('s/{server}/posts/{post}/comments', 'CommentsController');
Route::get('s/{server}/posts/{post}/comments/{comment}/reply','CommentsController@reply')->name('comments.reply');


