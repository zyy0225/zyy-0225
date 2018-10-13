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

Route::any('admin/index','Admin\IndexController@index');
Route::get('mail/send','MailController@send');




Route::any('frontend/index','Miui\FrontendController@index');
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


