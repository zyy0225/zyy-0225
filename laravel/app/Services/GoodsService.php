<?php 
namespace App\Services;

use App\Models\GoodsModel;

/**
*   miui_goods表
*/ 
class GoodsService
{
	/**
	*   定义模型变量
	*/ 
	public $goodsModel;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->goodsModel = new GoodsModel;
	}

	/**
	*	获取商品信息
	*/
	public function goodsInfo()
	{
		$where = ['cat_id'=>1];
        return $data = $this->goodsModel->whereAll($where);
	}




	
}