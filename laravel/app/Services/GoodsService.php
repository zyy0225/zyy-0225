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
		// $categoryInfo
		// $cat_id = '';
		// $data = [];
		// if($categoryInfo){
		// 	foreach($categoryInfo as $key=>$val){
		// 		$where = ['cat_id'=>$val['cat_id']];
		// 		$data[$key] = $this->goodsModel->whereAll($where);
		// 		// $cat_id .= $val['cat_id'] . ',';
		// 	}
		// }
		// // var_dump($data);die;
		// return $data;
		// // $cat_id = trim($cat_id,',');
		// // $where = explode(',',$cat_id);
		// // $data = $this->goodsModel->whereIn('cat_id',$where);
		// // var_dump($data);die;
        // // return $data = $this->goodsModel->whereAll($where);
		$where = ['cat_id'=>1];
        return $data = $this->goodsModel->whereAll($where);
	}

	/**
	*	根据id获取商品信息
	*/
	public function goodsParent($input)
	{
		$cat_id = $input['cat_id'];
		$where = ['cat_id'=>$cat_id];
        return $data = $this->goodsModel->whereAll($where);
	}



	
}