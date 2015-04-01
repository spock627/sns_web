<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>状态列表</title>
    {{ HTML::style('common/css/bootstrap.css') }}
    {{ HTML::style('common/css/bootstrap-theme.css')}}
    {{ HTML::style('contents/css/message.css')}}
</head>
<body>
<div id="container">
    <div id="contentArea">
        <div id="textArea">
           <textarea id="userText" class="form-control" rows="3"></textarea>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default">image</button>
            <button type="button" class="btn btn-default">media</button>
            <button type="button" class="btn btn-default">demo</button>
        </div>
    </div>
    <div id="publish">
        <button type="button" class="btn btn-success pBtn" onclick="publish()">Publish</button>
        <input id="uid" type="hidden" value="{{Session::get('uid')}}">
    </div>
    <div id="messageList">
        <div class="messageHead">
            <div class="headImg"><img src="common/image/cat.jpg" class="img-circle himg"></div>
            <div class="mtime">Time(<?php echo date('Y-m-d H:i:s');?>)</div>
            <div class="mview">View(45)</div>
        </div>
        <div class="message">
            <div class="content">content</div>
        </div>
        <div>
            <button type="button"  class="btn btn-success replyBtn">评论</button>
            <button type="button" class="btn btn-default">转发</button>
        </div>
        <div class="reply">
            <textarea id="userReply" class="form-control" rows="3"></textarea>
            <button type="button" class="btn btn-success confirmBtn">确认</button>
        </div>
    </div>
</div>
</body>
{{HTML::script('common/js/jquery-1.6.min.js')}}
{{HTML::script('common/js/bootstrap.min.js')}}
{{HTML::script('contents/js/message.js')}}
</html>