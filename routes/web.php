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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User
// Route::get('/users', 'UsersController@index');
// Route::get('/users/create', 'UsersController@create');
// Route::post('/users', 'UsersController@store');
// Route::get('/users/{user}/edit', 'UsersController@edit');
// Route::patch('/users/{user}', 'UsersController@update');
// Route::delete('/users/{user}', 'UsersController@destroy');

Route::resource('users', 'UsersController');

//Menu
// Route::get('/menus', 'MenusController@index');
// Route::get('/menus/create', 'MenusController@create');
// Route::post('/menus', 'MenusController@store');
// Route::get('/menus/{menu}/edit', 'MenusController@edit');
// Route::patch('/menus/{menu}', 'MenusController@update');
// Route::delete('/menus/{menu}', 'MenusController@destroy');

Route::resource('menus', 'MenusController');

Route::resource('submenus', 'SubmenusController');

Route::resource('roles', 'RolesController');

//Middleware
Route::get('/blocked', 'HomeController@blocked');
