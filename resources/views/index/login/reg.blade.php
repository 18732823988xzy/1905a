@extends('layouts.shop')
@section('title','全国最大珠宝商-注册页面')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('index')}}" method="get" class="reg-login">
         @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('index')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" id="login_email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" /> <a href="javascript:;" class="emailcode">获取验证码</a></div>
       <div class="lrList"><input type="text" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="button" value="立即注册" />
      </div>
     </form><!--indexogin/-->
     <script src="{{asset('/static/admin/js/jquery.js')}}"></script>
     <script>
         $(function(){
             $(document).on("click",".emailcode",function(){
                 var email=$("#login_email").val();
                 var reg=/^\w+@\w+\.com$/;
                 if(email==''){
                     alert('邮箱不能为空');
                     return false;
                 }else if(!reg.test(email)){
                     alert('邮箱格式不正确');
                     return false;
                 }
                 $.post(
                     "{{url('LoginController/send')}}",
                     {email:email,_token:"{{csrf_token()}}"},
                     function(data){
                         if(data==''){
                             alert('发送成功');
                         }else{
                             alert('发送失败');
                         }
                     });

                 return false;

             });
         });
         </script>
     @include('index.public.footer')
@endsection