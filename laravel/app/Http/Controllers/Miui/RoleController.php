<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Session;

/**
*   角色
*/
class RoleController extends Controller
{
    /**
	*   定义模型变量
	*/
    public $roleService;

    /**
	*   构造函数
	*/ 
	public function __construct()
	{
        $this->roleService = new RoleService;
    }

    /**
	*   展示所有角色
	*/
    public function list()
    {
        $data = $this->roleService->roleList();
        return view('role.list',['model'=>$data]);
    }

    /**
	*   角色添加
	*/
    public function insert()
    {
        $menu = $this->roleService->menuList();
        $button = $this->roleService->buttonList();
        return view('role.insert',['menu'=>$menu,'button'=>$button]);
    }

    /**
	*   角色添加
	*/
    public function insertDo(Request $request)
    {
        $input = $request->all();
        if($input){
            // 用户信息验证规则
            $this->validate($request,[
                'role_name' => 'required',
            ]);
            //调用service层判断用户信息是否唯一
            $result = $this->roleService->noRepeat($input);
            if($result){
                $message = '';
                if($result =='role_name'){
                    $message = '角色名不能重复';
                }
                return redirect('/message')->with(['message'=>$message,'url'=>'role/insert','jumpTime'=>3,'status'=>true]);
            }

            $data = $this->roleService->roleInsert($input);
            if($data){
                return redirect('/message')->with(['message'=>'添加成功！','url'=>'role/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('role/insert');
    }

    /**
	*   角色修改
	*/
    public function update(Request $request)
    {
        $role_id = $request->input('role_id');
        if($role_id){
            $data = $this->roleService->roleFirst($role_id);
            $menu = $this->roleService->menuList();
            $button = $this->roleService->buttonList();
            return view('role.update',['menu'=>$menu,'button'=>$button,'model'=>$data]);
        }
        return redirect('role/list');
    }

    /**
	*   角色修改
	*/
    public function updateDo(Request $request)
    {
        $input = $request->all();
        if($input){
            // 用户信息验证规则
            $this->validate($request,[
                'role_name' => 'required',
            ]);
            //调用service层判断用户信息是否唯一
            $result = $this->roleService->noRepeat($input);
            if($result){
                $message = '';
                if($result =='role_name'){
                    $message = '角色名不能重复';
                }
                return redirect('/message')->with(['message'=>$message,'url'=>'role/update','jumpTime'=>3,'status'=>true]);
            }

            $data = $this->roleService->roleUpdate($input);
            if($data){
                return redirect('/message')->with(['message'=>'修改成功！','url'=>'role/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('role/update');
    }

    /**
	*   角色删除
	*/
    public function delete(Request $request)
    {
        $role_id = $request->input('role_id');
        if($role_id){
            $data = $this->roleService->roleDelete($role_id);
            if($data){
                return redirect('/message')->with(['message'=>'删除成功！','url'=>'role/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('role/list');
    }




}