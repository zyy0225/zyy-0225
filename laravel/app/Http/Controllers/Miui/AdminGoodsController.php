<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\AdminGoodsService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Session;

/**
*   后台商品管理
*/
class AdminGoodsController extends Controller
{
    /**
	*   定义模型变量
	*/
    public $adminGoodsService;
    public $categoryService;

    /**
	*   构造函数
	*/ 
	public function __construct()
	{
        $this->adminGoodsService = new AdminGoodsService;
        $this->categoryService = new CategoryService;
    }

    /**
	*   后台商品展示
	*/
    public function list()
    {
        //判断是否管理员登录
        $name = Session::get('name');
        if(empty($name)){
            return redirect('/message')->with(['message'=>'请先登录！','url'=>'admin/login','jumpTime'=>3,'status'=>true]);
        }
        
        $page = $this->adminGoodsService->goodsPageAll();
        $goods = $this->adminGoodsService->goodsAll();
        $category = $this->categoryService->cateName($goods);
        return view('adminGoods.list',['model'=>$page,'cate'=>$category]);
    }

    /**
	*   商品添加
	*/
    public function insert()
    {
        return view('adminGoods.insert');
    }

    /**
	*   商品修改
	*/
    public function update()
    {
        return view('adminGoods.update');
    }

    /**
	*   商品删除
	*/
    public function delete()
    {
        return view('adminGoods.delete');
    }



}