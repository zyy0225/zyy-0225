<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\RbacService;
use Illuminate\Http\Request;
use Session;

/**
*   权限
*/
class RbacController extends Controller
{
    /**
	*   定义模型变量
	*/
    public $rbacService;

    /**
	*   构造函数
	*/ 
	public function __construct()
	{
        $this->rbacService = new RbacService;
    }

    /**
	*   权限列表
	*/
    public function list()
    {
        $menu = $this->rbacService->menuPageList();
        return view('rbac.list',['menu'=>$menu]);
    }

    /**
	*   权限添加
	*/
    public function insert()
    {
        $data = $this->rbacService->menuList();
        return view('rbac.insert',['model'=>$data]);
    }

    /**
	*   权限添加
	*/
    public function insertDo(Request $request)
    {
        $input = $request->all();
        if($input){
             // 用户信息验证规则
             $this->validate($request,[
                'menu_name' => 'required',
                'uri' => 'required',
                'pid' => 'required',
                'is_menu' => 'required',
                ]);
                //调用service层判断用户信息是否唯一
                $result = $this->rbacService->noRepeat($input);
                if($result){
                    $message = '';
                    if($result =='menu_name'){
                        $message = '权限名不能重复';
                    }else if($result =='uri'){
                        $message = '标识符不能重复';
                    }
                    return redirect('/message')->with(['message'=>$message,'url'=>'rbac/insert','jumpTime'=>3,'status'=>true]);
                }
            
            $data = $this->rbacService->menuInsert($input);
            if($data){
                return redirect('/message')->with(['message'=>'添加成功！','url'=>'rbac/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('rbac/insert');
    }

    /**
	*   权限修改
	*/
    public function update(Request $request)
    {
        $menu_id = $request->input('menu_id');
        if($menu_id){
            $menu = $this->rbacService->menuList();
            $data = $this->rbacService->menuFirst($menu_id);
            return view('rbac.update',['model'=>$data,'menu'=>$menu]);
        }
        return view('rbac.update');
    }

    /**
	*   权限修改
	*/
    public function updateDo(Request $request)
    {
        $input = $request->all();
        if($input){
            // 用户信息验证规则
            $this->validate($request,[
                'menu_name' => 'required',
                'uri' => 'required',
                'pid' => 'required',
                'is_menu' => 'required',
                ]);
                //调用service层判断用户信息是否唯一
                $result = $this->rbacService->noRepeat($input);
                if($result){
                    $message = '';
                    if($result =='menu_name'){
                        $message = '权限名不能重复';
                    }else if($result =='uri'){
                        $message = '标识符不能重复';
                    }
                    return redirect('/message')->with(['message'=>$message,'url'=>'rbac/update','jumpTime'=>3,'status'=>true]);
                }
            
            $data = $this->rbacService->menuUpdate($input);
            if($data){
                return redirect('/message')->with(['message'=>'修改成功！','url'=>'rbac/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('rbac/list');
    }

    /**
	*   权限删除
	*/
    public function delete(Request $request)
    {
        $menu_id = $request->input('menu_id');
        if($menu_id){
            $data = $this->rbacService->menuDelete($menu_id);
            if($data){
                return redirect('/message')->with(['message'=>'添删除成功！','url'=>'rbac/list','jumpTime'=>3,'status'=>true]);
            }
        }
        return redirect('rbac/list');
    }




}