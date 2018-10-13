<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
*   订单
*/
class OrderController extends Controller
{
    /**
    *   订单中心
    */
    public function dingdanzhongxin()
    {
        return view('order.dingdanzhongxin');
    }


    
}