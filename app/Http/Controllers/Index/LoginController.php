<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function send(){
        $email=request()->email;
//        $email='2199648302@qq.com';

        $code=rand(100000,999999);
//        $message="您的注册码为".$code."打死也不能告诉别人";
        $message="您正在注册全球珠宝宇宙集团会员,验证码是:".$code;
        $sendInfo=['login_email'=>$email,'login_code'=>$code,'send_time'=>time()];
        session(['sendInfo'=>$sendInfo]);
        //发送邮件//        $this->sendemail($email,$code);//第一种文字
        $this->sendemail($email,$message);//第二种插图格式
    }

    //第二种
    public function sendemail($email,$code){
        \Mail::send('index.index.email' , ['code'=>$code] ,function($message)use($email){
            //设置主题
            $message->subject("欢迎注册全球珠宝宇宙集团会员");
            //设置接收方
            $message->to($email);
        });
    }

}
