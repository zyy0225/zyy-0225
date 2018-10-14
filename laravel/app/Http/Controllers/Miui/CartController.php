<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
*   购物车
*/
class CartController extends Controller
{
    /**
    *   购物车
    */
    public function gouwuche()
    {
        return view('cart.gouwuche');
    }



}