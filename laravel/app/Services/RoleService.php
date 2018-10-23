<?php 
namespace App\Services;

use App\Models\RoleModel;
use App\Models\MenuModel;
use App\Models\ButtonModel;
use App\Models\ResourceModel;
use App\Services\AdminService;

use Session;

class RoleService
{
	/**
	*   定义模型变量
	*/ 
	public $roleModel;
	public $menuModel;
	public $buttonModel;
	public $resourceModel;
	public $adminService;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->roleModel = new RoleModel;   
		$this->menuModel = new MenuModel;
		$this->buttonModel = new ButtonModel;
		$this->resourceModel = new ResourceModel;
		$this->adminService = new AdminService;
	}
	
	/**
	*	查询所有角色
	*/
	public function roleList()
	{
		return $data = $this->roleModel->getPageAll();
    }
    
    /**
	*	查询所有菜单
	*/
	public function menuList()
	{
		$data = $this->menuModel->getAll();
		return $data;
    }
    
    /**
	*	查询所有按钮
	*/
	public function buttonList()
	{
		return $data = $this->buttonModel->getAll();
	}

	/**
	*	判断角色是否唯一
	*/
	public function noRepeat($input)
	{
		$where = '';

		//判断角色名是否唯一
		$where = ['role_name'=>$input['role_name']];
		$data = $this->roleModel->whereFirst($where);
		if($data){
			if(!isset($input['role_id']) || (isset($input['role_id']) && $input['role_id']!=$data['role_id'])){
				return $result = 'role_name';
			}
		}

	}

	/**
	*	角色添加
	*/
	public function roleInsert($input)
	{
		$role_name['role_name'] = $input['role_name'];
		$data = $this->roleModel->insert($role_name);
		if($data){
			$where = ['role_name'=>$input['role_name']];
			$result = $this->roleModel->whereFirst($where);
			if(!empty($input['menu_id'])){
				foreach($input['menu_id'] as $key=>$val){
					$info[$key]['role_id'] = $result['role_id'];
					$info[$key]['resource_id'] = $val;
					$info[$key]['resource_type'] = 0;
				}
			}
			if(!empty($input['button_id'])){
				foreach($input['button_id'] as $key=>$val){
					$info[$key]['role_id'] = $result['role_id'];
					$info[$key]['resource_id'] = $val;
					$info[$key]['resource_type'] = 0;
				}
			}
			// dd($info);die;
			$data = $this->resourceModel->insert($info);
			if($data){
				return $data;
			}
		}
		return false;
	}

	/**
	*	根据id查询角色
	*/
	public function roleFirst($role_id)
	{
		$where = ['role_id'=>$role_id];
		$data = $this->roleModel->getResource($where);
		if($data){
			return $data;
		}
		return false;
	}

	/**
	*	根据id修改角色
	*/
	public function roleUpdate($input)
	{
		$where = ['role_id'=>$input['role_id']];
		$data['role_name'] = $input['role_name'];
		$data = $this->roleModel->getUpdate($where,$data);
		if(isset($data)){
			$res = $this->resourceModel->resourceDelete($where);
			if(isset($res)){
				if(!empty($input['menu_id'])){
					foreach($input['menu_id'] as $key=>$val){
						$info[$key]['role_id'] = $input['role_id'];
						$info[$key]['resource_id'] = $val;
						$info[$key]['resource_type'] = 0;
					}
				}
				if(!empty($input['button_id'])){
					foreach($input['button_id'] as $key=>$val){
						$info[$key]['role_id'] = $input['role_id'];
						$info[$key]['resource_id'] = $val;
						$info[$key]['resource_type'] = 1;
					}
				}
				$data = $this->resourceModel->insert($info);
				if($data){
					return $data;
				}
			}
			return $data;
		}
		return false;
	}

	/**
	*	根据id删除角色
	*/
	public function roleDelete($role_id)
	{
		$where = ['role_id'=>$role_id];
		$data = $this->roleModel->roleDelete($where);
		if($data){
			$result = $this->resourceModel->resourceDelete($where);
			if($result){
				return $result;
			}
		}
		return false;
	}

	
}