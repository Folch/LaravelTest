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
    return View::make('index');
});

// catch-all -- all routes that are not index or api will be redirected
//Route::any('{catchall}', function() {
////    return View::make('index');
//})->where('catchall', '!/api/*');

Route::get('/api/v1/posts/{id?}', 'Posts@index');
Route::get('/api/v1/posts', 'Posts@index');
Route::post('/api/v1/posts', 'Posts@store');
Route::post('/api/v1/posts/{id}', 'Posts@update');
Route::delete('/api/v1/posts/{id}', 'Posts@destroy');


Route::get('/api/v1/users', 'Users@getAll');

Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
