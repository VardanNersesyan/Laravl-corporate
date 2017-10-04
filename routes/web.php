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
  'parametres' => [
      'portfolios' => 'alias'
  ]
]);

Route::resource('articles','ArticlesController',[
    'parametres' => [
        'articles' => 'alias'
    ]
]);

Route::get('articles/cat/{cat_alias?}', ['uses'=>'ArticleController@index','as'=>'articlesCat']);