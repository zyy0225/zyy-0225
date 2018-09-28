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

Route::get('admin/index','Admin\IndexController@index');


Route::get('miui/register', 'Miui\FrontendController@register');
Route::get('miui/login', 'Miui\FrontendController@login');
Route::get('miui/index','Miui\FrontendController@index');
Route::get('miui/liebiao', 'Miui\FrontendController@liebiao');
Route::get('miui/gouwuche', 'Miui\FrontendController@gouwuche');
Route::get('miui/dingdanzhongxin', 'Miui\FrontendController@dingdanzhongxin');
Route::get('miui/xiangqing', 'Miui\FrontendController@xiangqing');
Route::get('miui/self_info', 'Miui\FrontendController@self_info');

