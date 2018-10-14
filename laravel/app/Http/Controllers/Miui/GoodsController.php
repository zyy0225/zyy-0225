<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
*   商品
*/
class GoodsController extends Controller
{
    /**
    *   列表页 
    */
    public function liebiao()
    {
        return view('goods.liebiao');
    }

    /**
    *   详情页面
    */
    public function xiangqing()
    {
        return view('goods.xiangqing');
    }


    
}