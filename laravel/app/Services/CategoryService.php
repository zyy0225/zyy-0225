<?php 
namespace App\Services;

use App\Models\CategoryModel;

/**
*   miui_category表
*/ 
class CategoryService
{
	/**
	*   定义模型变量
	*/ 
	public $categoryModel;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->categoryModel = new CategoryModel;
	}

	/**
	*	获取商品信息
	*/
	public function categoryInfo()
	{
		$where = ['parent_id'=>0];
        return $data = $this->categoryModel->WhereAll($where);
	}




	
}