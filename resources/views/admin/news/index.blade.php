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
<form action="" method="get">
    <input type="text" name="title" value="{{$query['title']??''}}" placeholder="请输入文章标题的名字">
        <select name="cate" id=""  value="{{$query['cate']??''}}">
        <option value="">请选择...</option>
        <option  value="手机促销">手机促销</option>
        <option  value="3G资讯">3G资讯</option>
        <option  value="站内快讯">站内快讯</option>
    </select>

    <button>搜索</button>
</form>
<table border="1">
    <tr>
        <td>文章id</td>
        <td>文章标题</td>
        <td>文章分类</td>
        <td>文章重要性</td>
        <td>是否显示</td>
        <td>文章作者</td>
        <td>作者email</td>
        <td>关键字</td>
        <td>网页描述</td>
        <td>上传文件</td>
        <td>操作</td>
    </tr>
    @php $i=1 @endphp
    @foreach ($data as $v)
        <tr  @if($i%2==0)class="active" @else class="success" @endif>
            <td>{{$v->news_id}}</td>
            <td>{{$v->news_title}}</td>
            <td>{{$v->news_cate}}</td>
            <td>{{$v->news_sign}}</td>
            <td>{{$v->news_show}}</td>
            <td>{{$v->news_writer}}</td>
            <td>{{$v->news_email}}</td>
            <td>{{$v->news_key}}</td>
            <td>{{$v->news_desc}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->news_logo}}" alt="" width="80"></td>
            <td>
                <a href="{{url('news/edit/'.$v->news_id)}}">编辑</a>
                <a href="{{url('news/delete/'.$v->news_id)}}">|删除</a>
            </td>

    </tr>
        @php $i++ @endphp
    @endforeach
</table>


{{$data->appends($query)->links()}}
</body>
</html>