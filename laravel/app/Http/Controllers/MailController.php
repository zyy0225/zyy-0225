<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        $name = '学院君';
        $flag = Mail::send('emails.test',['name'=>$name],function($message){
            $to = '1093600647@qq.com';
            $message ->to($to)->subject('测试邮件');//subject邮件主题
        });

        if(empty($flag)){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

    public function raw()
    {
        Mail::raw('这是一封测试邮件', function ($message) {
            $to = '1093600647@qq.com';
            $message ->to($to)->subject('测试邮件');
        });

        if(empty($flag)){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

// MAIL_DRIVER=smtp   //邮件发送驱动
// MAIL_HOST=smtp.qq.com   //发送邮件的服务器
// MAIL_PORT=465   //服务端口号
// MAIL_USERNAME=1745693805@qq.com   //发送邮件的邮箱号
// MAIL_PASSWORD=qtfonjyfohmdjccd   //发送邮件的授权码,不是邮箱的登录密码，在邮箱的设置里获取
// MAIL_ENCRYPTION=ssl   //加密类型
// MAIL_FROM_ADDRESS=1745693805@qq.com   //从哪个邮箱发送的
// MAIL_FROM_NAME=柒喵   //发送者的姓名
}