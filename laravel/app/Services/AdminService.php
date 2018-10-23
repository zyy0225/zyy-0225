<?php 
namespace App\Services;

use App\Models\AdminModel;
use App\Models\RoleModel;
use App\Models\UserRoleModel;
use App\Models\ResourceModel;
use Session;

class AdminService
{
	/**
	*   定义模型变量
	*/ 
	public $adminModel;
	public $roleModel;
	public $userRoleModel;
	public $resourceModel;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->adminModel = new AdminModel;
		$this->roleModel = new RoleModel;
		$this->userRoleModel = new UserRoleModel;
		$this->resourceModel = new ResourceModel;
	}

	/**
	*	管理员登录
	*/
	public function adminLogin($input)
	{
		$where = ['email'=>$input['email'],'password'=>md5($input['password'])];
		$data = $this->adminModel->whereFirst($where);
		if($data){
			Session::put('name',$data);

			$time = time();

			$where = ['user_id'=>$data['user_id']];
			$data = ['login_time'=>$time];
			
			//修改用户最后一次登录时间
			$result = $this->adminModel->getUpdate($where,$data);
			
			if($result){
				return $result;
			}
        }
        return false;
	}
	
	// $flag = true;
	// 	DB::beginTransaction();
	// 	try{
	// 		DB::commit();
	// 	}catch(\Exception $e){
	// 		$flag  false;
	// 		DB::rollBack();
	// 	}
	// 	return $flag;
		
	/**
	*	根据id查询单条数据
	*/
	public function adminOne($user_id)
	{
		$where = ['user_id'=>$user_id];
		return $data = $this->adminModel->whereFirst($where);
	}

	/**
	*	关联查询角色表信息
	*/
	public function roleInfo()
	{
		return $data = $this->roleModel->getAll();
	}

	/**
	*	判断用户信息是否唯一
	*/
	public function noRepeat($input)
	{
		$where = '';

		//判断用户名，手机号，邮箱是否唯一
		$where = ['username'=>$input['username']];
		$data = $this->adminModel->whereFirst($where);
		if($data){
			if(!isset($input['user_id']) || (isset($input['user_id']) && $input['user_id']!=$data['user_id'])){
				return $result = 'username';
			}
		}

		$where = ['email'=>$input['email']];
		$data = $this->adminModel->whereFirst($where);
		if($data){
			if(!isset($input['user_id']) || (isset($input['user_id']) && $input['user_id']!=$data['user_id'])){
				return $result = 'email';
			}
		}

		$where = ['mobile'=>$input['mobile']];
		$data = $this->adminModel->whereFirst($where);
		if($data){
			if(!isset($input['user_id']) || (isset($input['user_id']) && $input['user_id']!=$data['user_id'])){
				return $result = 'mobile';
			}
		}

	}

	/**
	*	添加管理员，管理员角色表添加数据
	*/
	public function adminInsert($input)
	{
		$role_id = $input['role_id'];

		array_shift($input);
		$input['password'] = md5($input['password']);

		$name = Session::get('name');
		$input['create_name'] = $name['username'];

		$time = time();
		$input['create_time'] = $time;

		unset($input['repassword']);
		unset($input['role_id']);
		$data = $this->adminModel->userInsert($input);
		if($data){
			$where = ['username'=>$input['username'],'password'=>$input['password']];
			$result = $this->adminModel->whereFirst($where);
			if($result){
				$user_id = $result['user_id'];
				foreach($role_id as $key=>$val){
					$info[$key]['user_id'] = $user_id;
					$info[$key]['role_id'] = $val;
				}
				$res = $this->userRoleModel->userRoleInsert($info);
				if($res){
					return $res;
				}
			}
		}
		return false;
	}
	
	/**
	*	获取管理员角色信息
	*/
	public function adminRole($user_id)
	{
		$where = ['user_id'=>$user_id];
		return $data = $this->userRoleModel->whereAll($where);
	}
	
	/**
	*	根据id修改单条数据
	*/
	public function adminUpdate($input)
	{
		if($input['pwd'] != $input['password']){
			$input['password'] = md5($input['password']);
		}
		$info['username'] = $input['username'];
		$info['email'] = $input['email'];
		$info['mobile'] = $input['mobile'];
		$info['password'] = $input['password'];
		if(!empty($input['is_fweze'])){
			$info['is_fweze'] = $input['is_fweze'];
		}
		$info['update_time'] = time();

		$where = ['user_id'=>$input['user_id']];

		$data = $this->adminModel->getUpdate($where,$info);
		if($data){
			if(!empty($input['role_id'])){
				$where = ['user_id'=>$input['user_id']];
				$supor = $this->adminModel->whereFirst($where);
				if($supor['is_supor'] == 1){
					$where['user_id'] = $input['user_id'];
					$data = $this->userRoleModel->userRoleDelete($where);
				}
				if($data){
					$role_id = $input['role_id'];
					foreach($role_id as $key=>$val){
						$datas[$key]['user_id'] = $input['user_id'];
						$datas[$key]['role_id'] = $val;
					}
					$data = $this->userRoleModel->userRoleInsert($datas);
					if($data){
						return $data;
					}
				}
			}
			return $data;
		}
		return false;
	}
	
	/**
	*	根据id假删除单条数据
	*/
	public function adminDelete($user_id)
	{
		$time = time();
		$where = ['user_id'=>$user_id];
		$data = ['is_delete'=>1,'update_time'=>$time];
		return $data = $this->adminModel->getUpdate($where,$data);
	}
	
	/**
	*	where条件获取管理员分页列表
	*/
	public function adminList()
	{
		$where = ['is_delete'=>0];
		return $data = $this->adminModel->getWherePage($where);
	}

	/**
	*	查找当前管理员权限
	*/
	public function adminResource($path)
	{
		$name = Session::get('name');
		$adminRole = $this->userRoleModel->getAdminRole($name);
		foreach($adminRole as $key=>$val){
			$role_id[] = $val['role_id'];
		}
		
		$menu = $this->resourceModel->getRoleMenu($role_id);
		$menu = array_column($menu,'uri');
		return in_array($path, $menu)?true:false;
	}

	/**
	*	根据当前管理员身份展示不同权限
	*/
	public function roleMenu()
	{
		$name = Session::get('name');
		$adminRole = $this->userRoleModel->getAdminRole($name);
		foreach($adminRole as $key=>$val){
			$role_id[] = $val['role_id'];
		}
		
		$menu = $this->resourceModel->getRoleMenu($role_id);

		$data = $this->createTree($menu);
		foreach ($data as $key => $value) {
    		$menus[$key] = ['text'=>$value['menu_name'],'url'=>$value['uri'],'level'=>$value['level'],'icon'=>'user'];
    		foreach ($value['son'] as $k => $item) {
    			$menus[$key]['submenu'][] = ['text'=>$item['menu_name'],'url'=>$item['uri'],'level'=>$item['level']];
    		}
    	}
		return $menus;
	}

	/**
    *	无限级分类
    */
    public function createTree($data,$parent_id = 0,$level = 0)
    {
    	$tree = [];
    	foreach ($data as $key => $value) {
    		// 	获取的pid == $parent_id
    		if ($value['pid'] == $parent_id) {
    			$value['level'] = $level;
    			$value['son'] = $this->createTree($data,$value['menu_id'],$level+1);
    			$tree[] = $value;
    		}
    	}
    	return $tree;
	}
    

	
}