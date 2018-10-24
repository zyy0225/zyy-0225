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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('mail/send','MailController@send');



Route::any('/','Miui\FrontendController@index');
Route::any('frontend/index','Miui\FrontendController@index');
Route::any('frontend/goodsList','Miui\FrontendController@goodsList');
Route::get('user/login', 'Miui\UserController@login');
Route::post('user/loginDo', 'Miui\UserController@loginDo');
Route::get('user/loginOut', 'Miui\UserController@loginOut');
Route::get('user/register', 'Miui\UserController@register');
Route::post('user/registerDo', 'Miui\UserController@registerDo');
Route::any('user/selfInfo', 'Miui\UserController@selfInfo');
Route::any('cart/gouwuche', 'Miui\CartController@gouwuche');
Route::any('order/dingdanzhongxin', 'Miui\OrderController@dingdanzhongxin');
Route::any('goods/liebiao', 'Miui\GoodsController@liebiao');
Route::any('goods/xiangqing', 'Miui\GoodsController@xiangqing');

Route::any('/message','MessageController@index');

Route::any('admin/login','Miui\AdminController@login');
Route::any('admin/loginDo','Miui\AdminController@loginDo');
Route::any('admin/loginOut', 'Miui\AdminController@loginOut');
Route::any('backend/index','Miui\BackendController@index');

Route::group(['middleware'=>['power'],['namespace'=>'Miui']],function(){
    Route::any('rbac/list','Miui\RbacController@list');
    Route::any('rbac/insert','Miui\RbacController@insert');
    Route::any('rbac/insertDo','Miui\RbacController@insertDo');
    Route::any('rbac/update','Miui\RbacController@update');
    Route::any('rbac/updateDo','Miui\RbacController@updateDo');
    Route::any('rbac/delete','Miui\RbacController@delete');

    Route::any('role/list','Miui\RoleController@list');
    Route::any('role/insert','Miui\RoleController@insert');
    Route::any('role/insertDo','Miui\RoleController@insertDo');
    Route::any('role/update','Miui\RoleController@update');
    Route::any('role/updateDo','Miui\RoleController@updateDo');
    Route::any('role/delete','Miui\RoleController@delete');

    Route::any('admin/list','Miui\AdminController@list');
    Route::any('admin/insert','Miui\AdminController@insert');
    Route::any('admin/insertDo','Miui\AdminController@insertDo');
    Route::any('admin/update','Miui\AdminController@update');
    Route::any('admin/updateDo','Miui\AdminController@updateDo');
    Route::any('admin/delete','Miui\AdminController@delete');

    Route::any('adminGoods/list','Miui\AdminGoodsController@list');
    Route::any('adminGoods/insert','Miui\AdminGoodsController@insert');
    Route::any('adminGoods/update','Miui\AdminGoodsController@update');
    Route::any('adminGoods/delete','Miui\AdminGoodsController@delete');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
