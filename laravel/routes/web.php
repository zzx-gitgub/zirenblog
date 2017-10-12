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

// /Route::get('/', function () {
//     return view('welcome');
// });

/**
 * 前台路由
 */
Route::group(['namespace'=>'Home'],function(){
	Route::get('/','IndexController@index');
	Route::get('/detail/{aid}','IndexController@detail');
	Route::get('/type/{tid}','IndexController@type');
	Route::get('/message','MessageController@index');
	Route::post('/message/store','MessageController@store');
	Route::post('/comment/store/{aid}','CommentController@store');
	Route::post('/ser','IndexController@ser');
	Route::post('/comment/reply/{cid}','CommentController@reply');
});

/**
 * 登陆后台的路由
 */
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login/checklogin','Admin\LoginController@checklogin');

/**
 * 后台路由
 */
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
	
	Route::get('/','IndexController@index');
	//文章路由
	Route::get('/article','ArticleController@index');
	Route::get('/article/create','ArticleController@create');
	Route::post('/article/store','ArticleController@store');
	Route::get('/article/edit/{aid}/{page}','ArticleController@edit');
	Route::post('/article/update/{aid}/{page}','ArticleController@update');
	Route::get('/article/destroy/{aid}/{page}','ArticleController@destroy');
	Route::get('/article/search','ArticleController@search');
	Route::post('/article/search','ArticleController@search');
	//分类路由
	Route::get('/type','TypeController@index');
	Route::get('/type/create','TypeController@create');
	Route::post('/type/store','TypeController@store');
	Route::get('type/edit/{tid}','TypeController@edit');
	Route::post('type/update/{tid}','TypeController@update');
	//留言路由
	Route::get('/message','MessageController@index');
	Route::get('/message/destroy/{mid}/{page}','MessageController@destroy');
	Route::post('/message/reply/{mid}/{page}','MessageController@reply');
	//评论路由
	Route::get('/comment','CommentController@index');
	Route::get('/comment/destroy/{cid}/{page}','CommentController@destroy');
	//友情链接路由
	Route::get('/flink','FlinkController@index');
	Route::get('/flink/create','FlinkController@create');
	Route::post('flink/store','FlinkController@store');
	Route::get('flink/edit/{lid}/{page}','FlinkController@edit');
	Route::post('flink/update/{lid}/{page}','FlinkController@update');
	Route::get('flink/destroy/{lid}/{page}','FlinkController@destroy');
});
