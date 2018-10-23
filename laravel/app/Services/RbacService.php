<?php 
namespace App\Services;

use App\Models\RoleModel;
use App\Models\MenuModel;
use App\Models\ButtonModel;
use App\Models\ResourceModel;
use App\Services\AdminService;

use Session;

class RbacService
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
    *	分页查询所有menu权限
    */
    public function menuPageList()
    {
        return $data = $this->menuModel->getPageAll();
    }

    /**
    *	查询所有menu权限
    */
    public function menuList()
    {
        return $data = $this->menuModel->getAll();
    }

    /**
    *	查询所有menu权限
    */
    public function menuFirst($menu_id)
    {
        $where = ['menu_id'=>$menu_id];
        return $data = $this->menuModel->whereFirst($where);
    }

	/**
	*	查询所有button权限
	*/
	public function buttonList()
	{
		return $data = $this->buttonModel->getAll();
    }

    /**
	*	判断权限信息是否唯一
	*/
	public function noRepeat($input)
	{
		$where = '';

		//判断权限名称，标识符是否唯一
		$where = ['menu_name'=>$input['menu_name']];
		$data = $this->menuModel->whereFirst($where);
		if($data){
			if(!isset($input['menu_id']) || (isset($input['menu_id']) && $input['menu_id']!=$data['menu_id'])){
				return $result = 'menu_name';
			}
		}

		$where = ['uri'=>$input['uri']];
		$data = $this->menuModel->whereFirst($where);
		if($data){
			if(!isset($input['menu_id']) || (isset($input['menu_id']) && $input['menu_id']!=$data['menu_id'])){
				return $result = 'uri';
			}
		}

	}

    /**
	*	添加menu权限
	*/
	public function menuInsert($input)
	{
        $where = ['menu_id'=>$input['pid']];
        $data = $this->menuModel->whereFirst($where);
        $input['path'] = $data['path'] . '-' . $input['pid'];
        $is_menu = $input['is_menu'];
        array_shift($input);
        unset($input['is_menu']);
        $input['is_menu'] = $is_menu;
		return $data = $this->menuModel->insert($input);
    }

    /**
	*	修改menu权限
	*/
	public function menuUpdate($input)
	{
        $where = ['menu_id'=>$input['pid']];
        $data = $this->menuModel->whereFirst($where);
        if($input['menu_id'] == $data['menu_id']){
            $input['pid'] = 0;
            $input['path'] = 0;
        }else{
            $input['path'] = $data['path'] . '-' . $input['pid'];
        }
        $is_menu = $input['is_menu'];
        array_shift($input);
        unset($input['is_menu']);
        $input['is_menu'] = $is_menu;
        $where = ['menu_id'=>$input['menu_id']];
        unset($input['menu_id']);
        $data = $this->menuModel->getUpdate($where,$input);
        if($data){
            return $data;
        }
        return false;
    }

    /**
	*	删除menu权限
	*/
	public function menuDelete($menu_id)
	{
        $where = ['menu_id'=>$menu_id];
        $data = $this->menuModel->whereFirst($where);
        if($data['pid'] == 0){
            $whereDel = ['pid'=>$data['menu_id']];
            $data = $this->menuModel->menuDelete($whereDel);
        }
		$data = $this->menuModel->menuDelete($where);
		if($data){
			return $data;
		}
		return false;
    }
    
    

	
}