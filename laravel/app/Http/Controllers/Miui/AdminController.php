<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Session;

/**
*   管理员
*/
class AdminController extends Controller
{
    /**
	*   定义模型变量
	*/
    public $adminService;

    /**
	*   构造函数
	*/ 
	public function __construct()
	{
        $this->adminService = new AdminService;
    }

    /**
	*   用户登录
	*/
    public function login()
    {
        return view('admin.login');
    }

    /**
	*   用户登录
	*/
    public function loginDo(Request $request)
    {
        $input = $request->all();
        if($input){
            // 用户信息验证规则
            $this->validate($request,[
                'email' => ['regex:/^[a-z0-9_]+@[a-z0-9]+\.[a-z]+$/i'],
                'password' => [ 'regex:/^[a-z0-9_-]{4,}$/i'],
            ]);

            $data = $this->adminService->adminLogin($input);
            if($data){
                return redirect('/message')->with(['message'=>'登录成功！','url'=>'backend/index','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('/message')->with(['message'=>'登录失败！','url'=>'admin/login','jumpTime'=>3,'status'=>true]);
    }

    /**
	*   用户退出
	*/
    public function loginOut()
    {
        $name = Session::pull('name');
        if($name){
            return redirect('admin/login');
        }
        return redirect('backend/index');
    }

    /**
	*   分页展示所有在线管理员
	*/
    public function list()
    {
        $data = $this->adminService->adminList();
        return view('admin.list',['model'=>$data]);
    }

    /**
	*   添加管理员
	*/
    public function insert()
    {
        $data = $this->adminService->roleInfo();
        return view('admin.insert',['model'=>$data]);
    }

    /**
	*   添加管理员
	*/
    public function insertDo(Request $request)
    {
        $input = $request->all();
        if($input){
             // 用户信息验证规则
             $this->validate($request,[
                'username' => 'required',
                'email' => 'required|email',
                'mobile' => ['regex:/^1[356789]\d{9}$/'],
                'password' => [ 'regex:/^[a-z0-9_-]{4,}$/i'],
                'repassword' => 'required|same:password',
                'is_fweze' => 'required',
                'create_name' => 'required',
            ]);
            //调用service层判断用户信息是否唯一
            $result = $this->adminService->noRepeat($input);
            if($result){
                $message = '';
                if($result =='username'){
                    $message = '用户名不能重复';
                }else if($result =='mobile'){
                    $message = '手机号不能重复';
                }else if($result =='email'){
                    $message = '邮箱不能重复';
                }
                return redirect('/message')->with(['message'=>$message,'url'=>'admin/insert','jumpTime'=>3,'status'=>true]);
            }
            
            $data = $this->adminService->adminInsert($input);
            if($data){
                return redirect('/message')->with(['message'=>'添加成功！','url'=>'admin/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return view('admin.insert');
    }

    /**
	*   管理员修改
	*/
    public function update(Request $request)
    {
        $user_id = $request->input('user_id');
        if($user_id){
            $adminRole = $this->adminService->adminRole($user_id);
            $role = $this->adminService->roleInfo();
            $data = $this->adminService->adminOne($user_id);
            return view('admin.update',['model'=>$data,'role'=>$role,'adminRole'=>$adminRole]);
        }
        return redirect('admin/list');
    }

    /**
	*   管理员修改
	*/
    public function updateDo(Request $request)
    {
        $input = $request->all();
        if($input){
            // 用户信息验证规则
            $this->validate($request,[
                'username' => 'required',
                'email' => 'required|email',
                'mobile' => ['regex:/^1[356789]\d{9}$/'],
                'password' => [ 'regex:/^[a-z0-9_-]{4,}$/i'],
                'repassword' => 'required|same:password',
                'is_fweze' => 'required',
                ]);
                //调用service层判断用户信息是否唯一
                $result = $this->adminService->noRepeat($input);
                if($result){
                    $message = '';
                    if($result =='username'){
                        $message = '用户名不能重复';
                    }else if($result =='mobile'){
                        $message = '手机号不能重复';
                    }else if($result =='email'){
                        $message = '邮箱不能重复';
                    }
                    return redirect('/message')->with(['message'=>$message,'url'=>'admin/update','jumpTime'=>3,'status'=>true]);
                }

            $data = $this->adminService->adminUpdate($input);
            if($data){
                return redirect('/message')->with(['message'=>'修改成功！','url'=>'admin/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('admin/update');
    }

    /**
	*   管理员假删除
	*/
    public function delete(Request $request)
    {
        $user_id = $request->input('user_id');
        if($user_id){
            $data = $this->adminService->adminDelete($user_id);
            if($data){
                return redirect('/message')->with(['message'=>'删除成功！','url'=>'admin/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('admin/list');
    }




}