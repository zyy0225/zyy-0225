<?php

namespace App\Http\Controllers\Miui;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Session;
use App\Services\UserService;

/**
*   用户
*/
class UserController extends Controller
{
    /**
	*   定义模型变量
	*/ 
	public $userService;

	/**
	*   构造函数
	*/ 
	public function __construct()
	{
		$this->userService = new UserService;
    }
    
    /**
    *   用户登录页面
    */
    public function login()
    {
        return view('user.login');
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
                'account' => 'required',
                'password' => [ 'regex:/^[a-z0-9_-]{5,}$/i'],
                'vierfy' => 'required|captcha',
            ]);

            //调用service层进行判断
            $result = $this->userService->userLogin($input);
            if($result){
                return redirect('/message')->with(['message'=>'登录成功！','url'=>'frontend/index','jumpTime'=>3,'status'=>true]);
			}
        }
        return redirect('/message')->with(['message'=>'用户名或密码错误！','url'=>'user/login','jumpTime'=>3,'status'=>true]);
    }

    /**
    *   用户退出
    */
    public function loginOut()
    {
        Session::pull('name');
        return redirect('frontend/index');
    } 

    /**
    *   用户注册页面
    */
    public function register()
    {
        return view('user.register');
    }

    /**
    *   用户注册
    */
    public function registerDo(Request $request)
    {
        $input = $request->all();

        if($input){

            // 用户信息验证规则
            $this->validate($request,[
                'username' => ['regex:/^[a-z_]\w*$/i'],
                'password' => [ 'regex:/^[a-z0-9_-]{5,}$/i'],
                'repassword' => 'required|same:password',
                'mobile' => ['regex:/^1[356789]\d{9}$/'],
                'email' => ['regex:/^[a-z0-9_]+@[a-z0-9]+\.[a-z]+$/i'],
                'vierfy' => 'required|captcha',
            ]);

            //调用service层判断用户信息是否唯一
            $result = $this->userService->noRepeat($input);
            if($result){
                $message = '';
                if($result =='username'){
                    $message = '用户名不能重复';
                }else if($result =='mobile'){
                    $message = '手机号不能重复';
                }else if($result =='email'){
                    $message = '邮箱不能重复';
                }
                return redirect('/message')->with(['message'=>$message,'url'=>'user/register','jumpTime'=>3,'status'=>true]);
            }

            //调用service层进行用户信息入库
            $data = $this->userService->userRegister($input);
            if($data){
                return redirect('/message')->with(['message'=>'注册成功！','url'=>'frontend/index','jumpTime'=>3,'status'=>true]);
            }     
        }
        return redirect('/message')->with(['message'=>'注册失败！','url'=>'frontend/index','jumpTime'=>3,'status'=>true]);
    }
    
    /**
     *   个人资料
     */
    public function selfInfo()
    {
        return view('user.selfInfo');
    }
    
    /**
    *   生成验证码
    */
    public function captcha($tmp)
    {
        // use Gregwar\Captcha\CaptchaBuilder;

        //验证
        //读取验证码
        // $captcha = Session::get('milkcaptcha');
        // 验证注册码的正确与否
        // if($input["vierfy"]!=$captcha){
        //     return redirect('user/login')->withErrors(['message','验证码错误']);
        // }



        //路由
        // Route::any('user/captcha/{tmp}', 'Miui\UserController@captcha');


        //视图层
        //<img src="{{URL('miui/captcha/{tmp}')}}" style="cursor: pointer" onclick="this.src='{{URL('miui/captcha/{tmp}')}}'+Math.random()">



        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }



}