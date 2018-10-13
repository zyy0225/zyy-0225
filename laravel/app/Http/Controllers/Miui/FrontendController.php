<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\GoodsService;
use App\Services\CategoryService;

/**
*   小米商城首页模板
*/
class FrontendController extends Controller
{
    /**
    *   商城首页
    */

    /**
	*   定义模型变量
	*/ 
    public $goodsModel;
    public $categoryModel;

    /**
	*   构造函数
	*/ 
	public function __construct()
	{
        $this->goodsModel = new GoodsService;
        $this->categoryModel = new CategoryService;
    }

    public function index()
    {
        $goodsInfo = $this->goodsModel->goodsInfo();
        $categoryInfo = $this->categoryModel->categoryInfo();
        return view('frontend.index',['model'=>$goodsInfo,'cate'=>$categoryInfo]);
    }



}