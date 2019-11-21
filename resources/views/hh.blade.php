<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <form action="{{url('/dologin')}}" method="post">
            @csrf
           用户名: <input type="text" name="name"> <br>
           密码 <input type="text" name="password"> <br>
           确认密码: <input type="text" name="repassword"> <br>
            邮箱 <input type="text" name="email"> <br>
            <button>注册</button>
        </form>
</body>
