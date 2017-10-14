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

Route::resource('/','IndexController',[
    'only' => ['index'],
    'names' => [
        'index' => 'home'
    ],
]);

Route::resource('portfolios','PortfolioController',[
  'parameters' => [
      'portfolios' => 'alias'
  ]
]);

Route::resource('articles','ArticlesController',[
    'parameters' => [
        'articles' => 'ali as'
    ]
]);

Route::get('articles/cat/{cat_alias?}', ['uses'=>'ArticlesController@index','as'=>'articlesCat'])->where('cat_alias', '[\w-]+');

Route::resource('comment','CommentController',['only' => ['store']]);

Route::match(['get','post'],'/contacts',['uses'=>'ContactsController@index', 'as'=>'contact']);

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

/*
 * Admin page routes:
 * */

Route::group(['prefix' => 'admin','middleware'=>'auth'], function() {
    //admin
    Route::get('/',['uses'=>'Admin\IndexController@index','as'=>'adminIndex']);
    //admin/articles
    Route::resource('/articles','Admin\ArticlesController');

});
