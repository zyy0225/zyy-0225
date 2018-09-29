<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Miui\Rouote;

//小米商城前台模板
class FrontendController extends Controller
{
    /**
    *商城首页
    */
    public function index()
    {
        return view('miui.index');
    }

    /**
    *列表页 
    */
    public function liebiao()
    {
        return view('miui.liebiao');
    }

    /**
    *注册页面    
    */
    public function register()
    {
        return view('miui.register');
    }

    /**
    *登录页面    
    */
    public function login()
    {
        return view('miui.login');
    }

    /**
    *购物车
    */
    public function gouwuche()
    {
        return view('miui.gouwuche');
    }

    /**
    *订单中心
    */
    public function dingdanzhongxin()
    {
        return view('miui.dingdanzhongxin');
    }

    /**
    *详情页面
    */
    public function xiangqing()
    {
        return view('miui.xiangqing');
    }

    /**
    *个人资料
    */
    public function self_info()
    {
        return view('miui.self_info');
    }

    
}
