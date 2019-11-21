<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
        <h2>添加商品品牌</h2>

        {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}

        <hr/>
        <form action="{{url('brand/store')}}" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
                @csrf
                <div class="col-sm-10">
                    <input type="text" name="brand_name" class="form-control" id="firstname" placeholder="请输入品牌名称">
                    <span style="color: red">@php echo $errors->first('brand_name');@endphp</span>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
                <div class="col-sm-10">
                    <input type="text" name="brand_url" class="form-control" id="lastname" placeholder="请输入品牌网址">
                    <span style="color: red">@php echo $errors->first('brand_url');@endphp</span>

                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">品牌logo</label>
                <div class="col-sm-10">
                    <input type="file" name="brand_logo" class="form-control" id="lastname" placeholder="请输入品牌网址">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">品牌描述</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="brand_desc" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
</body>
</html>