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

            <h1>文章添加</h1>


                <form action="{{url('news/update').$data->news_id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    文章标题 <input type="text" name="news_title" value="{{$data->news_title}}"> <br>
                    文章分类 <select name="news_cate" id="" value="{{$data->news_cate}}">
                        <option value="">请选择...</option>
                        <option value="手机促销">手机促销</option>
                        <option value="3G资讯">3G资讯</option>
                        <option value="站内快讯">站内快讯</option>
                    </select> <br>
                    文章重要性
                    @if ($data->news_sign==1)
                        <input type="radio" name="news_sign" value="普通" checked>普通
                        <input type="radio" name="news_sign" value="置顶"> 置顶<br>
                    @else
                        <input type="radio" name="news_sign" value="普通" >普通
                        <input type="radio" name="news_sign" value="置顶"checked> 置顶<br>
                    @endif

                    是否显示
                    @if ($data->news_show==1)
                        <input type="radio" name="news_show" value="√" checked>显示
                        <input type="radio" name="news_show" value="×">不显示<br>
                    @else
                        <input type="radio" name="news_show" value="√" >显示
                        <input type="radio" name="news_show" value="×"checked>不显示<br>
                    @endif
                    文章作者 <input type="text" name="news_writer"value="{{$data->news_writer}}"><br>
                    作者email <input type="text" name="news_email" value="{{$data->news_email}}"> <br>
                    关键字 <input type="text" name="news_key"value="{{$data->news_key}}"><br>
                    网页描述 <textarea name="news_desc" id="" cols="30" rows="10"></textarea><br>
                    <img src="{{env('UPLOAD_URL')}}{{$data->news_logo}}" alt="" width="100">
                    上传文件 <input type="file" name="news_logo"> <br>
                    <button>提交</button>
                </form>
</body>
</html>