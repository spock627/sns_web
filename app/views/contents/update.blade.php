<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>更新个人信息</title>
    {{ HTML::style('contents/css/contents.css') }}
    {{ HTML::style('common/css/bootstrap.css') }}
    {{ HTML::style('common/css/bootstrap.css') }}
</head>
<body>

<div id="container">
    <div id="head">
        <div id="headImg">
            <img src="common/image/cat.jpg" alt="..."  class="img-circle">
        </div>
    </div>
    <form role="form" id="userUpdate" action="update" method="post">
        <div id="content" class="text-content">
            <div class="input-group">
                <span class="input-group-addon">账号信息:</span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <span class="input-group-addon">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄</span>
                <input type="text" id="age" name="age" class="form-control" placeholder="Age">
            </div>
        </div>
        <div id="editBtns">
            <button type="submit" class="btn btn-success">保存</button>
            <button type="button" class="btn btn-success">个性设置</button>
        </div>
    </form>
</div>

</body>
{{ HTML::script('common/js/jquery-1.6.min.js') }}
{{ HTML::script('common/js/bootstrap.min.js') }}
{{HTML::script('contents/js/updateUser.js')}}
</html>