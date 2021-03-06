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

//Root Page
Route::get('/', 'TopicsController@index')->name('root');

//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Users edit
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
Route::post('users/{user}/avatar/edit', 'UsersController@avatar_edit')->name('users.avatar.edit');

//Topics edit
Route::resource('topics', 'TopicsController', ['only' => ['show', 'create', 'store', 'update', 'edit', 'destroy']]);

//Category edit
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);