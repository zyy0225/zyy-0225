<?php 
namespace App\Services;

use App\Models\GoodsModel;
use App\Models\CategoryModel;
use Session;

class AdminGoodsService
{
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
        $this->goodsModel = new GoodsModel;
        $this->categoryModel = new CategoryModel;
	}

	/**
	*	获取全部商品
	*/
	public function goodsAll()
	{
        return $data = $this->goodsModel->getAll();
	}
	
	/**
	*	分页获取全部商品
	*/
	public function goodsPageAll()
	{
        return $data = $this->goodsModel->getPageAll();
    }
    

	
}