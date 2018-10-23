<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
*	admin_role表
*/
class RoleModel extends Model
{
	/**
	*	指定表和主键
	*/
	public $table = 'admin_role';
	public $primarykey = 'role_id';

	/**
	*	查询角色资源
	*/
    public function getResource($role_id)
    {
		$data = self::leftJoin('admin_role_resource','admin_role.role_id','=','admin_role_resource.role_id')
        ->where('admin_role.role_id',$role_id)
        ->get()
		->toArray();
		return $data;
	}

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
	*	where条件分页查询全部数据
	*/
    public function getWherePage($where)
    {
		$data = Db::table($this->table)->where($where)->paginate(5);
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
    public function insert($input)
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

	/**
	*	删除数据
	*/
    public function roleDelete($where)
    {
		return $data = Db::table($this->table)->where($where)->delete();
	}



}