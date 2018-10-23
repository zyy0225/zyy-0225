<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Services\AdminService;

class CheckPower
{
    /**
     * 检测用户是否登陆以及是否有访问管理权限
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $adminService = new AdminService;
        // 判断用户是否已经登陆

        if (!Session::get('name')) {
            return redirect('/admin/login');
        }
        
        // // 判断是否为非法用户
        // if (!$adminService->getAdminAttr('admin_id')) {
        //     // 删除非法状态
        //     $adminService->delLoginStatus();
        //     return redirect('/admin/login');
        // }
        // $adminInfo = $adminService->getAdminStatus();
        // // 判断是否被冻结
        // if ($adminService->getAdminAttr('is_freeze') == 1) {
        //     // dump($adminService->getAdminAttr('is_freeze'));
        //     return redirect('/');
        // }
        
        // 判断是否为超级管理员
        $name = Session::get('name');
        if ($name['is_supor'] == 0) {
            return $next($request);
        }

        // 判断是否有路由访问权限
        if (!$adminService->adminResource($request->path())) {
            return redirect('/backend/index');
        }

        return $next($request);
    }



}
