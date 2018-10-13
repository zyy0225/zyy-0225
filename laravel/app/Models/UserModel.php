<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
*	miui_goods表
*/
class UserModel extends Model
{
	/**
	*	指定表和主键
	*/
	public $table = 'miui_user';
	public $primarykey = 'u_id';

	//查询全部数据
    public function getAll()
    {
		$data = Db::table($this->table)->get();
		if($data){
			$data = json_decode($data,true);
		}
		return $data;
	}

	//根据where条件查询数据
    public function WhereAll($where)
    {
		$data = Db::table($this->table)->where($where)->get();
		if($data){
			$data = json_decode($data,true);
		}
		return $data;
	}

	//根据where条件查询单条数据
    public function WhereFirst($where)
    {
		$data = Db::table($this->table)->where($where)->first();
		if($data){
			$data = get_object_vars($data);
		}
		return $data;
	}

	//添加数据
    public function userInsert($input)
    {
		return $data = Db::table($this->table)->insert($input);
	}

	//修改数据
    public function getUpdate($where,$data)
    {
		return $result = Db::table($this->table)->where($where)->update($data);
	}

	//针对get结果集转换成数组形式
	// $data = json_decode($data,true);
	
	//针对first结果集转化成数组形式
	// $data = get_object_vars($data);



}


