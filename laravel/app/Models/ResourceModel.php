<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
*	admin_role_resource
*/
class ResourceModel extends Model
{
	/**
	*	指定表
	*/
	public $table = 'admin_role_resource';

	/**
	*	查询全部数据
	*/
    public function getRoleMenu($role_id)
    {
        $data = self::leftJoin('admin_menu','admin_role_resource.resource_id','=','admin_menu.menu_id')
        ->whereIn('admin_role_resource.role_id',$role_id)
        ->where('admin_role_resource.resource_type',0)
        ->distinct('admin_role_resource.resource_id')
        ->get()
        ->toArray();
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
	*	删除数据
	*/
    public function resourceDelete($where)
    {
		return $data = Db::table($this->table)->where($where)->delete();
	}


}