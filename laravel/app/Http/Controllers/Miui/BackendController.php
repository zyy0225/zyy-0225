<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;

/**
*   后台首页
*/
class BackendController extends Controller
{

    /**
	*   后台首页展示
	*/ 
    public function index()
    {
        //判断是否管理员登录
        $name = Session::get('name');
        if(empty($name)){
            return redirect('/message')->with(['message'=>'请先登录！','url'=>'admin/login','jumpTime'=>3,'status'=>true]);
        }

        return view('backend.index');
    }



}
    

