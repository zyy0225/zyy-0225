<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
*	admin_user_role
*/
class UserRoleModel extends Model
{
	/**
	*	指定表
	*/
	public $table = 'admin_user_role';

	/**
	*	查询角色表数据
	*/
    public function getAdminRole($name)
    {
        $data = self::leftJoin('admin_role','admin_user_role.role_id','=','admin_role.role_id')
        ->where(['admin_user_role.user_id'=>$name['user_id']],['is_delete'=>0])
        ->get()
        ->toArray();
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
	*	添加数据
	*/
    public function userRoleInsert($input)
    {
		return $data = Db::table($this->table)->insert($input);
	}

	/**
	*	删除数据
	*/
    public function userRoleDelete($where)
    {
		return $data = Db::table($this->table)->where($where)->delete();
	}


}