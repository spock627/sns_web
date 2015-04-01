<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>个人信息</title>
    {{ HTML::style('contents/css/contents.css') }}
    {{ HTML::style('common/css/bootstrap.css') }}
    {{ HTML::style('common/css/bootstrap-theme.css') }}
</head>
<body>
    <div id="container">
        <div id="head">
            <div id="headImg">
                <img src="common/image/cat.jpg" alt="..."  class="img-circle">
            </div>
        </div>
        <div id="content" class="text-content">
            <div class="list-group">
                <a href="#" class="list-group-item">账号信息:<span id="account">{{Session::get('userInfo')}}</span></a>
                <a href="#" class="list-group-item">年龄:<span id="age"></span></a>
                <a href="#" class="list-group-item"> 二维码</a>
                <a href="#" class="list-group-item">最新动态</a>
                <a href="#" class="list-group-item">最新图片</a>
                <a href="#" class="list-group-item"> 加入社区</a>
            </div>
        </div>
        <div id="editBtns">
            <button type="button" class="btn btn-success" onclick="updateInfo()">编辑名片</button>
            <button type="button" class="btn btn-success">个性设置</button>
        </div>
    </div>
</body>
{{HTML::script('common/js/jquery-1.6.min.js')}}
{{HTML::script('common/js/bootstrap.min.js')}}
{{HTML::script('contents/js/contents.js')}}
{{HTML::script('common/js/common.js')}}
</html>