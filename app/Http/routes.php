<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');

Route::get('home', 'HomeController@index');
Route::get('home/category/{id}/{alias}',['as'=>'home.cate','uses'=>'HomeController@getCate']);
Route::get('home/product/{id}/{alias}',['as'=>'home.product','uses'=>'HomeController@getProduct']);
Route::get('home/contact',['as'=>'home.getContact','uses'=>'HomeController@getContact']);
Route::post('home/contact',['as'=>'home.postContact','uses'=>'HomeController@postContact']);
Route::get('home/buy/{id}',['as'=>'home.getBuy','uses'=>'HomeController@getBuy']);
Route::get('home/cart',['as'=>'home.getCart','uses'=>'HomeController@getCart']);
Route::get('home/cart/delete/{rowId}',['as'=>'home.deleteProductCart','uses'=>'HomeController@deleteProductCart']);
Route::get('home/cart/update',['as'=>'home.updateCart','uses'=>'HomeController@updateCart']);




Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('index',function(){
		return redirect()->route('admin.user.getList');
	});
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::get('deleteDetailImage/{id}',['as'=>'admin.product.getDeleteDetailImage','uses'=>'ProductController@getDeleteDetailImage']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
	});
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
