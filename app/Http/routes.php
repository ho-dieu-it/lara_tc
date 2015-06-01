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
// CONSTANT //
define('CATEGORY_ROOT_ID', '4');


//----------------------------

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('trang-chu.html', 'ProductController@index');

Route::get('thiep-cuoi.html', 'ProductController@wedding_card');
Route::get('/thiep-cuoi/{code}/{uri}.html', 'ProductController@wedding_card_detail');

Route::get('danh-thiep.html', 'ProductController@danhthiep');
Route::get('san-pham-khac.html', 'ProductController@sanphamkhac');
Route::get('gioi-thieu.html', 'ProductController@introduce');


Route::get('tin-tuc.html', 'NewsController@index');
Route::get('chi-tiet-tin-tuc/{code}/{title}.html', 'NewsController@news_detail');

Route::get('khach-hang.html', 'ProductController@customer');
Route::get('lien-he-dat-hang.html', 'ProductController@contact');

Route::get('{id}-{category}.html', 'ProductController@product_category');
/*
 * For Product Json
 * */

Route::get('products-json',array(
		'as'=>'products-json'
		,'uses'=>'ProductController@json'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
		
]);
/* Admin */
Route::controllers([
	'admin/category'=>'Admin\CategoryController',
	'admin/product'=>'Admin\ProductController'
]);

/*
 * Admin */

Route::get('admin/product/list', 'Admin\ProductController@index');
Route::get('admin/product/create', 'Admin\ProductController@create');
Route::get('admin/product/edit', 'Admin\ProductController@edit');

Route::get('admin/category/list', 'Admin\CategoryController@list');
Route::get('admin/category/create', 'Admin\CategoryController@create');
Route::get('admin/category/edit', 'Admin\CategoryController@edit');
Route::get('admin/category/delete', 'Admin\CategoryController@delete');

