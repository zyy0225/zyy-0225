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
	*	获取分类信息
	*/
	public function categoryInfo()
	{
		$where = ['parent_id'=>0];
        return $data = $this->categoryModel->whereAll($where);
	}

	/**
	*	根据id获取分类
	*/
	public function cateParent($input)
	{
		$cat_id = $input['cat_id'];
		$where = ['parent_id'=>$cat_id];
        return $data = $this->categoryModel->whereAll($where);
	}

	/**
	*	根据多个id获取分类名称
	*/
	public function cateName($goods)
	{
		$cat_id = '';
		foreach($goods as $key=>$val){
			$cat_id .= $val['cat_id'] . ',';
		}
		$cat_id = trim($cat_id,',');
		$cat_id = array_unique(explode(',',$cat_id));
		$where = $cat_id;
		return $data = $this->categoryModel->whereIn('cat_id',$where);
		// var_dump($data);die;
		// $cat_name = '';
		// foreach($data as $key=>$val){
		// 	$cat_name .= $val['cat_name'] . ',';
		// }
		// $cat_name = trim($cat_name,',');
		// return $cat_name = explode(',',$cat_name);
	}

	

	
}