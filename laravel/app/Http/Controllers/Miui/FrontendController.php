<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\GoodsService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

/**
*   小米商城首页模板
*/
class FrontendController extends Controller
{
    /**
	*   定义模型变量
	*/ 
    public $goodsService;
    public $categoryService;

    /**
	*   构造函数
	*/ 
	public function __construct()
	{
        $this->goodsService = new GoodsService;
        $this->categoryService = new CategoryService;
    }

    /**
	*   首页商品展示
	*/
    public function index()
    {
        $categoryInfo = $this->categoryService->categoryInfo();
        $goodsInfo = $this->goodsService->goodsInfo();
        // var_dump($goodsInfo);die;
        return view('frontend.index',['model'=>$goodsInfo,'cate'=>$categoryInfo]);
    }

    /**
	*   首页商品展示
	*/
    public function goodsList(Request $request)
    {
        $input = $request->all();
        if($input){
            $goodsInfo = $this->goodsService->goodsParent($input);
            $categoryInfo = $this->categoryService->categoryInfo();
            var_dump($goodsInfo);die;
            return view('frontend.index',['model'=>$goodsInfo,'cate'=>$categoryInfo]);
        }
    }

}
    

