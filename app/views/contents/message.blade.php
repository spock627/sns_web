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
           <textarea id="userText" class="form-control" rows="4"></textarea>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> 表情</button>
            <button type="button" class="btn btn-default" onclick="uploadImg()"><span class="glyphicon glyphicon-picture"></span> 图片</button>
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-music"></span> 音乐</button>
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-hd-video"></span> 视频</button>
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-down"></span></button>
        </div>
    </div>
    <div id="publish">
        <button type="button" class="btn btn-success pBtn" onclick="publish()">Publish</button>
        <input id="uid" type="hidden" value="{{Session::get('uid')}}">
    </div>
    <div id="msgHead">

    </div>
    <div id="messageList">
            <?php 
                 $result = DB::table('message')->paginate(5);
                 foreach ($result as $key => $record) {
            ?>
        <div class="messageHead">
            <div class="headImg"><a href="/sns_web/public/home"><img src="common/image/cat.jpg" class="img-circle himg"></a></div>
            <div class="mtime">Time(<?php echo date('Y-m-d H:i:s');?>)</div>
            <div class="mview">View(45)</div>
           
        </div>
        <div class="message">
            <div class="content">{{$record->content}}</div>
        </div>

        <div class="rep">
            <button type="button" onclick="reply(this)" class="btn btn-success replyBtn">评论</button>
            <button type="button" class="btn btn-default">转发</button>
        </div>
        <div class="reply">
            <textarea id="userReply" class="form-control" rows="3"></textarea>
            <button type="button" onclick="submitReply(this)" class="btn btn-success confirmBtn">确认</button>
        </div>
         <?php
           }
        ?>
        <div align="center" class="">
            <h3><span onclick="viewMore()" id="viewMore" class="label label-success">查看更多</span></h3>
        </div>
    </div>
</div>
{{HTML::script('common/js/jquery-1.6.min.js')}}
{{HTML::script('common/js/bootstrap.min.js')}}
{{HTML::script('common/js/common.js')}}
{{HTML::script('contents/js/message.js')}}
</body>
</html>