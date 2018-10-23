<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
*	admin_button表
*/
class ButtonModel extends Model
{
	/**
	*	指定表和主键
	*/
	public $table = 'admin_button';
	public $primarykey = 'button_id';

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
		return $data = Db::table($this->table)->paginate(5);
	}

	/**
	*	where条件分页查询全部数据
	*/
    public function getWherePage($where)
    {
		return $data = Db::table($this->table)->where($where)->paginate(5);
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