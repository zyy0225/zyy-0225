<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
*	miui_goods表
*/
class GoodsModel extends Model
{
	/**
	*	指定表和主键
	*/
	public $table = 'miui_goods';
	public $primarykey = 'goods_id';

	/**
	*	查询全部数据
	*/
    public function getAll()
    {
		$data = Db::table($this->table)->get();
		if($data){
			$data = json_decode($data,true);
		}
		return $data;
	}

	/**
	*	分页查询全部数据
	*/
    public function getPageAll()
    {
		$data = Db::table($this->table)->paginate(5);
		return $data;
	}

	/**
	*	根据where条件查询数据
	*/
    public function whereAll($where)
    {
		$data = Db::table($this->table)->where($where)->get();
		if($data){
			$data = json_decode($data,true);
		}
		return $data;
	}

	/**
	*	根据whereIn条件查询数据
	*/
    public function whereIn($id,$where)
    {
		$data = Db::table($this->table)->whereIn($id,$where)->get();
		if($data){
			$data = json_decode($data,true);
		}
		return $data;
	}

	/**
	*	根据where条件查询单条数据
	*/
    public function whereFirst($where)
    {
		$data = Db::table($this->table)->where($where)->first();
		if($data){
			$data = get_object_vars($data);
		}
		return $data;
	}

	/**
	*	添加数据
	*/
    public function userInsert($input)
    {
		return $data = Db::table($this->table)->insert($input);
	}

	/**
	*	修改数据
	*/
    public function getUpdate($where,$data)
    {
		return $result = Db::table($this->table)->where($where)->update($data);
	}



}


