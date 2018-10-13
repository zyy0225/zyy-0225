<?php 
namespace App\Services;

use App\Models\UserModel;
use Session;
use DispatchesJobs;
use App\Jobs\SendEmail;

/**
*   miui_user表
*/ 
class UserService
{
	/**
	*   定义模型变量
	*/ 
	public $userModel;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->userModel = new UserModel;
	}

	/**
	*	判断用户登录方式
	*/
	public function Userlogin($input)
	{
		$where = '';
		
		//判断用户是手机号登录还是邮箱登录
		$where = ['mobile'=>$input['account'],'password'=>md5($input['password'])];
		$data = $this->userModel->WhereFirst($where);

		if(empty($data)){
			$where = ['email'=>$input['account'],'password'=>md5($input['password'])];
			$data = $this->userModel->WhereFirst($where);
		}
		
		if($data){
			Session::put('name',$data);

			$time = time();

			$where = ['u_id'=>$data['u_id']];
			$data = ['login_time'=>$time];
			
			//修改用户最后一次登录时间
			$result = $this->userModel->getUpdate($where,$data);
			
			if($result){
				return $result;
			}else{
				return false;
			}
			
		}
	}

	/**
	*	判断用户信息是否唯一
	*/
	public function noRepeat($input)
	{
		$where = '';

		//判断用户名，手机号，邮箱是否唯一
		$where = ['username'=>$input['username']];
		$data = $this->userModel->WhereFirst($where);
		if($data){
			return $result = 'username';
		}

		$where = ['mobile'=>$input['mobile']];
		$data = $this->userModel->WhereFirst($where);
		if($data){
			return $result = 'mobile';
		}

		$where = ['email'=>$input['email']];
		$data = $this->userModel->WhereFirst($where);
		
		if($data){
			return $result = 'email';
		}	
	}

	/**
	*	用户信息入库
	*/
	public function userRegister($input)
	{
		if($input['password'] == $input['repassword']){
			unset($input['repassword']);
			$input['password'] = md5($input['password']);
		}
		unset($input['_token']);
		unset($input['vierfy']);
		
		$data = $this->userModel->userInsert($input);
		if($data){
			Session::put('name',$input);

			$this->UserSendEmail($input);

			return $data;
		}
	}

	/**
	*	队列发送邮件
	*/
	public function UserSendEmail($data)
	{
		return dispatch(new SendEmail($data));
	}




	
}