<?php 
namespace App\Services;

use App\Models\AdminModel;
use Session;

class BackendService
{
	/**
	*   定义模型变量
	*/ 
	public $adminModel;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->adminModel = new AdminModel;
	}

	/**
	*	用户登录
	*/
	public function adminLogin($input)
	{
		$where = ['username'=>$input['username'],'password'=>md5($input['password'])];
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
    

	
}