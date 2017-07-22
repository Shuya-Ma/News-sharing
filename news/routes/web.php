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

// show a static view for the home page (app/views/home.blade.php)
Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
	]);

Route::resource('tasks', 'TasksController');
Route::resource('comments', 'CommentsController');
Route::resource('likes', 'LikesController');
Route::resource('users', 'UsersController');

Route::post('/postcomment','CommentsController@storeComment');
Route::get('/showcomments/{id}', 'CommentsController@showPage')->name('getcomments');
Route::post('/unlike/{userid}/{storyid}', 'LikesController@unlike')->name('unlike');
Route::get('/showavatar/{userid}', 'UsersController@showAvatarPage')->name('showavatar');
Route::get('/usersindex', 'UsersController@showIndex')->name('listusers');
Route::post('/setpresetavatar', 'UsersController@storePreset')->name('setpresetavatar');
Route::get('/filterbytag/{id}', 'TasksController@filterByTag')->name('filterbytag');

Auth::routes();

Route::get('/home', 'HomeController@index');
