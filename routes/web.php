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

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');


Route::get('/', 'PostsController@index');
Route::get('/sitemap', ['as ' => 'bonsai.sitemap', 'uses' => 'PostsController@sitemap']);
Route::get('/aanmelden', ['as ' => 'bonsai.register', 'uses' => 'PostsController@register']);

Route::get('/artikelen', 'ProductController@index');
Route::get('/reset', 'ProductController@reset');
Route::get('/artikelen/{id}', 'ProductController@detail');
Route::get('/add/{id}', ['as ' => 'bonsai.artikelen.add', 'uses' => 'ProductController@getAddToCart']);
Route::get('/remove/{id}', ['as ' => 'bonsai.artikelen.remove', 'uses' => 'ProductController@getRemoveToCart']);
Route::get('/winkelwagen', ['as ' => 'bonsai.artikelen.winkelwagen', 'uses' => 'ProductController@getCart']);
Route::match(['get', 'post'], '/bestel', ['as ' => 'pdf-temp', 'uses' => 'ProductController@makeOrder']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
